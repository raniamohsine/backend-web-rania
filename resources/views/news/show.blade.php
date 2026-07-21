@extends('layouts.public')

@section('title', $newsItem->title . ' - StudentHub')

@section('content')
    <div style="max-width: 920px; margin: 0 auto;">

        <section style="background: linear-gradient(135deg, #2563eb, #38bdf8); color: white; border-radius: 32px; padding: 46px; margin-bottom: 28px; box-shadow: 0 20px 45px rgba(37, 99, 235, 0.25);">
            <a href="{{ route('news.index') }}"
               style="color: white; font-weight: bold; text-decoration: none;">
                ← Terug naar nieuws
            </a>

            <p style="margin-top: 28px; font-size: 14px; font-weight: bold; opacity: 0.9;">
                Nieuwsbericht
            </p>

            <h1 style="color: white; font-size: 42px; line-height: 1.15; margin-top: 10px; margin-bottom: 18px;">
                {{ $newsItem->title }}
            </h1>

            <p style="color: white; font-size: 16px;">
                Publicatiedatum: {{ $newsItem->published_at ?? 'Geen datum' }}
            </p>
        </section>

        <section style="background: white; border-radius: 28px; padding: 34px; box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb;">

            @if ($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}"
                     alt="{{ $newsItem->title }}"
                     style="width: 100%; border-radius: 22px; margin-bottom: 28px;">
            @endif

            <h2 style="font-size: 26px; margin-bottom: 18px;">
                Inhoud
            </h2>

            <p style="font-size: 18px; line-height: 1.8; color: #334155;">
                {{ $newsItem->content }}
            </p>

            <div style="margin-top: 30px;">
                <a href="{{ route('news.index') }}"
                   style="background-color: #2563eb; color: white; padding: 13px 20px; border-radius: 14px; font-weight: bold; text-decoration: none;">
                    Terug naar nieuws
                </a>
            </div>
        </section>

    </div>
@endsection