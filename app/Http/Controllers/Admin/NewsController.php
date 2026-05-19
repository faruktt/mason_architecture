<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:published,draft',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . uniqid();
        $validated['published_at'] = $request->status === 'published' ? now() : null;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('news', 'public');
            $validated['cover_image'] = $path;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article created!');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:published,draft',
            'cover_image' => 'nullable|image|max:5120',
        ]);

        if ($request->status === 'published' && !$news->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('news', 'public');
            $validated['cover_image'] = $path;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News article deleted!');
    }
}
