<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $about = Page::firstOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Bachawali Builders',
                'headline' => 'Trusted contractor teams that think like owners.',
                'summary' => 'We orchestrate complex builds and stylish renovations for commercial and residential clients.',
            ]
        );

        $contact = Page::firstOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'Contact & Support',
                'headline' => 'Share your idea and our team will follow up within one business day.',
            ]
        );

        return view('admin.pages', compact('about', 'contact'));
    }

    public function update(Request $request, Page $page)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'body' => 'nullable|string',
            'cta_label' => 'nullable|string|max:255',
            'cta_url' => 'nullable|url',
        ]);

        if ($page->slug === 'contact') {
            $meta = is_array($page->meta) ? $page->meta : [];
            $lockedKeys = ['phone', 'address'];

            foreach (Page::CONTACT_META_KEYS as $key => $label) {
                if (in_array($key, $lockedKeys, true)) {
                    continue;
                }

                $value = $request->input($key);
                if (! is_null($value) && $value !== '') {
                    $meta[$key] = $value;
                } else {
                    unset($meta[$key]);
                }
            }

            $attributes['meta'] = $meta;
        }

        $page->update($attributes);

        return redirect()->route('admin.pages.index')->with('status', 'Page updated successfully.');
    }
}
