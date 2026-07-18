@extends('layouts.public')

@section('title', 'Home - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8 mb-8">
        <h1 class="text-3xl font-bold mb-4">
            Welkom bij StudentHub
        </h1>

        <p class="text-gray-700 mb-6">
            StudentHub is een platform voor studenten. Bezoekers kunnen nieuws lezen,
            veelgestelde vragen bekijken en publieke studentenprofielen ontdekken.
        </p>

        <div class="space-x-4">
            @guest
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Account aanmaken
                </a>

                <a href="{{ route('login') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">
                    Inloggen
                </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Naar dashboard
                </a>
            @endauth
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">
            Laatste nieuws
        </h2>

        <div class="grid md:grid-cols-3 gap-4">
            @forelse ($latestNews as $newsItem)
                <article class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-2">
                        {{ $newsItem->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-3">
                        Publicatiedatum: {{ $newsItem->published_at }}
                    </p>

                    <p class="text-gray-700">
                        {{ $newsItem->content }}
                    </p>
                </article>
            @empty
                <p class="text-gray-600">
                    Er is nog geen nieuws beschikbaar.
                </p>
            @endforelse
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">
            Studentenprofielen
        </h2>

        <div class="grid md:grid-cols-3 gap-4">
            @forelse ($students as $student)
                <article class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-2">
                        {{ $student->profile->username ?? $student->name }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-3">
                        {{ $student->profile->study_program ?? 'Student' }}
                    </p>

                    <p class="text-gray-700">
                        {{ $student->profile->bio ?? 'Nog geen beschrijving.' }}
                    </p>
                </article>
            @empty
                <p class="text-gray-600">
                    Er zijn nog geen studentenprofielen.
                </p>
            @endforelse
        </div>
    </section>

    <section>
        <h2 class="text-2xl font-bold mb-4">
            Veelgestelde vragen
        </h2>

        <div class="space-y-4">
            @forelse ($faqCategories as $category)
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-2">
                        {{ $category->name }}
                    </h3>

                    <p class="text-gray-600 mb-4">
                        {{ $category->description }}
                    </p>

                    @foreach ($category->faqs as $faq)
                        @if ($faq->is_visible)
                            <div class="mb-3">
                                <p class="font-semibold">
                                    {{ $faq->question }}
                                </p>

                                <p class="text-gray-700">
                                    {{ $faq->answer }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @empty
                <p class="text-gray-600">
                    Er zijn nog geen FAQ categorieën.
                </p>
            @endforelse
        </div>
    </section>
@endsection