@extends('layouts.public')

@section('title', 'Mijn profiel aanpassen - StudentHub')

@section('content')
    <div class="page-wrapper">

        <section class="page-hero">
            <p class="page-label">
                Mijn profiel
            </p>

            <h1>
                Profiel aanpassen
            </h1>

            <p>
                Vul je publieke profiel aan zodat andere bezoekers je opleiding, interesses en korte voorstelling kunnen bekijken.
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

            <form method="POST"
                  action="{{ route('student-profile.update') }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div style="margin-bottom: 26px;">
                    <button type="submit" class="primary-action">
                        Profiel opslaan
                    </button>
                </div>

                <div class="inner-card">
                    <h2 style="font-size: 24px; margin-bottom: 22px;">
                        Persoonlijke gegevens
                    </h2>

                    <label for="username" class="form-label">
                        Gebruikersnaam
                    </label>

                    <input id="username"
                           name="username"
                           type="text"
                           value="{{ old('username', $profile->username) }}"
                           maxlength="255"
                           class="form-input">

                    @error('username')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror

                    <label for="birthday" class="form-label">
                        Geboortedatum
                    </label>

                    <input id="birthday"
                           name="birthday"
                           type="date"
                           value="{{ old('birthday', $profile->birthday) }}"
                           class="form-input">

                    @error('birthday')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror

                    <label for="study_program" class="form-label">
                        Opleiding
                    </label>

                    <input id="study_program"
                           name="study_program"
                           type="text"
                           value="{{ old('study_program', $profile->study_program) }}"
                           maxlength="255"
                           class="form-input">

                    @error('study_program')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="inner-card">
                    <h2 style="font-size: 24px; margin-bottom: 22px;">
                        Over mij
                    </h2>

                    <label for="bio" class="form-label">
                        Korte beschrijving
                    </label>

                    <textarea id="bio"
                              name="bio"
                              rows="5"
                              maxlength="1000"
                              class="form-input">{{ old('bio', $profile->bio) }}</textarea>

                    @error('bio')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="inner-card">
                    <h2 style="font-size: 24px; margin-bottom: 22px;">
                        Profielfoto
                    </h2>

                    @if ($profile->profile_photo)
                        <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                             alt="Profielfoto"
                             style="width: 110px; height: 110px; border-radius: 50%; object-fit: cover; margin-bottom: 18px;">
                    @else
                        <div style="width: 110px; height: 110px; border-radius: 50%; background: linear-gradient(135deg, #2563eb, #38bdf8); display: flex; align-items: center; justify-content: center; color: white; font-size: 38px; font-weight: bold; margin-bottom: 18px;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif

                    <label for="profile_photo" class="form-label">
                        Nieuwe profielfoto uploaden
                    </label>

                    <input id="profile_photo"
                           name="profile_photo"
                           type="file"
                           accept="image/*"
                           class="form-input">

                    @error('profile_photo')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="inner-card">
                    <h2 style="font-size: 24px; margin-bottom: 22px;">
                        Interesses
                    </h2>

                    @php
                        $checkedInterests = old('interests', $selectedInterestIds);
                    @endphp

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        @foreach ($interests as $interest)
                            <label style="background: white; border: 1px solid #dbeafe; border-radius: 999px; padding: 11px 15px; cursor: pointer;">
                                <input type="checkbox"
                                       name="interests[]"
                                       value="{{ $interest->id }}"
                                       @if (in_array($interest->id, $checkedInterests ?? [])) checked @endif>

                                <span style="margin-left: 6px; color: #2563eb; font-weight: bold;">
                                    {{ $interest->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    @error('interests')
                        <p style="color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-top: 28px;">
                    <button type="submit" class="primary-action">
                        Profiel opslaan
                    </button>

                    <a href="{{ route('profiles.show', auth()->user()) }}"
                       class="secondary-action"
                       style="margin-left: 16px;">
                        Bekijk mijn publiek profiel
                    </a>
                </div>
            </form>
        </section>

    </div>
@endsection