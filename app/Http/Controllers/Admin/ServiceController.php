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
            'sop' => 'required|array',
            'sop.*.title' => 'required|string|max:255',
            'sop.*.desc' => 'required|string',
        ]);

        $service->update([
            'sop' => array_values($validated['sop']), // ensure numeric keys
        ]);

        return back()->with('success', 'Tata cara penggunaan ' . $service->name . ' berhasil diperbarui!');
    }
}
