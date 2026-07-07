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
use App\Http\Controllers\Admin\ContentPageController;
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

    // Modul CRUD Otomatis (Menggunakan Resource)
    Route::resource('destinations', DestinationController::class);
    Route::post('/approval/{id}/dismiss', [DestinationController::class, 'dismissNotification'])->name('approval.dismiss');
    Route::resource('galleries', GalleryController::class)->except(['show', 'edit', 'update']);
    Route::resource('villa-galleries', VillaGalleryController::class)->names('villa')->except(['show', 'edit', 'update']);
    Route::resource('villa-rooms', VillaRoomController::class)->names('rooms')->except(['show']);

    // Modul Custom (Guides & Itineraries menggunakan satu controller yang sama)
    Route::prefix('guides')->name('guides.')->group(function () {
        Route::get('/', [ContentPageController::class, 'indexGuides'])->name('index');
        Route::get('/create', [ContentPageController::class, 'createGuide'])->name('create');
        Route::post('/store', [ContentPageController::class, 'storeGuide'])->name('store');
        Route::get('/{id}/edit', [ContentPageController::class, 'editGuide'])->name('edit');
        Route::put('/{id}', [ContentPageController::class, 'updateGuide'])->name('update');
        Route::delete('/{id}', [ContentPageController::class, 'destroyGuide'])->name('destroy');
    });

    Route::prefix('itineraries')->name('itineraries.')->group(function () {
        Route::get('/', [ContentPageController::class, 'indexItineraries'])->name('index');
        Route::get('/create', [ContentPageController::class, 'createItinerary'])->name('create');
        Route::post('/store', [ContentPageController::class, 'storeItinerary'])->name('store');
        Route::get('/{id}/edit', [ContentPageController::class, 'editItinerary'])->name('edit');
        Route::put('/{id}', [ContentPageController::class, 'updateItinerary'])->name('update');
        Route::delete('/{id}', [ContentPageController::class, 'destroyItinerary'])->name('destroy');
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
