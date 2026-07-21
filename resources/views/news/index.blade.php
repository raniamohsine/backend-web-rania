@extends('layouts.public')

@section('title', 'Nieuws - StudentHub')

@section('content')
    <div style="max-width: 920px; margin: 0 auto;">

        <section style="background: linear-gradient(135deg, #2563eb, #38bdf8); color: white; border-radius: 32px; padding: 46px; margin-bottom: 28px; box-shadow: 0 20px 45px rgba(37, 99, 235, 0.25);">
            <p style="font-weight: bold; font-size: 14px; opacity: 0.9; margin-bottom: 16px;">
                StudentHub nieuws
            </p>

            <h1 style="color: white; font-size: 42px; line-height: 1.15; margin-bottom: 18px;">
                Nieuws
            </h1>

            <p style="color: white; font-size: 18px; line-height: 1.7; max-width: 720px;">
                Bekijk de laatste berichten en updates binnen StudentHub.
            </p>
        </section>

        <section style="background: white; border-radius: 28px; padding: 30px; box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07); border: 1px solid #e5e7eb;">
            <h2 style="font-size: 26px; margin-bottom: 24px;">
                Alle nieuwsberichten
            </h2>

            @forelse ($newsItems as $newsItem)
                <article style="background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 22px; padding: 24px; margin-bottom: 18px;">
                    <p style="color: #2563eb; font-size: 13px; font-weight: bold; margin-bottom: 8px;">
                        Nieuwsbericht
                    </p>

                    <h3 style="font-size: 22px; margin-bottom: 10px;">
                        {{ $newsItem->title }}
                    </h3>

                    <p style="color: #64748b; font-size: 14px; margin-bottom: 14px;">
                        Publicatiedatum: {{ $newsItem->published_at ?? 'Geen datum' }}
                    </p>

                    @if ($newsItem->image)
                        <img src="{{ asset('storage/' . $newsItem->image) }}"
                             alt="{{ $newsItem->title }}"
                             style="width: 100%; border-radius: 18px; margin-bottom: 18px;">
                    @endif

                    <p style="line-height: 1.7; color: #334155; margin-bottom: 16px;">
                        {{ $newsItem->content }}
                    </p>

                    <a href="{{ route('news.show', $newsItem) }}"
                       style="color: #2563eb; font-weight: bold; text-decoration: none;">
                        Lees meer
                    </a>
                </article>
            @empty
                <article style="background: #f8fafc; border-radius: 22px; padding: 24px;">
                    Er is nog geen nieuws beschikbaar.
                </article>
            @endforelse
        </section>

    </div>
@endsection