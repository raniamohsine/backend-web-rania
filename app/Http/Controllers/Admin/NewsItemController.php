<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('news', 'public');
        }

        NewsItem::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'image' => $imagePath,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'] ?? null,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuwsbericht werd aangemaakt.');
    }

    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', [
            'newsItem' => $news,
        ]);
    }

    public function update(Request $request, NewsItem $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('news', 'public');
        }

        $news->update([
            'title' => $validated['title'],
            'image' => $imagePath,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'] ?? null,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuwsbericht werd aangepast.');
    }

    public function destroy(NewsItem $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuwsbericht werd verwijderd.');
    }
}