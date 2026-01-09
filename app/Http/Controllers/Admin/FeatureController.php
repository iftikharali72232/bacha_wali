<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.features', compact('features'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:32',
            'sort_order' => 'nullable|integer|min:0|max:999',
        ]);

        Feature::create($attributes);

        return back()->with('status', 'Feature added.');
    }

    public function update(Request $request, Feature $feature)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:32',
            'sort_order' => 'nullable|integer|min:0|max:999',
        ]);

        $feature->update($attributes);

        return back()->with('status', 'Feature updated.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return back()->with('status', 'Feature removed.');
    }
}
