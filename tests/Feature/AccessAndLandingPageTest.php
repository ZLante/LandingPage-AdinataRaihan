<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessAndLandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_has_no_role_selector_and_users_return_to_the_landing_page(): void
    {
        $user = User::factory()->create([
            'name' => 'student',
            'email' => 'student@example.com',
            'role' => 'user',
            'password' => 'password',
        ]);

        $this->get('/login')
            ->assertOk()
            ->assertDontSeeText('Sign in as');

        $this->post('/login', [
            'login' => $user->email,
            'password' => 'password',
            'role' => 'admin',
        ])->assertRedirect(route('home'));
    }

    public function test_only_admins_can_open_the_dashboard_and_admin_pages(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)->get('/dashboard')->assertForbidden();
        $this->actingAs($user)->get('/admin/email')->assertForbidden();
        $this->actingAs($user)->get('/admin/settings')->assertForbidden();
        $this->actingAs($user)->put('/admin/settings')->assertForbidden();
    }

    public function test_regular_users_can_open_and_update_their_own_account_settings(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/')
            ->assertOk()
            ->assertSee('My Account')
            ->assertDontSee('Admin Dashboard');

        $this->get('/account/settings')
            ->assertOk()
            ->assertSee('Account Settings')
            ->assertSee(route('account.settings.update'));

        $this->put('/account/settings', [
            'name' => 'Updated Student',
            'email' => $user->email,
            'language' => 'en',
            'timezone' => 'Asia/Jakarta',
        ])->assertRedirect('/account/settings');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Student',
            'role' => 'user',
        ]);
    }

    public function test_admins_can_open_the_dashboard_after_signing_in(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->post('/login', [
            'login' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->get('/dashboard')->assertOk();
    }

    public function test_landing_page_links_to_public_faq_vision_and_structure(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Frequently Asked Questions')
            ->assertSee(route('visi-misi'))
            ->assertSee(route('organization.index'));
    }

    public function test_vision_and_organization_pages_are_available_read_only_to_guests(): void
    {
        $this->get('/visi-misi')
            ->assertOk()
            ->assertSee('VISI')
            ->assertDontSee('Edit Visi &amp; Misi');

        $this->get('/organization')
            ->assertOk()
            ->assertSee('Organizational')
            ->assertSee('available for viewing only')
            ->assertDontSee('Add Member');
    }
}
