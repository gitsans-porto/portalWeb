<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the profile sections.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for editing the specified profile section.
     */
    public function edit($section)
    {
        $profile = Profile::where('section', $section)->firstOrFail();
        return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified profile section in storage.
     */
    public function update(Request $request, $section)
    {
        $profile = Profile::where('section', $section)->firstOrFail();

        $rules = [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Custom validation for specific sections
        if ($section === 'tentang_sekolah') {
            $rules['additional_data.address'] = 'required|string';
            $rules['additional_data.map_iframe'] = 'nullable|string';
        } elseif ($section === 'visi_misi') {
            $rules['additional_data.vision'] = 'required|string';
            $rules['additional_data.missions'] = 'required|array';
        } elseif ($section === 'kepala_sekolah') {
            $rules['additional_data.phone'] = 'nullable|string|max:20';
        }

        $validated = $request->validate($rules);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($profile->image && Storage::disk('public')->exists($profile->image)) {
                Storage::disk('public')->delete($profile->image);
            }
            
            $path = $request->file('image')->store('profiles', 'public');
            $profile->image = $path;
        }

        $profile->title = $request->title;
        $profile->short_description = $request->short_description;
        $profile->content = $request->content;
        
        if ($request->has('additional_data')) {
            $data = $request->additional_data;
            
            // Otomatis bersihkan link Google Maps jika salah format
            if ($section === 'tentang_sekolah' && isset($data['map_iframe'])) {
                $url = trim($data['map_iframe']);
                
                // Jika user copy paste seluruh <iframe> tag, ambil hanya src-nya
                if (preg_match('/src="([^"]+)"/', $url, $match)) {
                    $url = $match[1];
                }
                
                // Jika lupa kasih https://
                if (str_starts_with($url, 'www.')) {
                    $url = 'https://' . $url;
                }
                
                $data['map_iframe'] = $url;
            }
            
            $profile->additional_data = $data;
        }

        $profile->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
