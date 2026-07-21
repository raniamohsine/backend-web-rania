<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.faqs.index', [
            'faqs' => $faqs,
        ]);
    }

    public function create()
    {
        $faqCategories = FaqCategory::orderBy('name')->get();

        return view('admin.faqs.create', [
            'faqCategories' => $faqCategories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000',
        ]);

        Faq::create([
            'faq_category_id' => $validated['faq_category_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ vraag werd aangemaakt.');
    }

    public function edit(Faq $faq)
    {
        $faqCategories = FaqCategory::orderBy('name')->get();

        return view('admin.faqs.edit', [
            'faq' => $faq,
            'faqCategories' => $faqCategories,
        ]);
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:2000',
        ]);

        $faq->update([
            'faq_category_id' => $validated['faq_category_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ vraag werd aangepast.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ vraag werd verwijderd.');
    }
}