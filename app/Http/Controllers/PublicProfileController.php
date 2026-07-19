<?php

namespace App\Http\Controllers;

use App\Models\User;

class PublicProfileController extends Controller
{
    public function index()
    {
        $users = User::with(['profile', 'interests'])
            ->get();

        return view('profiles.index', [
            'users' => $users,
        ]);
    }

    public function show(User $user)
    {
        $user->load(['profile', 'interests']);

        return view('profiles.show', [
            'user' => $user,
        ]);
    }
}