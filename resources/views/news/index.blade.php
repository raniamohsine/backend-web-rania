@extends('layouts.public')

@section('title', 'Nieuws - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6">
            Nieuws
        </h1>

        <div class="space-y-6">
            @forelse ($newsItems as $newsItem)
                <article class="border-b pb-6">
                    <h2 class="text-xl font-semibold mb-2">
                        {{ $newsItem->title }}
                    </h2>

                    <p class="text-sm text-gray-500 mb-3">
                        Publicatiedatum: {{ $newsItem->published_at }}
                    </p>

                    <p class="text-gray-700 mb-4">
                        {{ $newsItem->content }}
                    </p>

                    <a href="{{ route('news.show', $newsItem) }}" class="text-blue-600 hover:underline">
                        Lees meer
                    </a>
                </article>
            @empty
                <p class="text-gray-600">
                    Er is nog geen nieuws beschikbaar.
                </p>
            @endforelse
        </div>
    </section>
@endsection