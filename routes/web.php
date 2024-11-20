<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyImageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\AdminMiddleware;

Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('contact', 'contact')->name('contact');
    Route::get('about', 'about')->name('about');
    Route::get('faq', 'faq')->name('faq');
    Route::get('blog', 'blog')->name('blog');
    Route::get('property/{slug}', 'property')->name('property');
    Route::get('sales', 'sales')->name('sales');
});

Route::post('send', [MessageController::class, 'store'])->name('send');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', AdminController::class)->name('index');

    Route::middleware(AdminMiddleware::class)->group(function() {
        Route::controller(SettingsController::class)->name('settings')->prefix('settings')->group(function() {
            Route::get('/', 'index');
            Route::post('/', 'update');
        });

        Route::controller(ContactController::class)->name('contact')->prefix('contact')->group(function() {
            Route::get('/', 'index');
            Route::post('/', 'update');
        });

        Route::resources([
            'faq' => FAQController::class,
            'categories' => CategoryController::class
        ]);

        Route::controller(FAQController::class)->name('faq.')->prefix('faq')->group(function() {
            Route::post('sort', 'sort')->name('sort');
            Route::post('status', 'status')->name('status');
        });

        Route::controller(AboutController::class)->name('about')->prefix('about')->group(function() {
            Route::get('/', 'index');
            Route::post('/', 'update');
            Route::delete('image/{id}', 'deleteImage')->name('.delete-image');
        });

        Route::controller(CategoryController::class)->name('categories.')->prefix('categories')->group(function() {
            Route::post('sort', 'sort')->name('sort');
            Route::post('status', 'status')->name('status');
        });

        Route::post('properties/verify', [PropertyController::class, 'verify'])->name('properties.verify');

        Route::controller(MessageController::class)->name('messages.')->prefix('messages')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('{id}', 'show')->name('show');
            Route::delete('delete/{id}', 'delete')->name('delete');
        });
    });

    Route::resources([
        'blog' => BlogController::class,
        'properties' => PropertyController::class
    ]);

    Route::name('blog.')->prefix('blog')->controller(BlogController::class)->group(function() {
        Route::post('sort', 'sort')->name('sort');
        Route::post('status', 'status')->name('status');
        Route::delete('image/{blog}/{id}', 'deleteImage')->name('delete-image');
    });

    Route::name('properties.')->prefix('properties')->group(function() {
        Route::post('status', [PropertyController::class, 'status'])->name('status');

        Route::name('images.')->prefix('images')->controller(PropertyImageController::class)->group(function() {
            Route::get('{id}', 'index')->name('index');
            Route::post('status', 'status')->name('status');
            Route::post('sort', 'sort')->name('sort');
            Route::post('{id}', 'store')->name('store');
            Route::delete('delete/{id}', 'delete')->name('delete');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require_once __DIR__ . '/auth.php';
