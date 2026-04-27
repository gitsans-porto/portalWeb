<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::get('/', [PortalController::class, 'index'])->name('beranda');
Route::get('/layanan/{slug}', [PortalController::class, 'layanan'])->name('layanan.detail');

// News Routes
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');

// Redirect /admin to /admin/dashboard
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth');

// Profil Routes
Route::prefix('profil')->group(function () {
    Route::get('/tentang', function () {
        return redirect()->route('profil.tentang');
    });
    Route::get('/tentang-sekolah', [PortalController::class, 'tentangSekolah'])->name('profil.tentang');
    Route::get('/visi-misi', [PortalController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/kepala-sekolah', [PortalController::class, 'kepalaSekolah'])->name('profil.kepala-sekolah');
});

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Profile Management CRUD
    Route::get('/profiles/{section}/edit', [AdminProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profiles/{section}', [AdminProfileController::class, 'update'])->name('profiles.update');

    // News Management CRUD
    Route::resource('news', AdminNewsController::class);

    // Services Management (ONLY edit SOP)
    Route::resource('services', AdminServiceController::class)->only(['edit', 'update']);

    // Issue Reports Management
    Route::get('/reports', [App\Http\Controllers\Admin\IssueReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{report}', [App\Http\Controllers\Admin\IssueReportController::class, 'show'])->name('reports.show');
    Route::patch('/reports/{report}/status', [App\Http\Controllers\Admin\IssueReportController::class, 'updateStatus'])->name('reports.updateStatus');
    Route::patch('/reports/{report}/feedback', [App\Http\Controllers\Admin\IssueReportController::class, 'updateFeedback'])->name('reports.updateFeedback');
});

// Issue Report Submission
Route::post('/report-issue', [App\Http\Controllers\IssueReportController::class, 'store'])->name('report.store');

// Pusat Pengaduan Routes
Route::get('/pengaduan', [App\Http\Controllers\IssueReportController::class, 'index'])->name('pengaduan.index');
Route::post('/pengaduan/track', [App\Http\Controllers\IssueReportController::class, 'track'])->name('pengaduan.track');
