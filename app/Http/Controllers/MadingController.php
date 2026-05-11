<?php

namespace App\Http\Controllers;

use App\Models\Mading;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MadingController extends Controller
{
    public function index()
    {
        $mading = Mading::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->paginate(12);

        return view('mading.index', compact('mading'));
    }

    public function show(string $slug)
    {
        $post = Mading::where('slug', $slug)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        return view('mading.show', compact('post'));
    }

    public function create()
    {
        $categories = Mading::categoryLabels();
        return view('mading.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|max:255',
            'content'      => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'category'     => 'required|string',
            'author_name'  => 'required|max:100',
            'author_class' => 'nullable|max:100',
        ]);

        $data                 = $request->except('image');
        $data['slug']         = Str::slug($request->title) . '-' . uniqid();
        $data['color_accent'] = 'red';   // hardcoded
        $data['is_pinned']    = false;   // hardcoded
        $data['published_at'] = null;    // null means draft/pending

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('mading', 'public');
        }

        Mading::create($data);

        return redirect()->route('mading.index')
            ->with('success', 'Postinganmu berhasil ditempel dan sedang menunggu review admin!');
    }
}
