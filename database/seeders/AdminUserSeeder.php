<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'role' => 'admin',
        ]);

        Profile::create([
            'user_id' => $admin->id,
            'study_program' => 'Backend Web',
            'bio' => 'Administrator van StudentHub.',
            'profile_photo' => null,
        ]);
    }
}