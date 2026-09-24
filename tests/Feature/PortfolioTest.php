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
        $view->assertSee('Projects');
        $view->assertSee('Team');
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

    public function test_team_component_displays_core_engineers_and_specializations(): void
    {
        $view = $this->view('components.team');

        $view->assertSee('CORE ARCHITECTS & ENGINEERS', false);
        $view->assertSee('The engineering team behind the systems.');
        $view->assertSee('Beast');
        $view->assertSee('Lead Systems Architect');
        $view->assertSee('Sarah Chen');
        $view->assertSee('Marcus Vance');
        $view->assertSee('Elena Rostova');
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

    public function test_projects_component_renders_projects_with_screenshots_description_and_demo_link(): void
    {
        $project = new Project([
            'title' => 'NexusPay: Multi-Currency Settlement',
            'slug' => 'nexuspay-settlement',
            'client_name' => 'Nexus Global',
            'industry' => 'Fintech',
            'category' => 'web',
            'tagline' => 'Sub-40ms high-throughput payment orchestrator',
            'description' => 'Real-time multi-currency banking settlement engine with automated compliance reconciliation.',
            'summary' => 'Fault-tolerant payment rail.',
            'challenge' => 'High transaction latency and dropped connections during peak clearing windows.',
            'solution' => 'Event-driven Octane architecture with idempotent ledger queues.',
            'outcome' => 'Reduced processing latency by 45% with 99.98% ledger settlement accuracy.',
            'tech_stack' => ['Laravel 12', 'PostgreSQL', 'Redis'],
            'screenshots' => [
                'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80',
            ],
            'live_url' => 'https://nexuspay.devtz-demo.com',
        ]);
        $project->setRelation('metrics', collect([]));

        $view = $this->view('components.projects', [
            'projects' => collect([$project]),
        ]);

        $view->assertSee('FEATURED PROJECTS');
        $view->assertSee('NexusPay: Multi-Currency Settlement');
        $view->assertSee('Fintech');
        $view->assertSee('Project Description');
        $view->assertSee('Real-time multi-currency banking settlement engine');
        $view->assertSee('View Project');
        $view->assertSee('Live Demo');
        $view->assertSee('https://nexuspay.devtz-demo.com');
    }

    public function test_admin_project_create_form_renders_screenshot_upload_and_demo_link_inputs(): void
    {
        $view = $this->withViewErrors([])->view('admin.projects.create');

        $view->assertSee('Deploy New Project');
        $view->assertSee('Project Description');
        $view->assertSee('Project Demo Link (Live URL)');
        $view->assertSee('name="screenshot_files[]"', false);
        $view->assertSee('enctype="multipart/form-data"', false);
    }
}
