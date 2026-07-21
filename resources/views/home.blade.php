@extends('layouts.public')

@section('title', 'Home - StudentHub')

@section('content')
    <style>
        .home-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        .hero-card {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            border-radius: 34px;
            padding: 56px;
            margin-bottom: 34px;
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.25);
        }

        .hero-card h1 {
            color: white;
            font-size: 42px;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero-card p {
            color: white;
            font-size: 18px;
            line-height: 1.7;
            max-width: 720px;
        }

        .hero-label {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 16px;
            opacity: 0.9;
        }

        .hero-buttons {
            margin-top: 28px;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-button-primary {
            background: white;
            color: #2563eb;
            padding: 13px 20px;
            border-radius: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .hero-button-secondary {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            padding: 13px 20px;
            border-radius: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .section-card {
            background: white;
            border-radius: 28px;
            padding: 30px;
            margin-bottom: 26px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
            border: 1px solid #e5e7eb;
        }

        .section-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .section-title-row h2 {
            font-size: 26px;
            margin: 0;
        }

        .section-title-row a {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        .list-item {
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 22px;
            margin-bottom: 16px;
            background: #f8fafc;
        }

        .list-item:last-child {
            margin-bottom: 0;
        }

        .small-label {
            color: #2563eb;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .list-item h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .item-link {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero-card {
                padding: 32px 26px;
                border-radius: 26px;
            }

            .hero-card h1 {
                font-size: 34px;
            }

            .section-card {
                padding: 22px;
            }

            .section-title-row {
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>

    <div class="home-wrapper">

        <section class="hero-card">
            <p class="hero-label">
                Backend Web Project
            </p>

            <h1>
                Welkom bij StudentHub
            </h1>

            <p>
                StudentHub is een digitaal platform voor studenten. Bezoekers kunnen nieuws lezen,
                veelgestelde vragen bekijken en publieke studentenprofielen ontdekken.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('news.index') }}" class="hero-button-primary">
                    Bekijk nieuws
                </a>

                <a href="{{ route('profiles.index') }}" class="hero-button-secondary">
                    Bekijk profielen
                </a>
            </div>
        </section>

        <section class="section-card">
            <div class="section-title-row">
                <h2>Laatste nieuws</h2>

                <a href="{{ route('news.index') }}">
                    Alles bekijken
                </a>
            </div>

            @forelse ($latestNews as $newsItem)
                <article class="list-item">
                    <p class="small-label">
                        Nieuws
                    </p>

                    <h3>
                        {{ $newsItem->title }}
                    </h3>

                    <p class="muted">
                        Publicatiedatum: {{ $newsItem->published_at ?? 'Geen datum' }}
                    </p>

                    <p>
                        {{ $newsItem->content }}
                    </p>

                    <a href="{{ route('news.show', $newsItem) }}" class="item-link">
                        Lees meer
                    </a>
                </article>
            @empty
                <article class="list-item">
                    Er is nog geen nieuws beschikbaar.
                </article>
            @endforelse
        </section>

        <section class="section-card">
            <div class="section-title-row">
                <h2>Studentenprofielen</h2>

                <a href="{{ route('profiles.index') }}">
                    Alles bekijken
                </a>
            </div>

            @forelse ($students as $student)
                <article class="list-item">
                    <h3>
                        {{ $student->profile->username ?? $student->name }}
                    </h3>

                    <p class="small-label">
                        {{ $student->profile->study_program ?? 'Student' }}
                    </p>

                    <p>
                        {{ $student->profile->bio ?? 'Nog geen beschrijving.' }}
                    </p>

                    <a href="{{ route('profiles.show', $student) }}" class="item-link">
                        Bekijk profiel
                    </a>
                </article>
            @empty
                <article class="list-item">
                    Er zijn nog geen studentenprofielen.
                </article>
            @endforelse
        </section>

        <section class="section-card">
            <div class="section-title-row">
                <h2>FAQ</h2>

                <a href="{{ route('faq.index') }}">
                    Alles bekijken
                </a>
            </div>

            @forelse ($faqCategories as $category)
                <article class="list-item">
                    <p class="small-label">
                        FAQ categorie
                    </p>

                    <h3>
                        {{ $category->name }}
                    </h3>

                    <p>
                        {{ $category->description }}
                    </p>

                    <a href="{{ route('faq.index') }}" class="item-link">
                        Bekijk FAQ
                    </a>
                </article>
            @empty
                <article class="list-item">
                    Er zijn nog geen FAQ categorieën.
                </article>
            @endforelse
        </section>

    </div>
@endsection