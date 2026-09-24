<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Custom Web Applications',
                'slug' => 'custom-web-applications',
                'tagline' => 'SaaS platforms, internal management tools & customer portals',
                'description' => 'We engineer bespoke, high-performance web applications that streamline operations, handle heavy concurrent traffic, and convert complex workflows into intuitive software.',
                'icon' => 'globe',
                'features' => [
                    'Bespoke Multi-Tenant SaaS Architectures',
                    'Enterprise Portals & Internal Operations Tools',
                    'Role-Based Access Control (RBAC) & Audit Logging',
                    'Real-Time WebSockets & Telemetry Dashboards',
                ],
                'deliverables' => [
                    'Multi-tenant SaaS foundation with automated tenant isolation & billing',
                    'Internal operations dashboard with RBAC and detailed audit logs',
                    'Live WebSocket telemetry and real-time push event bus',
                    'Sub-100ms API response tuning with Redis caching topologies',
                ],
                'tech_stack' => ['Laravel 12', 'Vue 3', 'React', 'Tailwind CSS', 'PostgreSQL', 'Redis'],
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Mobile Application Development',
                'slug' => 'mobile-application-development',
                'tagline' => 'Native-grade iOS & Android with React Native / Flutter',
                'description' => 'Delivering fluid cross-platform mobile experiences with 120fps interfaces, robust offline-first synchronization, and secure biometric authentication.',
                'icon' => 'smartphone',
                'features' => [
                    'Cross-Platform iOS & Android Deployments',
                    'Offline-First Local Database Synchronization',
                    'Biometric Security & Encrypted Credential Vaults',
                    'In-App Purchases & Real-Time Push Notifications',
                ],
                'deliverables' => [
                    'Production-ready iOS and Android binaries (App Store & Google Play)',
                    'Offline-first SQLite/WatermelonDB sync engine for zero data loss',
                    'Biometric authentication (FaceID, Fingerprint) & secure token storage',
                    'Push notification pipelines and automated in-app purchases',
                ],
                'tech_stack' => ['Flutter', 'React Native', 'Dart', 'TypeScript', 'GraphQL', 'Firebase'],
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'Backend & API Systems',
                'slug' => 'backend-api-systems',
                'tagline' => 'Cloud architecture, payment gateway integration & database design',
                'description' => 'Building rock-solid server architectures, high-speed REST & GraphQL APIs, and resilient data layers designed for zero downtime and financial-grade consistency.',
                'icon' => 'database',
                'features' => [
                    'High-Concurrency REST & GraphQL API Engines',
                    'Stripe & Banking Payment Gateway Integrations',
                    'Relational & NoSQL Database Optimization',
                    'Event-Driven Microservices & Queue Pipelines',
                ],
                'deliverables' => [
                    'High-throughput REST & GraphQL endpoints with OpenAPI/Swagger specs',
                    'PCI-compliant Stripe & banking payment gateway integrations',
                    'PostgreSQL schema design with connection pooling and replicas',
                    'Event-driven asynchronous background job queues and webhook relays',
                ],
                'tech_stack' => ['Laravel Octane', 'PostgreSQL', 'Redis Cluster', 'Stripe API', 'Go', 'Docker'],
                'order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'UI/UX Design & Digital Modernization',
                'slug' => 'ui-ux-digital-modernization',
                'tagline' => 'Design systems, user experience & legacy system modernisation',
                'description' => 'Transforming legacy software into intuitive, modern digital experiences backed by clean cyber aesthetics, accessible component systems, and proven conversion design.',
                'icon' => 'layout',
                'features' => [
                    'Comprehensive Design Systems & Token Architecture',
                    'Legacy Application Refactoring & Replatforming',
                    'Interactive Prototypes & Usability Verification',
                    'Responsive Cyber-Minimalist Interface Design',
                ],
                'deliverables' => [
                    'Complete Figma design system with tokenized color, typography & components',
                    'Interactive high-fidelity click-through prototypes for stakeholder signoff',
                    'WCAG AAA accessible Tailwind CSS frontend component library',
                    'Legacy system UI/UX refactoring roadmap and replatforming strategy',
                ],
                'tech_stack' => ['Figma', 'Tailwind CSS', 'Alpine.js', 'Storybook', 'WCAG AAA'],
                'order' => 4,
                'is_featured' => true,
            ],
            [
                'title' => 'Cloud Infrastructure & DevOps',
                'slug' => 'cloud-infrastructure-devops',
                'tagline' => 'Automated Kubernetes clusters, zero-downtime CI/CD & Terraform IaC',
                'description' => 'Architecting resilient multi-region cloud environments on AWS with automated deployment pipelines, canary releases, and 99.99% uptime guarantees.',
                'icon' => 'cloud',
                'features' => [
                    'Infrastructure as Code (Terraform & OpenTofu)',
                    'Automated Multi-Stage CI/CD Deployment Pipelines',
                    'Kubernetes & Docker Cluster Orchestration',
                    'Continuous Telemetry, Logging & Cost Optimization',
                ],
                'deliverables' => [
                    'Production Kubernetes (EKS/GKE) clusters with autoscaling configurations',
                    'Infrastructure as Code (Terraform) for reproducible multi-region deployments',
                    'GitHub Actions CI/CD pipelines with automated security audits (SAST)',
                    'Full-stack Prometheus, Grafana, and Sentry telemetry dashboards',
                ],
                'tech_stack' => ['AWS', 'Kubernetes', 'Docker', 'Terraform', 'Prometheus', 'Grafana'],
                'order' => 5,
                'is_featured' => true,
            ],
            [
                'title' => 'Applied AI & Automation Systems',
                'slug' => 'applied-ai-automation',
                'tagline' => 'Enterprise RAG pipelines, LLM agent workflows & vector search',
                'description' => 'Integrating domain-specific LLM agents, semantic vector search, and intelligent workflow automations directly into your core business applications.',
                'icon' => 'cpu',
                'features' => [
                    'Enterprise Retrieval-Augmented Generation (RAG)',
                    'Autonomous Workflow AI Agents & Bots',
                    'Vector Search & Semantic Document Discovery',
                    'Predictive Analytics & Automated Anomaly Detection',
                ],
                'deliverables' => [
                    'Enterprise Retrieval-Augmented Generation (RAG) knowledge engine',
                    'Custom autonomous LLM agents integrated into core business logic',
                    'High-performance PgVector semantic document search pipelines',
                    'Automated anomaly detection and predictive operational analytics',
                ],
                'tech_stack' => ['Python', 'PgVector', 'OpenAI', 'LangChain', 'FastAPI', 'Anthropic'],
                'order' => 6,
                'is_featured' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
