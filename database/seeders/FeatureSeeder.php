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
                'title' => 'Roads & pavements',
                'description' => 'Road construction, pavement works, drainage, retaining structures, and signcraft installation.',
                'icon' => '🛣️',
                'sort_order' => 1,
            ],
            [
                'title' => 'Bridges & structures',
                'description' => 'Bridge structures and structural works delivered with disciplined surveying, QA, and documentation.',
                'icon' => '🌉',
                'sort_order' => 2,
            ],
            [
                'title' => 'Water & sewerage',
                'description' => 'Water supply, sewerage works, and civil support for public infrastructure and communities.',
                'icon' => '🚰',
                'sort_order' => 3,
            ],
            [
                'title' => 'Buildings & maintenance',
                'description' => 'General buildings, concrete repairs, waterproofing, and prefabricated/steel framed buildings and industrial plants.',
                'icon' => '🏗️',
                'sort_order' => 4,
            ],
            [
                'title' => 'MEP systems',
                'description' => 'HVAC, fire prevention & protection, lifts & escalators, and building automation systems.',
                'icon' => '⚙️',
                'sort_order' => 5,
            ],
            [
                'title' => 'Electrical, telecom & IT',
                'description' => 'Low/high voltage installation, specialized lighting, telecommunication works, plus IT & software engagements.',
                'icon' => '🔌',
                'sort_order' => 6,
            ],
        ];

        $legacyTitles = [
            'Project leadership',
            'Trade craftsmanship',
            'Site safety',
            'Client care',
        ];

        $legacyFeatures = Feature::whereIn('title', $legacyTitles)->orderBy('id')->get();
        foreach ($legacyFeatures as $index => $legacyFeature) {
            if (! isset($defaults[$index])) {
                break;
            }

            $legacyFeature->update($defaults[$index]);
        }

        foreach ($defaults as $feature) {
            Feature::updateOrCreate(
                ['sort_order' => $feature['sort_order']],
                $feature
            );
        }
    }
}
