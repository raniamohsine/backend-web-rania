@extends('layouts.public')

@section('title', 'FAQ - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6">
            Veelgestelde vragen
        </h1>

        <p class="text-gray-700 mb-8">
            Hier vind je antwoorden op veelgestelde vragen over StudentHub.
        </p>

        <div class="space-y-6">
            @forelse ($faqCategories as $category)
                <div class="border rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">
                        {{ $category->name }}
                    </h2>

                    <p class="text-gray-600 mb-4">
                        {{ $category->description }}
                    </p>

                    <div class="space-y-4">
                        @forelse ($category->faqs as $faq)
                            @if ($faq->is_visible)
                                <div>
                                    <h3 class="font-semibold">
                                        {{ $faq->question }}
                                    </h3>

                                    <p class="text-gray-700">
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            @endif
                        @empty
                            <p class="text-gray-600">
                                Er zijn nog geen vragen in deze categorie.
                            </p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-gray-600">
                    Er zijn nog geen FAQ categorieën.
                </p>
            @endforelse
        </div>
    </section>
@endsection