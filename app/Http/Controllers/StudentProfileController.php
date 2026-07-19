<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\Profile;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        $profile = $user->profile;

        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }

        $interests = Interest::all();

        $selectedInterestIds = $user->interests
            ->pluck('id')
            ->toArray();

        return view('student-profile.edit', [
            'user' => $user,
            'profile' => $profile,
            'interests' => $interests,
            'selectedInterestIds' => $selectedInterestIds,
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'study_program' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|max:2048',
            'interests' => 'nullable|array',
            'interests.*' => 'exists:interests,id',
        ]);

        $profile = $user->profile;

        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }

        $profilePhoto = $profile->profile_photo;

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo')
                ->store('profiles', 'public');
        }

        $profile->update([
            'username' => $validated['username'] ?? null,
            'birthday' => $validated['birthday'] ?? null,
            'study_program' => $validated['study_program'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'profile_photo' => $profilePhoto,
        ]);

        $user->interests()->sync($validated['interests'] ?? []);

        return redirect()->route('student-profile.edit')
            ->with('success', 'Je profiel werd aangepast.');
    }
}