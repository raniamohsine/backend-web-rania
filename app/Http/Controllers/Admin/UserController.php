<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')
            ->orderBy('name')
            ->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        Profile::create([
            'user_id' => $user->id,
            'username' => $user->name,
            'birthday' => null,
            'study_program' => null,
            'bio' => null,
            'profile_photo' => null,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker werd aangemaakt.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:user,admin',
        ]);

        if ($user->id === auth()->id() && $validated['role'] !== 'admin') {
            return redirect()->route('admin.users.index')
                ->with('error', 'Je kunt je eigen adminrechten niet verwijderen.');
        }

        $user->update([
            'name' => $validated['name'],
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker werd aangepast.');
    }
}