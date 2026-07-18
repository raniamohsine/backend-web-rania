<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function show(NewsItem $newsItem)
    {
        if (!$newsItem->is_published) {
            abort(404);
        }

        return view('news.show', [
            'newsItem' => $newsItem,
        ]);
    }
}