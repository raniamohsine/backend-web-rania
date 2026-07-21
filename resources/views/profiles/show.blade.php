@extends('layouts.public')

@section('title', 'Profiel - StudentHub')

@section('content')
    <div class="page-wrapper">

        <section class="page-hero">
            <a href="{{ route('profiles.index') }}"
               style="color: white; font-weight: bold; text-decoration: none;">
                ← Terug naar profielen
            </a>

            <p class="page-label" style="margin-top: 28px;">
                Publiek profiel
            </p>

            <h1>
                {{ $user->profile->username ?? $user->name }}
            </h1>

            <p>
                {{ $user->profile->study_program ?? 'Geen opleiding ingevuld' }}
            </p>
        </section>

        <section class="page-card">

            <div style="display: flex; align-items: center; gap: 22px; margin-bottom: 28px;">
                @if ($user->profile && $user->profile->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                         alt="{{ $user->name }}"
                         style="width: 96px; height: 96px; border-radius: 50%; object-fit: cover;">
                @else
                    <div style="width: 96px; height: 96px; border-radius: 50%; background: linear-gradient(135deg, #2563eb, #38bdf8); display: flex; align-items: center; justify-content: center; color: white; font-size: 34px; font-weight: bold;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <div>
                    <h2 style="font-size: 30px; margin-bottom: 6px;">
                        {{ $user->profile->username ?? $user->name }}
                    </h2>

                    <p style="color: #2563eb; font-weight: bold;">
                        {{ $user->profile->study_program ?? 'Student' }}
                    </p>
                </div>
            </div>

            <article class="inner-card">
                <p class="page-label" style="color: #2563eb; opacity: 1;">
                    Over mij
                </p>

                <p style="font-size: 17px; color: #334155;">
                    {{ $user->profile->bio ?? 'Nog geen beschrijving.' }}
                </p>
            </article>

            <article class="inner-card">
                <p class="page-label" style="color: #2563eb; opacity: 1;">
                    Geboortedatum
                </p>

                <p style="font-size: 17px; color: #334155;">
                    {{ $user->profile->birthday ?? 'Niet ingevuld' }}
                </p>
            </article>

            <article class="inner-card">
                <p class="page-label" style="color: #2563eb; opacity: 1;">
                    Interesses
                </p>

                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    @forelse ($user->interests as $interest)
                        <span style="background: white; color: #2563eb; border: 1px solid #bfdbfe; padding: 10px 14px; border-radius: 999px; font-weight: bold;">
                            {{ $interest->name }}
                        </span>
                    @empty
                        <p>
                            Geen interesses ingevuld.
                        </p>
                    @endforelse
                </div>
            </article>

            <div style="margin-top: 28px;">
                <a href="{{ route('profiles.index') }}" class="primary-action">
                    Terug naar profielen
                </a>
            </div>

        </section>

    </div>
@endsection