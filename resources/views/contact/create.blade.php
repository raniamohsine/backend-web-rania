@extends('layouts.public')

@section('title', 'Contact - StudentHub')

@section('content')
    <div class="page-wrapper">

        <section class="page-hero">
            <p class="page-label">
                Contact
            </p>

            <h1>
                Neem contact op
            </h1>

            <p>
                Heb je een vraag over StudentHub? Vul het formulier in en de administrator ontvangt je bericht.
            </p>
        </section>

        <section class="page-card">
            @if (session('success'))
                <div class="success-box">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-box">
                    Controleer de ingevulde gegevens.
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div style="margin-bottom: 24px;">
                    <button type="submit" class="primary-action">
                        Bericht verzenden
                    </button>
                </div>

                <div>
                    <label for="name" class="form-label">
                        Naam
                    </label>

                    <input id="name"
                           name="name"
                           type="text"
                           value="{{ old('name') }}"
                           required
                           maxlength="255"
                           class="form-input">

                    @error('name')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="form-label">
                        E-mail
                    </label>

                    <input id="email"
                           name="email"
                           type="email"
                           value="{{ old('email') }}"
                           required
                           maxlength="255"
                           class="form-input">

                    @error('email')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="form-label">
                        Onderwerp
                    </label>

                    <input id="subject"
                           name="subject"
                           type="text"
                           value="{{ old('subject') }}"
                           required
                           maxlength="255"
                           class="form-input">

                    @error('subject')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="form-label">
                        Bericht
                    </label>

                    <textarea id="message"
                              name="message"
                              rows="6"
                              required
                              maxlength="2000"
                              class="form-input">{{ old('message') }}</textarea>

                    @error('message')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="primary-action">
                    Bericht verzenden
                </button>
            </form>
        </section>

    </div>
@endsection