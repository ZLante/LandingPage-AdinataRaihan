<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnershipAndFaqManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_show_the_official_collaboration_categories_faqs_and_social_links(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Pemerintahan')
            ->assertSee('Perusahaan')
            ->assertSee('Industri')
            ->assertSee('Perguruan Tinggi & Sekolah')
            ->assertSee('BUMN')
            ->assertSee('Asosiasi')
            ->assertSee('Frequently Asked Questions')
            ->assertSee('What is POLNEP?')
            ->assertSee('https://www.youtube.com/@mediapolnep')
            ->assertSee('https://www.instagram.com/mediapolnep/?hl=en')
            ->assertSee('https://web.facebook.com/mediapolnep/mentions/?_rdc=1&_rdr#', false);

        $this->get('/partnership')
            ->assertOk()
            ->assertSee('kerjasama-pemerintahan')
            ->assertSee('kerjasama-perguruan-tinggi-sekolah');
    }

    public function test_only_admins_can_manage_collaborations_and_faqs(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)->get(route('partners.index'))->assertForbidden();
        $this->actingAs($user)->get(route('faqs.index'))->assertForbidden();
    }

    public function test_admins_can_create_update_and_delete_collaborations_and_faqs(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $this->get(route('partners.index'))
            ->assertOk()
            ->assertSee('Collaboration Management');
        $this->get(route('faqs.index'))
            ->assertOk()
            ->assertSee('Frequently Asked Questions');

        $this->post(route('partners.store'), [
            'name' => 'New Research Partner',
            'description' => 'Research collaboration details.',
            'website' => 'https://example.org/partner',
            'sort_order' => 20,
            'icon' => 'bi bi-building',
            'theme' => 'blue',
        ])->assertRedirect(route('partners.index'));

        $partner = Partner::where('name', 'New Research Partner')->firstOrFail();
        $this->assertDatabaseHas('partners', ['id' => $partner->id]);

        $this->put(route('partners.update', $partner), [
            'name' => 'Updated Research Partner',
            'description' => 'Updated collaboration details.',
            'website' => 'https://example.org/updated-partner',
            'sort_order' => 21,
            'icon' => 'bi bi-globe2',
            'theme' => 'teal',
        ])->assertRedirect(route('partners.index'));

        $this->assertDatabaseHas('partners', [
            'id' => $partner->id,
            'name' => 'Updated Research Partner',
            'theme' => 'teal',
        ]);
        $this->get('/partnership')
            ->assertOk()
            ->assertSee('Updated Research Partner')
            ->assertSee('https://example.org/updated-partner');

        $this->post(route('faqs.store'), [
            'question' => 'Where are collaboration details?',
            'answer' => 'Review the collaboration entries on the partnership page.',
            'sort_order' => 20,
        ])->assertRedirect(route('faqs.index'));

        $faq = Faq::where('question', 'Where are collaboration details?')->firstOrFail();
        $this->get('/')
            ->assertOk()
            ->assertSee('Where are collaboration details?')
            ->assertSee('Review the collaboration entries on the partnership page.');

        $this->put(route('faqs.update', $faq), [
            'question' => 'How do I find collaboration details?',
            'answer' => 'Visit the partnership page for more information.',
            'sort_order' => 21,
        ])->assertRedirect(route('faqs.index'));

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question' => 'How do I find collaboration details?',
        ]);
        $this->get('/')
            ->assertOk()
            ->assertSee('How do I find collaboration details?')
            ->assertSee('Visit the partnership page for more information.');

        $this->delete(route('partners.destroy', $partner))->assertRedirect(route('partners.index'));
        $this->delete(route('faqs.destroy', $faq))->assertRedirect(route('faqs.index'));

        $this->assertDatabaseMissing('partners', ['id' => $partner->id]);
        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
        $this->get('/')
            ->assertOk()
            ->assertDontSee('Updated Research Partner')
            ->assertDontSee('How do I find collaboration details?');
    }
}
