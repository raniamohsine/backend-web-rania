<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('student-profile.edit');
    }
}