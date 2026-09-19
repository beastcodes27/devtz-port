<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Marcus Vance',
                'client_role' => 'VP of Engineering',
                'company' => 'Nexus Financials UK',
                'quote' => 'DevTZ overhauled our core settlement rails in under 3 months. Our API p99 latency plummeted from 480ms down to 32ms. They write the cleanest, most resilient Laravel code in the industry.',
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'project_type' => 'FinTech Architecture',
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Dr. Aris Thorne',
                'client_role' => 'Chief Technology Officer',
                'company' => 'OmniPulse Health Systems',
                'quote' => 'Finding engineers who understand both HIPAA security compliance and fluid mobile UX is nearly impossible. DevTZ delivered a Flutter telemedicine platform that our doctors and patients adore.',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'project_type' => 'Mobile Health Ecosystem',
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Elena Rostova',
                'client_role' => 'Head of Infrastructure',
                'company' => 'AeroSystems Cloud',
                'quote' => 'Our AWS monthly cloud invoice was spiraling out of control. DevTZ restructured our Kubernetes clusters and container workloads, instantly slashing our infrastructure bill by 42%.',
                'avatar_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'project_type' => 'Cloud & DevOps Automation',
                'order' => 3,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }
    }
}
