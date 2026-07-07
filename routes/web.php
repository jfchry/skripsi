<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InquiryController as FrontendInquiryController;

// Auth Controller
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\ItineraryController;
use App\Http\Controllers\Admin\VillaGalleryController;
use App\Http\Controllers\Admin\VillaRoomController;
use App\Http\Controllers\Admin\AdminInquiryController;

// Owner Controller
use App\Http\Controllers\Owner\ApprovalController;

/*
|--------------------------------------------------------------------------
| 1. Frontend / Public Routes (Bisa Diakses Semua Pengunjung)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/villa', [HomeController::class, 'villa'])->name('villa');

Route::prefix('destinations')->name('destinations.')->group(function () {
    Route::get('/', [HomeController::class, 'destinations'])->name('index');
    Route::get('/{id}', [HomeController::class, 'destinationDetail'])->name('detail');
});

Route::prefix('guides')->name('guides.')->group(function () {
    Route::get('/', [HomeController::class, 'guides'])->name('index');
    Route::get('/{id}', [HomeController::class, 'guideDetail'])->name('detail');
});

Route::prefix('itineraries')->name('itinerary.')->group(function () {
    Route::get('/', [HomeController::class, 'itineraries'])->name('index');
    Route::get('/{id}', [HomeController::class, 'itineraryDetail'])->name('detail');
});

// Kirim pesan masuk dari tombol melayang
Route::post('/send-inquiry', [FrontendInquiryController::class, 'store'])->name('inquiries.store');


/*
|--------------------------------------------------------------------------
| 2. Autentikasi Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| 3. Secure Backend Admin Routes (Hanya untuk Role Admin)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 🌟 FIX JALUR DISMISS: Disesuaikan agar otomatis menghasilkan nama 'admin.approval.dismiss'
    Route::post('/approval/{id}/dismiss', [DashboardController::class, 'dismissNotification'])->name('approval.dismiss');

    // Modul CRUD Otomatis (Menggunakan Resource)
    Route::resource('destinations', DestinationController::class);
    Route::resource('galleries', GalleryController::class)->except(['show', 'edit', 'update']);
    Route::resource('villa-galleries', VillaGalleryController::class)->names('villa')->except(['show', 'edit', 'update']);
    Route::resource('villa-rooms', VillaRoomController::class)->names('rooms')->except(['show']);

    // 🌟 SEKARANG JALUR ROUTE MENJADI SANGAT BERSIH & MODULAR
    Route::prefix('guides')->name('guides.')->group(function () {
        Route::get('/', [GuideController::class, 'index'])->name('index');
        Route::get('/create', [GuideController::class, 'create'])->name('create');
        Route::post('/store', [GuideController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GuideController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GuideController::class, 'update'])->name('update');
        Route::delete('/{id}', [GuideController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('itineraries')->name('itineraries.')->group(function () {
        Route::get('/', [ItineraryController::class, 'index'])->name('index');
        Route::get('/create', [ItineraryController::class, 'create'])->name('create');
        Route::post('/store', [ItineraryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ItineraryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ItineraryController::class, 'update'])->name('update');
        Route::delete('/{id}', [ItineraryController::class, 'destroy'])->name('destroy');
    });

    // Modul Manajemen Inquiry
    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', [AdminInquiryController::class, 'index'])->name('index');
        Route::delete('/{id}', [AdminInquiryController::class, 'destroy'])->name('destroy');
    });
});

/*
|--------------------------------------------------------------------------
| 4. Secure Backend Owner Routes (Hanya untuk Role Owner)
|--------------------------------------------------------------------------
*/

Route::prefix('owner')->name('owner.')->middleware(['auth', 'role:owner'])->group(function () {
    // Jalur menuju dashboard persetujuan data owner
    Route::get('/dashboard', [ApprovalController::class, 'index'])->name('dashboard');
    Route::get('/history', [ApprovalController::class, 'history'])->name('history');
    Route::get('/approval/{id}/preview', [ApprovalController::class, 'preview'])->name('approval.preview');
    Route::post('/approval/{id}/action', [ApprovalController::class, 'action'])->name('approval.action');
});
