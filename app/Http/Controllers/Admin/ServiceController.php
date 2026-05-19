<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'long_description' => 'required|string',
            'features' => 'nullable|array',
            'features.*.title' => 'required_with:features|string|max:255',
            'features.*.desc' => 'required_with:features|string',
            'features.*.icon' => 'required_with:features|string|max:255',
            'sop' => 'nullable|array',
            'sop.*.title' => 'required_with:sop|string|max:255',
            'sop.*.desc' => 'nullable|string',
            'sop.*.sub_chapters' => 'nullable|array',
            'sop.*.sub_chapters.*.title' => 'required_with:sop.*.sub_chapters|string|max:255',
            'sop.*.sub_chapters.*.desc' => 'nullable|string',
            'faq' => 'nullable|array',
            'faq.*.q' => 'required_with:faq|string|max:255',
            'faq.*.a' => 'required_with:faq|string',
        ]);

        // Process sub_chapters to ensure numeric keys if they exist
        $sopData = isset($validated['sop']) ? array_values($validated['sop']) : [];
        foreach ($sopData as &$step) {
            if (isset($step['sub_chapters']) && is_array($step['sub_chapters'])) {
                $step['sub_chapters'] = array_values($step['sub_chapters']);
            }
        }

        $service->update([
            'url' => $validated['url'],
            'long_description' => $validated['long_description'],
            'features' => isset($validated['features']) ? array_values($validated['features']) : [],
            'sop' => $sopData,
            'faq' => isset($validated['faq']) ? array_values($validated['faq']) : [], // ensure numeric keys
        ]);

        return back()->with('success', 'Data layanan ' . $service->name . ' berhasil diperbarui!');
    }
}
