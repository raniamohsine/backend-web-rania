<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqPageController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::with('faqs')
            ->get();

        return view('faq.index', [
            'faqCategories' => $faqCategories,
        ]);
    }
}