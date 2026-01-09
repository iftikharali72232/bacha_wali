<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'description' => ['nullable', 'string'],
            'attachments' => ['nullable', 'array', 'max:3'],
            'attachments.*' => ['file', 'max:5120', 'mimes:pdf,doc,docx,jpg,jpeg,png'],
        ]);

        $files = [];
        foreach ($request->file('attachments', []) as $attachment) {
            if ($attachment && $attachment->isValid()) {
                $files[] = Storage::disk('public')->putFile('contact-submissions', $attachment);
            }
        }

        $attributes['attachments'] = $files ?: null;

        ContactSubmission::create($attributes);

        return redirect()->route('home')->with('contact_status', 'Thanks for reaching out. Our team will reply within one business day.');
    }
}
