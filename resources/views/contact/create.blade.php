@extends('layouts.public')

@section('title', 'Contact - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6">
            Contact
        </h1>

        <p class="text-gray-700 mb-6">
            Heb je een vraag? Vul het formulier in en de administrator ontvangt je bericht.
        </p>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                <p class="font-semibold">
                    Controleer de ingevulde gegevens.
                </p>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">
                    Naam
                </label>

                <input id="name"
                       name="name"
                       type="text"
                       value="{{ old('name') }}"
                       required
                       maxlength="255"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">
                    E-mail
                </label>

                <input id="email"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       required
                       maxlength="255"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="block font-medium text-sm text-gray-700">
                    Onderwerp
                </label>

                <input id="subject"
                       name="subject"
                       type="text"
                       value="{{ old('subject') }}"
                       required
                       maxlength="255"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('subject')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block font-medium text-sm text-gray-700">
                    Bericht
                </label>

                <textarea id="message"
                          name="message"
                          rows="6"
                          required
                          maxlength="2000"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('message') }}</textarea>

                @error('message')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Verzenden
            </button>
        </form>
    </section>
@endsection