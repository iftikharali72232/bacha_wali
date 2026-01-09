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
            'title' => 'Bachawali Builders',
            'headline' => 'Trusted contractor crews built for fast-moving communities.',
            'summary' => 'We lead construction, renovation, and adaptive-reuse projects with laser focus on communication, schedule reliability, and craftsmanship.',
            'body' => 'From design coordination to final walkthroughs, every job is backed by weekly milestone reviews, documented safety checks, and proactive materials forecasting to avoid downtime.',
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
