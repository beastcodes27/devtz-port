<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\ContactInquiry;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'DevTZ Lead Architect',
            'email' => 'admin@devtz.com',
            'password' => Hash::make('password'),
        ]);
    }

    public function test_guest_is_redirected_to_login_when_accessing_admin(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_team_member_can_view_login_page(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Mission Control');
        $response->assertSee('admin@devtz.com');
    }

    public function test_team_member_can_authenticate_with_valid_credentials(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@devtz.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_team_member_cannot_authenticate_with_invalid_password(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@devtz.com',
            'password' => 'wrong-pass',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('SYSTEM TELEMETRY');
        $response->assertSee($this->admin->name);
    }

    public function test_admin_can_create_new_portfolio_project(): void
    {
        $payload = [
            'title' => 'Quantum Ledger Protocol',
            'client_name' => 'Vortex Cryptographic Systems',
            'category' => 'web',
            'tagline' => 'Sub-millisecond settlement ledger',
            'summary' => 'High speed blockchain gateway',
            'challenge' => 'Legacy database deadlocks',
            'solution' => 'Event-driven Laravel Octane worker cluster',
            'banner_image' => 'https://example.com/banner.jpg',
            'screenshots_input' => "https://example.com/shot1.jpg\nhttps://example.com/shot2.jpg",
            'tech_stack_input' => 'Laravel 12, Octane, Postgres, Redis',
            'metric_labels' => ['Throughput', 'Latency'],
            'metric_values' => ['100k req/s', '12ms'],
        ];

        $response = $this->actingAs($this->admin)->post('/admin/projects', $payload);

        $response->assertRedirect('/admin/projects');
        
        $project = Project::where('title', 'Quantum Ledger Protocol')->first();
        $this->assertNotNull($project);
        $this->assertCount(3, $project->screenshots); // banner + 2 shots
        $this->assertContains('https://example.com/shot1.jpg', $project->screenshots);

        $this->assertDatabaseHas('project_metrics', [
            'label' => 'Throughput',
            'value' => '100k req/s',
        ]);
    }

    public function test_admin_can_update_inquiry_status(): void
    {
        $inquiry = ContactInquiry::create([
            'name' => 'Enterprise Prospect',
            'email' => 'prospect@corp.com',
            'project_type' => 'custom-web-application',
            'message' => 'Need 100k user concurrency application architecture.',
            'status' => 'new',
        ]);

        $response = $this->actingAs($this->admin)->patch("/admin/inquiries/{$inquiry->id}/status", [
            'status' => 'scheduled',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_inquiries', [
            'id' => $inquiry->id,
            'status' => 'scheduled',
        ]);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->admin)->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}

