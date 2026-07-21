@extends('layouts.public')

@section('title', 'FAQ - StudentHub')

@section('content')
    <div class="page-wrapper">

        <section class="page-hero">
            <p class="page-label">
                Veelgestelde vragen
            </p>

            <h1>
                FAQ
            </h1>

            <p>
                Vind snel antwoorden op veelgestelde vragen over accounts, profielen en het gebruik van StudentHub.
            </p>
        </section>

        <section class="page-card">
            @forelse ($faqCategories as $category)
                <article class="inner-card">
                    <p class="page-label" style="color: #2563eb; opacity: 1;">
                        FAQ categorie
                    </p>

                    <h2 style="font-size: 26px; margin-bottom: 10px;">
                        {{ $category->name }}
                    </h2>

                    <p style="color: #64748b; margin-bottom: 22px;">
                        {{ $category->description }}
                    </p>

                    @forelse ($category->faqs as $faq)
                        @if ($faq->is_visible)
                            <div style="background: white; border-radius: 18px; padding: 20px; margin-bottom: 14px; border: 1px solid #e5e7eb;">
                                <h3 style="font-size: 19px; margin-bottom: 8px;">
                                    {{ $faq->question }}
                                </h3>

                                <p style="color: #334155;">
                                    {{ $faq->answer }}
                                </p>
                            </div>
                        @endif
                    @empty
                        <p>
                            Er zijn nog geen vragen in deze categorie.
                        </p>
                    @endforelse
                </article>
            @empty
                <article class="inner-card">
                    Er zijn nog geen FAQ categorieën.
                </article>
            @endforelse
        </section>

    </div>
@endsection