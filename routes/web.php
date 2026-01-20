<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PageController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('Home/home');
});

// السكن
Route::resource('accommodations', AccommodationController::class);

// النقل
Route::resource('transports', TransportController::class);

// الحجوزات
Route::resource('bookings', BookingController::class);
Route::get('/booking/{id}/pdf', [BookingController::class, 'printPDF'])->name('bookings.pdf');
// التقييمات
Route::resource('reviews', ReviewController::class);

// البحث (سكن فقط)
Route::get('/search', [AccommodationController::class, 'search'])
    ->name('search');

// صفحات ثابتة
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
