@extends('layouts.public')

@section('title', 'Profiel - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <a href="{{ route('profiles.index') }}" class="text-blue-600 hover:underline">
            Terug naar profielen
        </a>

        <div class="mt-6">
            @if ($user->profile && $user->profile->profile_photo)
                <img src="{{ asset('storage/' . $user->profile->profile_photo) }}"
                     alt="{{ $user->name }}"
                     class="w-32 h-32 rounded-full object-cover mb-6">
            @endif

            <h1 class="text-3xl font-bold mb-2">
                {{ $user->profile->username ?? $user->name }}
            </h1>

            <p class="text-gray-500 mb-6">
                {{ $user->profile->study_program ?? 'Geen opleiding ingevuld' }}
            </p>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">
                    Over mij
                </h2>

                <p class="text-gray-700">
                    {{ $user->profile->bio ?? 'Nog geen beschrijving.' }}
                </p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">
                    Geboortedatum
                </h2>

                <p class="text-gray-700">
                    {{ $user->profile->birthday ?? 'Niet ingevuld' }}
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-2">
                    Interesses
                </h2>

                <div class="flex flex-wrap gap-2">
                    @forelse ($user->interests as $interest)
                        <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded">
                            {{ $interest->name }}
                        </span>
                    @empty
                        <p class="text-gray-600">
                            Geen interesses ingevuld.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection