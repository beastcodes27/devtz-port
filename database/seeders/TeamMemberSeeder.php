<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Juma Hamisi',
                'role' => 'Founder & Principal Systems Architect',
                'bio' => '10+ years architecting enterprise fintech systems, high-concurrency microservices, and distributed cloud backends across East Africa.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Amina Hassan',
                'role' => 'Lead Web Architect & Frontend Lead',
                'bio' => 'Expert in modern JavaScript frameworks (Vue 3, React, Tailwind CSS) and micro-frontend architectures with a focus on web performance.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'David Mwangi',
                'role' => 'Mobile & Systems Specialist',
                'bio' => 'Specialist in Flutter & native iOS/Android development, offline-first SQLite sync, biometric authentication, and mobile payment gateways.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Baraka Said',
                'role' => 'Cloud Infrastructure & SRE Engineer',
                'bio' => 'Automating multi-cloud Kubernetes clusters (AWS, GCP), CI/CD pipelines, Infrastructure-as-Code with Terraform, and zero-downtime deployments.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Neema Temba',
                'role' => 'AI Systems & Data Engineering Lead',
                'bio' => 'Building RAG semantic search engines, vector database pipelines (Pinecone/pgvector), and automated LLM workflow integrations.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Emmanuel Kiprop',
                'role' => 'Principal Solutions & Security Specialist',
                'bio' => 'Driving enterprise ERP integrations, security compliance audits, automated test suites, and end-to-end client solution delivery.',
                'portfolio' => 'https://devtz.site',
                'github' => 'https://github.com/DevTZ',
                'linkedin' => 'https://linkedin.com/company/devtz',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($members as $data) {
            TeamMember::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
