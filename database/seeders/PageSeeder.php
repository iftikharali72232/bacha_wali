<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::updateOrCreate([
            'slug' => 'about',
        ], [
            'title' => 'Bacha Wali',
            'headline' => 'PEC registered contractor (CA/331) for civil, electrical & mechanical works.',
            'summary' => 'Sole proprietorship delivering buildings, roads, and housing society development with qualified engineers and disciplined execution.',
            'body' => 'We handle civil and structural works, roads and pavements, bridge structures, water supply and sewerage, prefabricated/steel buildings, HVAC, fire prevention systems, lifts & escalators, building automation, LV/HV installation, specialized lighting, telecommunication installation/external works, and IT & software engagements—planned with safety, documentation, and quality control.',
            'cta_label' => 'See our case studies',
            'cta_url' => '#services',
        ]);

        Page::updateOrCreate([
            'slug' => 'contact',
        ], [
            'title' => 'Contact & Support',
            'headline' => 'Share your next build idea and we will follow up within one business day.',
            'summary' => 'Tell us about your site, timeline, and preferred finish—our team handles the rest.',
            'body' => 'Every project receives a dedicated success specialist, transparent cost controls, and a shared project portal so you always know what the crews are doing.',
            'cta_label' => 'Request a callback',
            'cta_url' => 'mailto:hello@bachawali.com',
            'meta' => [
                'phone' => '+92 300 600 8080',
                'email' => 'hello@bachawali.com',
                'address' => 'Gulberg III, Lahore, Punjab',
                'hours' => 'Mon–Sat · 8am–8pm',
            ],
        ]);
    }
}
