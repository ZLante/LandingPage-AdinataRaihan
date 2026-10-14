<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageToggleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_switch_language_and_the_selection_persists_across_public_pages(): void
    {
        $this->withSession(['language' => 'en'])
            ->from(route('home'))
            ->post(route('language.update'), ['language' => 'id'])
            ->assertRedirect(route('home'))
            ->assertSessionHas('language', 'id');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Jelajahi POLNEP')
            ->assertSee('Tentang');

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Tentang kami')
            ->assertSee('Beranda');
    }

    public function test_authenticated_language_selection_is_saved_to_the_user_account(): void
    {
        $user = User::factory()->create(['role' => 'user', 'language' => 'en']);

        $this->actingAs($user)
            ->from(route('home'))
            ->post(route('language.update'), ['language' => 'id'])
            ->assertRedirect(route('home'))
            ->assertSessionHas('language', 'id');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'language' => 'id',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Jelajahi POLNEP');
    }

    public function test_language_switch_translates_the_public_page_templates(): void
    {
        $this->withSession(['language' => 'id']);

        $this->get(route('partnership'))
            ->assertOk()
            ->assertSee('Kolaborasi strategis');

        $this->get(route('programs'))
            ->assertOk()
            ->assertSee('Program akademik');

        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Hubungi kami');

        $this->get(route('visi-misi'))
            ->assertOk()
            ->assertSee('VISI & MISI');

        $this->get(route('organization.index'))
            ->assertOk()
            ->assertSee('Organisasi');
    }

    public function test_language_switch_rejects_unsupported_languages(): void
    {
        $this->from(route('home'))
            ->post(route('language.update'), ['language' => 'zh'])
            ->assertSessionHasErrors('language');
    }
}
