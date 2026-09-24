<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectMetric;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'NexusPay: Multi-Currency Enterprise Settlement Gateway',
                'slug' => 'nexuspay-settlement-gateway',
                'client_name' => 'Nexus Global Financials Ltd.',
                'industry' => 'Fintech',
                'category' => 'web',
                'tagline' => 'Sub-40ms high-throughput payment orchestrator processing $140M+ monthly.',
                'summary' => 'DevTZ architected a fault-tolerant payment rail connecting 14 African & EU banking protocols with real-time settlement ledgers.',
                'challenge' => 'The client faced high transaction failure rates and sluggish ledger reconciliations under peak traffic, with legacy monolithic bottlenecks causing timeouts.',
                'solution' => 'Engineered an event-driven Laravel Octane & Redis cluster architecture with optimistic lock isolation, idempotency validation, and automated compliance auditing.',
                'outcome' => 'Reduced payment processing latency by 45% with 99.98% ledger settlement accuracy.',
                'banner_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                'screenshots' => [
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                ],
                'live_url' => 'https://nexuspay.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/nexuspay-core',
                'tech_stack' => ['Laravel 12', 'Octane', 'PostgreSQL', 'Redis Cluster', 'Tailwind CSS', 'Vue 3'],
                'order' => 1,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Monthly Volume Processed', 'value' => '$140M+'],
                    ['label' => 'Avg API Response Time', 'value' => '32ms'],
                    ['label' => 'Transaction Success Rate', 'value' => '99.98%'],
                ],
            ],
            [
                'title' => 'OmniPulse: Telehealth & Clinical Workflow Platform',
                'slug' => 'omnipulse-telehealth-platform',
                'client_name' => 'OmniHealth Technologies',
                'industry' => 'Healthcare & Telehealth',
                'category' => 'mobile',
                'tagline' => 'HIPAA-compliant cross-platform mobile clinic ecosystem with live encrypted WebRTC video.',
                'summary' => 'Complete patient triage, electronic health record (EHR) synchronization, and doctor scheduling engine used across 60+ clinics.',
                'challenge' => 'Existing legacy native iOS/Android apps suffered from fragmented feature parity, frequent sync conflicts in low-connectivity areas, and HIPAA compliance risks.',
                'solution' => 'Developed a unified Flutter cross-platform architecture with local encrypted SQLite offline caching, automated syncing algorithms, and end-to-end encrypted WebRTC consultations.',
                'outcome' => 'Decreased sync conflict rates by 94% across 120,000+ active patients and 60+ clinics.',
                'banner_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                'screenshots' => [
                    'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?auto=format&fit=crop&w=1200&q=80',
                ],
                'live_url' => 'https://omnipulse.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/omnipulse-mobile',
                'tech_stack' => ['Flutter', 'Dart', 'Laravel API', 'WebRTC', 'PostgreSQL', 'Docker'],
                'order' => 2,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Active Clinic Users', 'value' => '120,000+'],
                    ['label' => 'Video Consult Reliability', 'value' => '99.95%'],
                    ['label' => 'Sync Conflict Reduction', 'value' => '94%'],
                ],
            ],
            [
                'title' => 'AeroCloud: Automated Kubernetes Fleet Orchestrator',
                'slug' => 'aerocloud-kubernetes-orchestrator',
                'client_name' => 'AeroSystems Cloud Corp',
                'industry' => 'Cloud Infrastructure',
                'category' => 'cloud',
                'tagline' => 'Autonomous multi-cloud management engine automating canary rollouts and zero-downtime scaling.',
                'summary' => 'DevTZ created an infrastructure automation control plane that orchestrates thousands of containers across AWS and Bare-Metal nodes.',
                'challenge' => 'Manual deployments and configuration drift between staging and multi-region clusters resulted in frequent production incidents and bloated AWS costs.',
                'solution' => 'Built an autonomous CI/CD control panel with GitOps pipelines, Prometheus metrics autoscaling, and automated cost optimization algorithms.',
                'outcome' => 'Cut monthly infrastructure cloud expenditure by 42% and accelerated deployments to < 90s.',
                'banner_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
                'live_url' => 'https://aerocloud.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/aerocloud-core',
                'tech_stack' => ['Go', 'Laravel 12', 'Kubernetes', 'Terraform', 'AWS EKS', 'Prometheus'],
                'order' => 3,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Infrastructure Cost Cut', 'value' => '42%'],
                    ['label' => 'Deployment Time', 'value' => '< 90s'],
                    ['label' => 'Automated Healing Events', 'value' => '10k+/mo'],
                ],
            ],
            [
                'title' => 'CogniSearch: Enterprise RAG Semantic Engine',
                'slug' => 'cognisearch-enterprise-rag-engine',
                'client_name' => 'Apex Legal & Compliance Group',
                'industry' => 'LegalTech & AI',
                'category' => 'ai',
                'tagline' => 'AI legal discovery platform indexing 8M+ confidential contracts with millisecond vector recall.',
                'summary' => 'Integrated LLM retrieval-augmented generation engine with role-based document access and cited audit responses.',
                'challenge' => 'Paralegals spent hundreds of hours manually reviewing thousands of PDF clauses and regulatory amendments with high human error risk.',
                'solution' => 'Implemented high-speed text extraction pipelines, PgVector embeddings index, hybrid BM25 + dense retrieval, and guardrailed LLM synthesis with exact document citations.',
                'outcome' => 'Accelerated complex contract review cycles by 14x across 8.2M+ confidential clauses.',
                'banner_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
                'live_url' => 'https://cognisearch.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/cognisearch-rag',
                'tech_stack' => ['Python', 'FastAPI', 'Laravel Admin', 'PgVector', 'LangChain', 'OpenAI'],
                'order' => 4,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Contract Review Speedup', 'value' => '14x'],
                    ['label' => 'Indexed Document Pages', 'value' => '8.2M+'],
                    ['label' => 'Citation Accuracy', 'value' => '99.2%'],
                ],
            ],
            [
                'title' => 'LogiTrack: Real-Time Fleet & Logistics Telematics',
                'slug' => 'logitrack-fleet-telematics',
                'client_name' => 'TransSahara Freightways',
                'industry' => 'Logistics & Supply Chain',
                'category' => 'web',
                'tagline' => 'Live IoT telemetry and route optimization dashboard for 1,200+ freight vehicles.',
                'summary' => 'Real-time WebSocket telemetry engine calculating geofences, fuel efficiency anomalies, and dynamic ETA updates.',
                'challenge' => 'Massive volume of continuous GPS sensor pings caused database lock contention and delayed dispatch alerts.',
                'solution' => 'Designed a TimescaleDB / Redis ingestion pipeline processing 25,000 telemetry messages/second with instantaneous map visualization.',
                'outcome' => 'Cut fleet fuel waste by 18.4% with 25,000 telemetry messages/second processed in real time.',
                'banner_image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80',
                'live_url' => 'https://logitrack.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/logitrack-iot',
                'tech_stack' => ['Laravel 12', 'TimescaleDB', 'Redis', 'Leaflet / Mapbox', 'WebSockets'],
                'order' => 5,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Telemetry Ingestion Rate', 'value' => '25k msg/s'],
                    ['label' => 'Fuel Waste Cut', 'value' => '18.4%'],
                    ['label' => 'On-Time Dispatch Rate', 'value' => '98.6%'],
                ],
            ],
            [
                'title' => 'TradeCore: Ultra-Low Latency Crypto Trading Terminal',
                'slug' => 'tradecore-crypto-terminal',
                'client_name' => 'Vortex Capital Syndicate',
                'industry' => 'Commerce & Trading',
                'category' => 'web',
                'tagline' => 'Sub-millisecond WebSocket order book and quantitative algorithmic execution suite.',
                'summary' => 'Institutional trader desktop web application featuring multi-exchange liquidity aggregation and automated risk limits.',
                'challenge' => 'Market makers required high-frequency chart rendering and real-time execution without UI thread freezing or lagging.',
                'solution' => 'Constructed WebGL-accelerated chart components, binary WebSocket serialization, and high-performance Laravel queue workers.',
                'outcome' => 'Achieved sub-15ms order execution latency handling over $65M+ daily transaction volume.',
                'banner_image' => 'https://images.unsplash.com/photo-1642543492481-44e81e3914a7?auto=format&fit=crop&w=1200&q=80',
                'live_url' => 'https://tradecore.devtz-demo.com',
                'github_url' => 'https://github.com/devtz/tradecore-terminal',
                'tech_stack' => ['Vue 3', 'Laravel 12', 'Swoole', 'Redis Streams', 'WebGL', 'Tailwind'],
                'order' => 6,
                'is_featured' => true,
                'metrics' => [
                    ['label' => 'Order Book Refresh Rate', 'value' => '60 FPS'],
                    ['label' => 'Execution Latency', 'value' => '< 15ms'],
                    ['label' => 'Daily Traded Volume', 'value' => '$65M+'],
                ],
            ],
        ];

        foreach ($projects as $projData) {
            $metrics = $projData['metrics'] ?? [];
            unset($projData['metrics']);

            $project = Project::updateOrCreate(['slug' => $projData['slug']], $projData);

            $project->metrics()->delete();
            foreach ($metrics as $idx => $m) {
                ProjectMetric::create([
                    'project_id' => $project->id,
                    'label' => $m['label'],
                    'value' => $m['value'],
                    'order' => $idx + 1,
                ]);
            }
        }
    }
}
