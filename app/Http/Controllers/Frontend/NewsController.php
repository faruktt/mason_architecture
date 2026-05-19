<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()->latest('published_at')->paginate(12);
        return view('frontend.news.index', compact('news'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $recent = News::published()->where('id', '!=', $article->id)->latest()->take(3)->get();
        return view('frontend.news.show', compact('article', 'recent'));
    }
}
