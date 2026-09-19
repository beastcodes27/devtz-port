<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Public Portfolio Routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Mission Control Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', \App\Http\Controllers\Admin\AdminProjectController::class);
    Route::resource('inquiries', \App\Http\Controllers\Admin\AdminInquiryController::class)->only(['index', 'show', 'destroy']);
    Route::patch('inquiries/{inquiry}/status', [\App\Http\Controllers\Admin\AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');
    Route::resource('articles', \App\Http\Controllers\Admin\AdminArticleController::class);
});
