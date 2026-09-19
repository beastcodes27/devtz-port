<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\CompanyStat;
use App\Models\ContactInquiry;
use App\Models\NewsletterSubscriber;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_landing_page_renders_successfully(): void
    {
        Service::create([
            'title' => 'Web Apps',
            'slug' => 'web-apps',
            'tagline' => 'Scalable systems',
            'description' => 'Fast Laravel apps',
            'icon' => 'globe',
            'features' => ['SaaS', 'APIs'],
            'tech_stack' => ['Laravel', 'Vue'],
            'order' => 1,
            'is_featured' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('DevTZ');
        $response->assertSee('Web Apps');
        $response->assertSee('#1C2459');
        $response->assertSee('#F5FF67');
    }

    public function test_contact_form_submits_and_stores_inquiry(): void
    {
        $payload = [
            'name' => 'Sarah Connor',
            'email' => 'sarah@cyberdyne.io',
            'company' => 'Cyberdyne Systems',
            'project_type' => 'custom-web-application',
            'budget_range' => '$10,000 - $25,000',
            'timeline' => '1-3-months',
            'message' => 'We need an enterprise Laravel architecture with real-time telemetry streaming.',
        ];

        $response = $this->post('/contact', $payload);

        $response->assertRedirect('/#contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_inquiries', [
            'email' => 'sarah@cyberdyne.io',
            'name' => 'Sarah Connor',
            'status' => 'new',
        ]);
    }

    public function test_newsletter_subscription_registers_subscriber(): void
    {
        $response = $this->post('/newsletter/subscribe', [
            'email' => 'lead.architect@enterprise.com',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'lead.architect@enterprise.com',
            'status' => 'active',
        ]);
    }
}
