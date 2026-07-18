@extends('layouts.public')

@section('title', $newsItem->title . ' - StudentHub')

@section('content')
    <article class="bg-white rounded-lg shadow p-8">
        <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">
            Terug naar nieuws
        </a>

        <h1 class="text-3xl font-bold mt-4 mb-3">
            {{ $newsItem->title }}
        </h1>

        <p class="text-sm text-gray-500 mb-6">
            Publicatiedatum: {{ $newsItem->published_at }}
        </p>

        @if ($newsItem->image)
            <img src="{{ asset('storage/' . $newsItem->image) }}"
                 alt="{{ $newsItem->title }}"
                 class="w-full rounded-lg mb-6">
        @endif

        <p class="text-gray-700 leading-relaxed">
            {{ $newsItem->content }}
        </p>
    </article>
@endsection