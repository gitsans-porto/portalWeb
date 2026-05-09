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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'sop' => 'nullable|array',
            'sop.*.title' => 'required_with:sop|string|max:255',
            'sop.*.desc' => 'required_with:sop|string',
            'faq' => 'nullable|array',
            'faq.*.q' => 'required_with:faq|string|max:255',
            'faq.*.a' => 'required_with:faq|string',
        ]);

        $service->update([
            'url' => $validated['url'],
            'sop' => isset($validated['sop']) ? array_values($validated['sop']) : [], // ensure numeric keys
            'faq' => isset($validated['faq']) ? array_values($validated['faq']) : [], // ensure numeric keys
        ]);

        return back()->with('success', 'Data layanan ' . $service->name . ' berhasil diperbarui!');
    }
}
