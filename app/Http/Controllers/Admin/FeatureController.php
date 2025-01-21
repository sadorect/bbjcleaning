<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // Available FontAwesome icons array
    private $availableIcons = [
        'fas fa-star' => 'Star',
        'fas fa-dollar-sign' => 'Dollar',
        'fas fa-shield-alt' => 'Shield',
        'fas fa-headset' => 'Headset',
        'fas fa-tasks' => 'Tasks',
        'fas fa-phone-alt' => 'Phone',
        'fas fa-leaf' => 'Leaf',
        'fas fa-clock' => 'Clock',
        // Add more icons as needed
    ];

    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create', [
            'icons' => $this->availableIcons
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order' => 'required|integer|min:0',
            'active' => 'boolean'
        ]);

        Feature::create($validated);
        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', [
            'feature' => $feature,
            'icons' => $this->availableIcons
        ]);
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order' => 'required|integer|min:0',
            'active' => 'boolean'
        ]);

        $feature->update($validated);
        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully');
    }
}
