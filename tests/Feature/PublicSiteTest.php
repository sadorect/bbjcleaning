<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render(): void
    {
        Service::create(['name' => 'Residential Cleaning', 'slug' => 'residential-cleaning', 'shortDescr' => 'Homes', 'image' => 'x.jpg']);

        foreach (['/', '/about', '/services', '/contact', '/careers', '/careers/track', '/booking', '/admin/login', '/admin/password/reset'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_unknown_urls_return_404(): void
    {
        $this->get('/does-not-exist')->assertNotFound();
        $this->get('/bbj/wp-admin/install.php')->assertNotFound();
    }

    public function test_admin_pages_require_login(): void
    {
        foreach (['/admin/dashboard', '/admin/services', '/admin/bookings', '/admin/applications'] as $path) {
            $this->get($path)->assertRedirect(route('admin.login'));
        }
    }
}
