<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController as FrontProjectController;
use App\Http\Controllers\Frontend\TeamController as FrontTeamController;
use App\Http\Controllers\Frontend\CareerController as FrontCareerController;
use App\Http\Controllers\Frontend\NewsController as FrontNewsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingsController;

// ===================== FRONTEND ROUTES =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [FrontProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [FrontProjectController::class, 'show'])->name('projects.show');
Route::get('/about', [FrontTeamController::class, 'index'])->name('about');
Route::get('/people', [FrontTeamController::class, 'people'])->name('people');
Route::get('/sustainability', [HomeController::class, 'sustainability'])->name('sustainability');
Route::get('/careers', [FrontCareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{id}', [FrontCareerController::class, 'show'])->name('careers.show');
Route::get('/news', [FrontNewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [FrontNewsController::class, 'show'])->name('news.show');

// ===================== AUTH ROUTES =====================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== ADMIN ROUTES =====================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projects
    Route::resource('projects', ProjectController::class);

    // Team
    Route::resource('team', TeamController::class);

    // Careers
    Route::resource('careers', CareerController::class);

    // News
    Route::resource('news', NewsController::class);

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});
