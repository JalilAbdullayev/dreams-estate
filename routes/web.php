<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('contact', 'contact')->name('contact');
    Route::get('about', 'about')->name('about');
    Route::get('faq', 'faq')->name('faq');
    Route::get('blog', 'blog')->name('blog');
    Route::get('property', 'property')->name('property');
    Route::get('sales', 'sales')->name('sales');
});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', AdminController::class)->name('index');
    Route::controller(SettingsController::class)->name('settings')->prefix('settings')->group(function() {
        Route::get('/', 'index');
        Route::post('/', 'update');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
