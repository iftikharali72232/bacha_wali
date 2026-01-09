<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            [
                'title' => 'Project leadership',
                'description' => 'Weekly milestones, transparent procurement, and live schedules keep every stage visible for owners and architects.',
                'icon' => '🧭',
                'sort_order' => 1,
            ],
            [
                'title' => 'Trade craftsmanship',
                'description' => 'Certified carpenters, MEP technicians, and finish crews craft high-impact details on every build.',
                'icon' => '⚡',
                'sort_order' => 2,
            ],
            [
                'title' => 'Site safety',
                'description' => 'Daily safety briefings, PPE, and digital checklists protect crews, clients, and inspectors.',
                'icon' => '🦺',
                'sort_order' => 3,
            ],
            [
                'title' => 'Client care',
                'description' => 'One point of contact handles approvals, invoices, and punch lists so you never chase updates.',
                'icon' => '🤝',
                'sort_order' => 4,
            ],
        ];

        foreach ($defaults as $feature) {
            Feature::updateOrCreate([
                'title' => $feature['title'],
            ], $feature);
        }
    }
}
