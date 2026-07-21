@extends('layouts.public')

@section('title', 'Studentenprofielen - StudentHub')

@section('content')
    <div class="page-wrapper">

        <section class="page-hero">
            <p class="page-label">
                Studentenprofielen
            </p>

            <h1>
                Ontdek studenten
            </h1>

            <p>
                Bekijk publieke profielen van gebruikers op StudentHub en ontdek hun opleiding, interesses en korte voorstelling.
            </p>
        </section>

        <section class="page-card">
            @forelse ($users as $user)
                <article class="inner-card">
                    <h2 style="font-size: 26px; margin-bottom: 8px;">
                        {{ $user->profile->username ?? $user->name }}
                    </h2>

                    <p style="color: #2563eb; font-weight: bold; margin-bottom: 12px;">
                        {{ $user->profile->study_program ?? 'Geen opleiding ingevuld' }}
                    </p>

                    <p style="color: #334155; margin-bottom: 18px;">
                        {{ $user->profile->bio ?? 'Nog geen beschrijving.' }}
                    </p>

                    <a href="{{ route('profiles.show', $user) }}" class="secondary-action">
                        Bekijk profiel
                    </a>
                </article>
            @empty
                <article class="inner-card">
                    Er zijn nog geen profielen.
                </article>
            @endforelse
        </section>

    </div>
@endsection