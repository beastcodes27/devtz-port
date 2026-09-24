<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Service;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_navbar_displays_brand_and_navigation_links(): void
    {
        $view = $this->view('components.navbar');

        $view->assertSee('Services');
        $view->assertSee('Case Studies');
        $view->assertSee('Process');
        $view->assertSee('About Us');
        $view->assertSee('Contact');
        $view->assertSee('Get a Quote');
    }

    public function test_hero_section_displays_value_proposition_ctas_and_trust_badges(): void
    {
        $view = $this->view('components.hero');

        $view->assertSee('Transforming businesses through');
        $view->assertSee('enterprise-grade');
        $view->assertSee('digital solutions.');
        $view->assertSee('Custom Web Apps');
        $view->assertSee('Mobile Apps');
        $view->assertSee('System Integrations');
        $view->assertSee('Start a Project');
        $view->assertSee('View Our Work');
        $view->assertSee('devtz --cli');
        $view->assertSee('20+');
        $view->assertSee('Delivered Systems');
        $view->assertSee('99.9%');
        $view->assertSee('Reliability');
        $view->assertSee('Enterprise-Ready');
    }

    public function test_process_component_displays_systematic_workflow_stages(): void
    {
        $view = $this->view('components.process');

        $view->assertSee('HOW WE DELIVER');
        $view->assertSee('Our proven engineering process.');
        $view->assertSee('Discovery & Architecture Blueprint', false);
        $view->assertSee('Agile Sprint Engineering');
        $view->assertSee('Benchmark & Security Auditing', false);
        $view->assertSee('Production Rollout & Telemetry', false);
    }

    public function test_services_component_renders_interactive_cards_with_deliverables(): void
    {
        $service = new Service([
            'title' => 'Custom Web Applications',
            'slug' => 'custom-web-applications',
            'tagline' => 'High-concurrency SaaS platforms',
            'description' => 'Tailored enterprise web applications engineered for speed.',
            'icon' => 'globe',
            'deliverables' => [
                'SaaS Multi-Tenant Platforms',
                'Internal Management Tools & Portals',
            ],
            'tech_stack' => ['Laravel', 'Vue.js', 'PostgreSQL'],
            'order' => 1,
            'is_featured' => true,
        ]);

        $view = $this->view('components.services', [
            'services' => collect([$service]),
        ]);

        $view->assertSee('Custom Web Applications');
        $view->assertSee('Key Deliverables');
        $view->assertSee('SaaS Multi-Tenant Platforms');
    }

    public function test_projects_component_renders_problem_solution_cards(): void
    {
        $project = new Project([
            'title' => 'NexusPay: Multi-Currency Settlement',
            'slug' => 'nexuspay-settlement',
            'client_name' => 'Nexus Global',
            'industry' => 'Fintech',
            'category' => 'web',
            'tagline' => 'Sub-40ms high-throughput payment orchestrator',
            'summary' => 'Fault-tolerant payment rail.',
            'challenge' => 'High transaction latency and dropped connections during peak clearing windows.',
            'solution' => 'Event-driven Octane architecture with idempotent ledger queues.',
            'outcome' => 'Reduced processing latency by 45% with 99.98% ledger settlement accuracy.',
            'tech_stack' => ['Laravel 12', 'PostgreSQL', 'Redis'],
            'live_url' => 'https://nexuspay.devtz-demo.com',
        ]);
        $project->setRelation('metrics', collect([]));

        $view = $this->view('components.projects', [
            'projects' => collect([$project]),
        ]);

        $view->assertSee('CASE STUDIES');
        $view->assertSee('NexusPay: Multi-Currency Settlement');
        $view->assertSee('Fintech');
        $view->assertSee('High transaction latency');
        $view->assertSee('Event-driven Octane architecture');
        $view->assertSee('Reduced processing latency by 45%');
        $view->assertSee('View Case Study');
        $view->assertSee('Live Demo');
    }
}
