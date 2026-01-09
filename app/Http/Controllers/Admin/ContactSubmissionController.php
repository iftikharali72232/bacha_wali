<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::query()
            ->latest()
            ->paginate(20);

        return view('admin.submissions', compact('submissions'));
    }
}
