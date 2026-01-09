<?php

use App\Http\Controllers\Admin\FeatureController as AdminFeatureController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('pages', [AdminPageController::class, 'index'])->name('pages.index');
        Route::put('pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');

        Route::get('features', [AdminFeatureController::class, 'index'])->name('features.index');
        Route::post('features', [AdminFeatureController::class, 'store'])->name('features.store');
        Route::put('features/{feature}', [AdminFeatureController::class, 'update'])->name('features.update');
        Route::delete('features/{feature}', [AdminFeatureController::class, 'destroy'])->name('features.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
