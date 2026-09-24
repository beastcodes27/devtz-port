<?php

namespace Tests\Feature;

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
        $response->assertDontSee('admin@devtz.com');
        $response->assertDontSee('Admin Credentials:');
    }

    public function test_login_page_does_not_prefill_credentials(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertDontSee('value="admin@devtz.com"', false);
        $response->assertDontSee('value="password"', false);
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

    public function test_beast_admin_can_authenticate_with_credentials(): void
    {
        $beast = User::create([
            'name' => 'DevTZ Beast Admin',
            'email' => 'beast@devtz.com',
            'password' => Hash::make('pass123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'beast@devtz.com',
            'password' => 'pass123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticatedAs($beast);
    }

    public function test_admin_can_view_admin_users_list(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/users');

        $response->assertStatus(200);
        $response->assertSee('Mission Control Operators');
        $response->assertSee($this->admin->email);
    }

    public function test_admin_can_view_create_admin_user_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/users/create');

        $response->assertStatus(200);
        $response->assertSee('Register New Admin Operator');
    }

    public function test_admin_can_create_new_admin_user(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/users', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@devtz.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@devtz.com',
        ]);
    }

    public function test_admin_cannot_create_admin_with_duplicate_email(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/users', [
            'name' => 'Duplicate Admin',
            'email' => 'admin@devtz.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_guest_cannot_access_admin_user_routes(): void
    {
        $response = $this->get('/admin/users');
        $response->assertRedirect('/login');

        $createResponse = $this->post('/admin/users', [
            'name' => 'Hacker Admin',
            'email' => 'hacker@devtz.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        $createResponse->assertRedirect('/login');
    }
}
