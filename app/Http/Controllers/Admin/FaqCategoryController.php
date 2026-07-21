<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::with('faqs')
            ->orderBy('name')
            ->get();

        return view('admin.faq-categories.index', [
            'faqCategories' => $faqCategories,
        ]);
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ categorie werd aangemaakt.');
    }

    public function edit(FaqCategory $faq_category)
    {
        return view('admin.faq-categories.edit', [
            'faqCategory' => $faq_category,
        ]);
    }

    public function update(Request $request, FaqCategory $faq_category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $faq_category->update($validated);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ categorie werd aangepast.');
    }

    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FAQ categorie werd verwijderd.');
    }
}