<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', 'desc')
                    ->paginate(9);

        return view('berita.index', compact('news'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->firstOrFail();
        
        // Latest news for sidebar/bottom
        $latestNews = News::where('id', '!=', $article->id)
                          ->orderBy('published_at', 'desc')
                          ->take(3)
                          ->get();

        return view('berita.show', compact('article', 'latestNews'));
    }
}
