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
                'title' => 'Custom Web Application Engineering',
                'slug' => 'custom-web-applications',
                'tagline' => 'High-performance, scalable web systems engineered with Laravel & Vue/React',
                'description' => 'From enterprise SaaS platforms to bespoke internal portals, we engineer reliable, resilient web applications that handle heavy load with sub-100ms response times.',
                'icon' => 'globe',
                'features' => [
                    'Bespoke SaaS Architectures & Multi-tenancy',
                    'Real-time WebSockets & Live Telemetry',
                    'Complex Business Logic & Billing Pipelines',
                    'Role-Based Access Control (RBAC) & Audit Logging'
                ],
                'tech_stack' => ['Laravel 12', 'Vue 3', 'React', 'Tailwind CSS', 'PostgreSQL', 'Redis'],
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Cloud Infrastructure & Microservices',
                'slug' => 'cloud-infrastructure-microservices',
                'tagline' => 'Zero-downtime distributed systems on AWS, Kubernetes & Docker',
                'description' => 'We design fault-tolerant containerized architectures, auto-scaling clusters, and robust event-driven message buses designed for 99.99% uptime guarantees.',
                'icon' => 'cloud',
                'features' => [
                    'Infrastructure as Code (Terraform & Pulumi)',
                    'Kubernetes Cluster Orchestration & Helm',
                    'Serverless Microservices & Event Streams',
                    'Automated Multi-Region Disaster Recovery'
                ],
                'tech_stack' => ['AWS', 'Docker', 'Kubernetes', 'Terraform', 'Kafka', 'Redis Cluster'],
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'Cross-Platform Mobile Applications',
                'slug' => 'cross-platform-mobile-apps',
                'tagline' => 'Native-grade iOS & Android applications with fluid 120fps UI',
                'description' => 'Delivering seamless mobile experiences using Flutter and React Native, tightly coupled with robust offline-first synchronization and real-time push notifications.',
                'icon' => 'smartphone',
                'features' => [
                    'Offline-First Local SQLite/WatermelonDB Sync',
                    'Biometric Authentication & Secure Enclaves',
                    'In-App Subscriptions & Payment Gateways',
                    'Interactive Animations & Device Sensor Integrations'
                ],
                'tech_stack' => ['Flutter', 'Dart', 'React Native', 'TypeScript', 'GraphQL', 'Firebase'],
                'order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'Applied AI & Automation Systems',
                'slug' => 'applied-ai-automation',
                'tagline' => 'Custom LLM agents, RAG pipelines, and intelligent workflow automation',
                'description' => 'We integrate state-of-the-art LLMs, vector search databases, and automated agentic workflows directly into your business logic to 10x operational throughput.',
                'icon' => 'cpu',
                'features' => [
                    'Enterprise Retrieval-Augmented Generation (RAG)',
                    'Custom Fine-Tuned AI Agents & Automations',
                    'Document Extraction & Semantic Search Pipelines',
                    'Predictive Analytics & Anomaly Detection Models'
                ],
                'tech_stack' => ['Python', 'LangChain', 'FastAPI', 'PgVector', 'OpenAI', 'Anthropic'],
                'order' => 4,
                'is_featured' => true,
            ],
            [
                'title' => 'API Development & Enterprise Integrations',
                'slug' => 'api-development-integrations',
                'tagline' => 'Blazing-fast REST & GraphQL APIs with military-grade security',
                'description' => 'We build secure, thoroughly documented APIs and webhook architectures that connect legacy ERPs, payment processors, and modern third-party ecosystems seamlessly.',
                'icon' => 'network',
                'features' => [
                    'Comprehensive OpenAPI / Swagger Documentation',
                    'OAuth2, JWT & Mutual TLS Security',
                    'High-Concurrency Webhook Delivery Engines',
                    'Rate Limiting, Throttling & DDoS Protection'
                ],
                'tech_stack' => ['Laravel Octane', 'GraphQL', 'Stripe API', 'Postman', 'OAuth2', 'Go'],
                'order' => 5,
                'is_featured' => true,
            ],
            [
                'title' => 'DevOps, CI/CD & Security Hardening',
                'slug' => 'devops-cicd-security',
                'tagline' => 'Continuous delivery pipelines and impenetrable security audits',
                'description' => 'Eliminate release friction with continuous deployment pipelines, automated security scanning, penetration testing, and round-the-clock telemetry monitoring.',
                'icon' => 'shield-check',
                'features' => [
                    'GitHub Actions & GitLab CI/CD Automation',
                    'Static & Dynamic Code Security Scanning (SAST/DAST)',
                    'Automated Vulnerability Patching & Dependency Health',
                    'Full Telemetry with Prometheus, Grafana & Sentry'
                ],
                'tech_stack' => ['GitHub Actions', 'Prometheus', 'Grafana', 'Sentry', 'SonarQube', 'Linux'],
                'order' => 6,
                'is_featured' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
