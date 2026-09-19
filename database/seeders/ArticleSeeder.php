<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Achieving 50,000 Req/Sec in Laravel 12 with Octane & FrankenPHP',
                'slug' => 'laravel-12-octane-frankenphp-scaling',
                'author' => 'Tariq Al-Mansoor',
                'author_role' => 'Principal Software Architect',
                'category' => 'Architecture',
                'summary' => 'A deep dive into zero-allocation state management, worker concurrency pools, and memory leak mitigation in production Laravel workloads.',
                'content' => 'High-throughput enterprise workloads require rethinking the traditional PHP request lifecycle. By moving to worker-based execution models like FrankenPHP and Swoole inside Laravel Octane, our servers retain application boots in memory, eliminating redundant bootstrapping overhead. In this benchmark breakdown, we examine our production optimizations that slashed memory overhead by 70% while maintaining sub-15ms p99 latency under synthetic DDOS test suites.',
                'read_time_minutes' => 6,
                'tags' => ['Laravel 12', 'Octane', 'FrankenPHP', 'Performance'],
                'cover_image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1200&q=80',
                'published_at' => Carbon::now()->subDays(4),
                'is_featured' => true,
            ],
            [
                'title' => 'Enterprise RAG: Beyond Naive Vector Search with Hybrid Re-ranking',
                'slug' => 'enterprise-rag-hybrid-reranking',
                'author' => 'Zara Chen',
                'author_role' => 'Lead AI Engineer',
                'category' => 'Artificial Intelligence',
                'summary' => 'Why cosine similarity alone fails on technical documentation and how BM25 combined with cross-encoder re-rankers yields 99% precision.',
                'content' => 'Vector embeddings excel at semantic matching but frequently miss exact keyword identifiers, version codes, or regulatory statutory numbers. To build industrial-grade retrieval systems for our clients, DevTZ implements a hybrid two-tier retrieval architecture. Stage 1 executes parallel dense vector retrieval (PgVector) and sparse BM25 indexing. Stage 2 runs a fast cross-encoder to dynamically score candidates prior to synthesis.',
                'read_time_minutes' => 8,
                'tags' => ['AI', 'PgVector', 'RAG', 'Python'],
                'cover_image' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&w=1200&q=80',
                'published_at' => Carbon::now()->subDays(12),
                'is_featured' => true,
            ],
            [
                'title' => 'Zero-Downtime Multi-Region Database Migrations at Scale',
                'slug' => 'zero-downtime-multi-region-migrations',
                'author' => 'Devin Vance',
                'author_role' => 'Staff Infrastructure Engineer',
                'category' => 'Cloud & DevOps',
                'summary' => 'The expand-and-contract pattern for schema evolution without locking tables or dropping active customer requests.',
                'content' => 'Running migrations on 100M+ row PostgreSQL tables in live production requires zero locks. We walk through the phase-gated rollout: 1) Add nullable column, 2) Double-write via Laravel Eloquent observers, 3) Backfill historical chunks asynchronously via Horizon queue workers, 4) Flip reads to new schema, 5) Deprecate legacy columns. No downtime, zero customer disruption.',
                'read_time_minutes' => 5,
                'tags' => ['PostgreSQL', 'DevOps', 'CI/CD', 'Database'],
                'cover_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80',
                'published_at' => Carbon::now()->subDays(20),
                'is_featured' => true,
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
    }
}
