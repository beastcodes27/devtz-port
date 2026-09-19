<?php

namespace Database\Seeders;

use App\Models\CompanyStat;
use Illuminate\Database\Seeder;

class CompanyStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'label' => 'Production Uptime SLA',
                'value' => '99.99%',
                'subtext' => 'Zero unplanned outages on deployed clusters',
                'icon' => 'shield',
                'order' => 1,
            ],
            [
                'label' => 'Products Shipped',
                'value' => '45+',
                'subtext' => 'From Series A scaleups to Fortune 500 enterprises',
                'icon' => 'rocket',
                'order' => 2,
            ],
            [
                'label' => 'Avg API Response',
                'value' => '< 35ms',
                'subtext' => 'Optimized with Laravel Octane & Redis caching',
                'icon' => 'zap',
                'order' => 3,
            ],
            [
                'label' => 'Client Retention',
                'value' => '96.8%',
                'subtext' => 'Long-term engineering partnerships',
                'icon' => 'heart',
                'order' => 4,
            ],
        ];

        foreach ($stats as $s) {
            CompanyStat::updateOrCreate(['label' => $s['label']], $s);
        }
    }
}
