<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = NewsItem::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $faqCategories = FaqCategory::with('faqs')
            ->take(3)
            ->get();

        $students = User::with('profile')
            ->where('role', 'user')
            ->take(3)
            ->get();

        return view('home', [
            'latestNews' => $latestNews,
            'faqCategories' => $faqCategories,
            'students' => $students,
        ]);
    }
}