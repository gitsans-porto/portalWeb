<?php

use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('beranda');
Route::get('/layanan/{slug}', [PortalController::class, 'layanan'])->name('layanan.detail');
