<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsItemController as AdminNewsItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{newsItem}', [NewsController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqPageController::class, 'index'])
    ->name('faq.index');

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/profiles', [PublicProfileController::class, 'index'])
    ->name('profiles.index');

Route::get('/profiles/{user}', [PublicProfileController::class, 'show'])
    ->name('profiles.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('news', AdminNewsItemController::class)
            ->except(['show']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/my-profile/edit', [StudentProfileController::class, 'edit'])
        ->name('student-profile.edit');

    Route::patch('/my-profile', [StudentProfileController::class, 'update'])
        ->name('student-profile.update');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';