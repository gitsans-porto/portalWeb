<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mading;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MadingController extends Controller
{
    public function index()
    {
        $mading = Mading::orderByDesc('created_at')->paginate(10);
        return view('admin.mading.index', compact('mading'));
    }

    public function create()
    {
        $categories = Mading::categoryLabels();
        return view('admin.mading.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'category' => 'required|string',
            'author_name' => 'required|max:100',
            'author_class' => 'nullable|max:100',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        $data['color_accent'] = 'red';   // hardcoded, not shown in UI
        $data['is_pinned'] = false;   // hardcoded, not shown in UI

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('mading', 'public');
        }

        Mading::create($data);

        return redirect()->route('admin.mading.index')
            ->with('success', 'Postingan mading berhasil diterbitkan!');
    }

    public function edit(string $id)
    {
        $post = Mading::findOrFail($id);
        $categories = Mading::categoryLabels();
        return view('admin.mading.edit', compact('post', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $post = Mading::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'category' => 'required|string',
            'author_name' => 'required|max:100',
            'author_class' => 'nullable|max:100',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->except('image');

        if ($post->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('mading', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.mading.index')
            ->with('success', 'Postingan mading berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $post = Mading::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.mading.index')
            ->with('success', 'Postingan mading berhasil dihapus!');
    }

    public function approve(string $id)
    {
        $post = Mading::findOrFail($id);
        $post->update(['published_at' => now()]);

        return redirect()->route('admin.mading.index')
            ->with('success', 'Postingan mading berhasil disetujui dan diterbitkan!');
    }
}
