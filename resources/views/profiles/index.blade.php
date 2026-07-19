@extends('layouts.public')

@section('title', 'Studentenprofielen - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6">
            Studentenprofielen
        </h1>

        <p class="text-gray-700 mb-8">
            Bekijk de publieke profielen van gebruikers op StudentHub.
        </p>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($users as $user)
                <article class="border rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">
                        {{ $user->profile->username ?? $user->name }}
                    </h2>

                    <p class="text-sm text-gray-500 mb-3">
                        {{ $user->profile->study_program ?? 'Geen opleiding ingevuld' }}
                    </p>

                    <p class="text-gray-700 mb-4">
                        {{ $user->profile->bio ?? 'Nog geen beschrijving.' }}
                    </p>

                    <a href="{{ route('profiles.show', $user) }}" class="text-blue-600 hover:underline">
                        Bekijk profiel
                    </a>
                </article>
            @empty
                <p class="text-gray-600">
                    Er zijn nog geen profielen.
                </p>
            @endforelse
        </div>
    </section>
@endsection