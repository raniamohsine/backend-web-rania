@extends('layouts.public')

@section('title', 'Mijn profiel aanpassen - StudentHub')

@section('content')
    <section class="bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold mb-6">
            Mijn profiel aanpassen
        </h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                Controleer de ingevulde gegevens.
            </div>
        @endif

        <form method="POST"
              action="{{ route('student-profile.update') }}"
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @method('PATCH')
           <div style="margin-bottom: 20px;">
    <input type="submit"
           value="Profiel opslaan"
           style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; font-weight: bold; cursor: pointer;">
</div>
            <div>
                <label for="username" class="block font-medium text-sm text-gray-700">
                    Gebruikersnaam
                </label>

                <input id="username"
                       name="username"
                       type="text"
                       value="{{ old('username', $profile->username) }}"
                       maxlength="255"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="birthday" class="block font-medium text-sm text-gray-700">
                    Geboortedatum
                </label>

                <input id="birthday"
                       name="birthday"
                       type="date"
                       value="{{ old('birthday', $profile->birthday) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('birthday')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="study_program" class="block font-medium text-sm text-gray-700">
                    Opleiding
                </label>

                <input id="study_program"
                       name="study_program"
                       type="text"
                       value="{{ old('study_program', $profile->study_program) }}"
                       maxlength="255"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                @error('study_program')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="bio" class="block font-medium text-sm text-gray-700">
                    Over mij
                </label>

                <textarea id="bio"
                          name="bio"
                          rows="5"
                          maxlength="1000"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('bio', $profile->bio) }}</textarea>

                @error('bio')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="profile_photo" class="block font-medium text-sm text-gray-700">
                    Profielfoto
                </label>

                <input id="profile_photo"
                       name="profile_photo"
                       type="file"
                       accept="image/*"
                       class="mt-1 block w-full">

                @if ($profile->profile_photo)
                    <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                         alt="Profielfoto"
                         class="w-24 h-24 rounded-full object-cover mt-4">
                @endif

                @error('profile_photo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <p class="block font-medium text-sm text-gray-700 mb-2">
                    Interesses
                </p>

                <div class="space-y-2">
                    @foreach ($interests as $interest)
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="interests[]"
                                   value="{{ $interest->id }}"
                                   @if (in_array($interest->id, old('interests', $selectedInterestIds))) checked @endif
                                   class="rounded border-gray-300">

                            <span class="ml-2">
                                {{ $interest->name }}
                            </span>
                        </label>
                    @endforeach
                </div>

                @error('interests')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-6 border-t">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded font-semibold">
                    Profiel opslaan
                </button>
            </div>
        </form>
    </section>
@endsection