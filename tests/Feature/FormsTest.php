<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FormsTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_a_message(): void
    {
        Notification::fake();

        $this->post('/contact/submit', [
            'name' => 'Ada', 'phone' => '', 'email' => 'ada@example.test', 'service' => 'Residential', 'message' => 'Hello',
        ])->assertRedirect()->assertSessionHas('success');

        $this->assertSame(1, Contact::count());
    }

    public function test_contact_form_rejects_bad_input(): void
    {
        $this->post('/contact/submit', ['name' => '', 'email' => 'bad'])
            ->assertSessionHasErrors(['name', 'email', 'service', 'message']);

        $this->assertSame(0, Contact::count());
    }

    public function test_booking_creates_a_booking_and_shows_the_confirmation(): void
    {
        Mail::fake();

        $this->post('/booking', [
            'first_name' => 'Ada', 'last_name' => 'L', 'email' => 'ada@example.test', 'phone' => '123',
            'service_type' => 'Residential', 'frequency' => 'weekly', 'property_type' => 'house',
            'square_footage' => 1200, 'address' => '1 Main St',
            'preferred_date' => now()->addDays(10)->toDateString(), 'preferred_time' => '10:00',
        ])->assertOk()->assertSee('BK-');

        $this->assertSame(1, Booking::count());
    }

    public function test_booking_rejects_a_past_date(): void
    {
        $this->post('/booking', [
            'first_name' => 'A', 'last_name' => 'L', 'email' => 'a@b.co', 'phone' => '1', 'service_type' => 'x',
            'frequency' => 'w', 'property_type' => 'h', 'square_footage' => 1, 'address' => 'a',
            'preferred_date' => '2020-01-01', 'preferred_time' => '10:00',
        ])->assertSessionHasErrors('preferred_date');

        $this->assertSame(0, Booking::count());
    }

    public function test_job_application_stores_the_resume_and_rejects_executables(): void
    {
        Storage::fake('public');
        $fields = [
            'first_name' => 'Ada', 'last_name' => 'L', 'email' => 'ada@example.test', 'gender' => 'female',
            'has_vehicle' => 1, 'employment_type' => 'full_time', 'can_work_in_canada' => 1,
            'available_days' => ['mon', 'tue'], 'preferred_hours' => 'day', 'weekend_availability' => 0,
            'has_cleaning_experience' => 1, 'years_experience' => 3,
        ];

        $this->post('/careers/store', $fields + ['resume' => UploadedFile::fake()->create('cv.pdf', 100, 'application/pdf')])
            ->assertRedirect()->assertSessionHas('success');
        $this->assertSame(1, JobApplication::count());
        $this->assertCount(1, Storage::disk('public')->files('resumes'));

        $this->post('/careers/store', $fields + ['resume' => UploadedFile::fake()->create('virus.exe', 10)])
            ->assertSessionHasErrors('resume');
        $this->assertSame(1, JobApplication::count());
    }

    public function test_admin_can_log_in_and_out(): void
    {
        $admin = User::factory()->create(['password' => bcrypt('secret-pass-1')]);

        $this->post('/admin/login', ['email' => $admin->email, 'password' => 'wrong'])->assertSessionHasErrors();
        $this->assertGuest();

        $this->post('/admin/login', ['email' => $admin->email, 'password' => 'secret-pass-1'])
            ->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
        $this->get('/admin/dashboard')->assertOk();

        $this->post('/admin/logout')->assertRedirect('/admin/login');
        $this->assertGuest();
    }
}
