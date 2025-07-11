<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CredentialExportController;

// Show welcome page
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('credentials.index')
        : view('welcome');
})->name('home');

// ✅ Forgot/reset password routes (for guests)
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

// 🔐 Authenticated routes
Route::middleware(['auth'])->group(function () {

    // ✅ Correct: exclude 'show' to avoid undefined method error
    Route::resource('credentials', CredentialController::class)->except(['show']);

    // Additional credential routes
    Route::get('/credentials/export/pdf', [CredentialExportController::class, 'exportPDF'])->name('credentials.export.pdf');
    Route::get('/credentials/trash', [CredentialController::class, 'trash'])->name('credentials.trash');
    Route::post('/credentials/{id}/restore', [CredentialController::class, 'restore'])->name('credentials.restore');
    

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Password change
    Route::get('/change-password', [PasswordController::class, 'show'])->name('password.form');
    Route::post('/change-password', [PasswordController::class, 'store'])->name('password.change');
});

// Auth routes (login, register)
require __DIR__.'/auth.php';
