<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewContactSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/** Regression tests for bugs found while upgrading to Laravel 13 (2026-10-23). */
class KnownBugFixesTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function nonAdmin(): User
    {
        return User::factory()->create(['role' => 'user', 'password' => bcrypt('secret-pass-1')]);
    }

    public function test_guests_on_auth_only_urls_are_sent_to_the_admin_login_not_a_500(): void
    {
        $this->get('/api/user')->assertRedirect(route('admin.login'));
        $this->getJson('/api/user')->assertUnauthorized();
    }

    public function test_the_admin_area_needs_the_admin_role_not_just_a_login(): void
    {
        $this->actingAs($this->nonAdmin())->get('/admin/dashboard')->assertForbidden();
        $this->actingAs($this->nonAdmin())->get('/admin/services')->assertForbidden();

        $this->actingAs($this->admin())->get('/admin/dashboard')->assertOk();
    }

    public function test_admin_login_refuses_accounts_that_are_not_admins(): void
    {
        $user = $this->nonAdmin();

        $this->post('/admin/login', ['email' => $user->email, 'password' => 'secret-pass-1'])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_admin_contacts_only_has_the_actions_that_exist(): void
    {
        $admin = $this->admin();
        $contact = Contact::create(['name' => 'Ada', 'email' => 'ada@example.test', 'service' => 'Cleaning', 'message' => 'Hi']);

        $this->actingAs($admin)->get('/admin/contacts')->assertOk();
        $this->actingAs($admin)->get("/admin/contacts/{$contact->id}")->assertOk();
        $this->actingAs($admin)->get('/admin/contacts/create')->assertNotFound(); // used to be a 500
        $this->actingAs($admin)->get("/admin/contacts/{$contact->id}/edit")->assertNotFound();
    }

    public function test_careers_index_redirects_to_the_careers_page(): void
    {
        $this->get('/careers/index')->assertRedirect(route('careers.public'));
    }

    public function test_the_contact_mailable_can_be_built(): void
    {
        $html = (new ContactMail(['name' => 'Ada', 'phone' => '123', 'subject' => 'Hi', 'email' => 'ada@example.test', 'message' => 'Please call me.']))->render();

        $this->assertStringContainsString('Please call me.', $html);
    }

    public function test_the_contact_form_works_when_the_optional_phone_is_left_out(): void
    {
        Notification::fake();

        $this->post('/contact/submit', ['name' => 'Ada', 'email' => 'ada@example.test', 'service' => 'Cleaning', 'message' => 'Hello'])
            ->assertRedirect()->assertSessionHas('success');

        $this->assertSame(1, Contact::count());
        Notification::assertSentOnDemand(NewContactSubmission::class);

        $mail = (new NewContactSubmission(['name' => 'Ada', 'email' => 'ada@example.test', 'service' => 'Cleaning', 'message' => 'Hello']))->toMail(new \stdClass);
        $this->assertContains('Phone: Not provided', $mail->introLines);
    }
}
