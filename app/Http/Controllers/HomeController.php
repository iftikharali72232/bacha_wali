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
            'title' => 'Bacha Wali',
            'headline' => 'PEC registered contractor (CA/331) for civil, electrical & mechanical works.',
            'summary' => 'Sole proprietorship delivering buildings, roads, and housing society development with qualified engineers and reliable execution.',
            'body' => 'Our scope spans road & pavement works, bridge structures, water supply & sewerage, general civil works, prefabricated/steel buildings, HVAC and fire prevention systems, lifts & escalators, building automation, LV/HV installation, specialized lighting, telecommunication, and IT & software engagements.',
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
            ['title' => 'Roads & pavements', 'description' => 'Road construction, pavement works, drainage, retaining structures, and signcraft installation.', 'icon' => '🛣️', 'sort_order' => 1],
            ['title' => 'Bridges & structures', 'description' => 'Bridge structures and structural works delivered with disciplined surveying, QA, and documentation.', 'icon' => '🌉', 'sort_order' => 2],
            ['title' => 'Water & sewerage', 'description' => 'Water supply, sewerage works, and civil support for public infrastructure and communities.', 'icon' => '🚰', 'sort_order' => 3],
            ['title' => 'Buildings & maintenance', 'description' => 'General buildings, concrete repairs, waterproofing, and prefabricated/steel framed buildings and industrial plants.', 'icon' => '🏗️', 'sort_order' => 4],
            ['title' => 'MEP systems', 'description' => 'HVAC, fire prevention & protection, lifts & escalators, and building automation systems.', 'icon' => '⚙️', 'sort_order' => 5],
            ['title' => 'Electrical, telecom & IT', 'description' => 'Low/high voltage installation, specialized lighting, telecommunication works, plus IT & software engagements.', 'icon' => '🔌', 'sort_order' => 6],
        ];

        return collect($segments)->map(fn ($segment) => new Feature($segment));
    }
}
