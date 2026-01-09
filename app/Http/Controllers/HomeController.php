<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Page;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $pages = Page::whereIn('slug', ['about', 'contact'])->get()->keyBy('slug');

        $about = $this->pageOrFallback($pages->get('about'), [
            'slug' => 'about',
            'title' => 'Bachawali Builders',
            'headline' => 'Trusted contractor teams that think like owners.',
            'summary' => 'We orchestrate complex builds and stylish renovations for commercial and residential clients across Punjab.',
            'body' => 'From concept to closing walkthrough, our crew leans on precise schedules, proactive safety, and clear communication so every handshake leads to a long-term referral.',
            'cta_label' => 'See our case studies',
            'cta_url' => '#services',
            'meta' => [],
        ]);

        $contact = $this->pageOrFallback($pages->get('contact'), [
            'slug' => 'contact',
            'title' => 'Contact & Support',
            'headline' => 'Share your next build idea and we will follow up within one business day.',
            'summary' => 'Tell us about your site, timelines, and budget; we handle surveys, permits, and estimating.',
            'body' => 'Our team keeps a live project board and assigns a dedicated client success specialist so you always know exactly where the job stands.',
            'cta_label' => 'Request a callback',
            'cta_url' => 'mailto:hello@bachawali.com',
            'meta' => [
                'phone' => '+92 300 600 8080',
                'email' => 'hello@bachawali.com',
                'address' => 'Gulberg III, Lahore, Punjab',
                'hours' => 'Mon–Sat · 8am–8pm',
            ],
        ]);

        $features = Feature::orderBy('sort_order')->orderBy('id')->get();
        if ($features->isEmpty()) {
            $features = $this->defaultFeatures();
        }

        $heroHighlights = [
            ['label' => 'Projects delivered', 'value' => '320+'],
            ['label' => 'Local trades', 'value' => '45 crews'],
            ['label' => 'Average rating', 'value' => '4.9/5'],
        ];

        $galleryImages = [
            'front_end.png',
            'WhatsApp Image 2026-01-08 at 10.23.21 PM (1).jpeg',
            'WhatsApp Image 2026-01-08 at 10.23.21 PM.jpeg',
            'WhatsApp Image 2026-01-08 at 10.24.37 PM.jpeg',
            'WhatsApp Image 2026-01-08 at 10.24.38 PM (1).jpeg',
            'WhatsApp Image 2026-01-08 at 10.24.38 PM.jpeg',
            'WhatsApp Image 2026-01-08 at 10.24.39 PM.jpeg',
            'WhatsApp Image 2026-01-08 at 10.28.59 PM.jpeg',
        ];

        $galleryVideos = [
            'WhatsApp Video 2026-01-08 at 10.30.30 PM.mp4',
            'WhatsApp Video 2026-01-08 at 10.30.31 PM.mp4',
            'WhatsApp Video 2026-01-08 at 10.31.11 PM.mp4',
        ];

        return view('home', compact('about', 'contact', 'features', 'heroHighlights', 'galleryImages', 'galleryVideos'));
    }

    private function pageOrFallback(?Page $page, array $defaults): Page
    {
        if ($page) {
            return $page;
        }

        $model = new Page($defaults);
        $model->exists = false;

        return $model;
    }

    private function defaultFeatures(): Collection
    {
        $segments = [
            ['title' => 'Project leadership', 'description' => 'We keep schedules visible, manage suppliers, and guard your finish line with weekly milestone reports.', 'icon' => '🧭', 'sort_order' => 1],
            ['title' => 'Trade craftsmanship', 'description' => 'Certified carpenters, electricians, and MEP crews execute with built-in QA checklists.', 'icon' => '⚡', 'sort_order' => 2],
            ['title' => 'Site safety', 'description' => 'Every crew member wears PPE, completes daily walkthroughs, and logs lessons learned for every job.', 'icon' => '🦺', 'sort_order' => 3],
            ['title' => 'Client care', 'description' => 'Your schedule is our schedule, with a single point of contact for approvals, invoices, and inspections.', 'icon' => '🤝', 'sort_order' => 4],
        ];

        return collect($segments)->map(fn ($segment) => new Feature($segment));
    }
}
