<?php

use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageSectionController;


// Home
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/homepage', [LandingController::class, 'indexhome'])->name('homepage');
Route::get('/program-studi', [LandingController::class, 'StudyProgram'])->name('study-program');
Route::get('/news', [LandingController::class, 'news'])->name('news');
Route::get('/akademis/ekstrakulikuler', [LandingController::class, 'extracurricular'])->name('academic.extra');
Route::get('/akademis/osis', [LandingController::class, 'osis'])->name('academic.osis');
Route::get('/fasilitas', [LandingController::class, 'fasility'])->name('fasility');
Route::get('/pendaftaran', [LandingController::class, 'register'])->name('register-form');
// Route::post('/pendaftaran', [LandingController::class, 'register-store'])->name('register-store');
// Public: Pendaftaran
Route::get('/register-student', [StudentController::class, 'create'])->name('register.create');
Route::post('/register-student', [StudentController::class, 'store'])->name('register.store');

// Public Page (halaman dinamis)
Route::get('/page/{slug}', [PageController::class, 'show'])->name('pages.show');

// Admin (butuh login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Student management
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::patch('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::post('/students/{id}/update-status', [StudentController::class, 'updateStatus'])->name('students.updateStatus');
    Route::get('/students/export/pdf', [StudentController::class, 'exportPdf']);
    Route::get('/students/export/excel', [StudentController::class, 'exportExcel']);

    // Settings
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');

    // Pages
    Route::get('/pages', [PageController::class, 'index'])->name('admin.pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::get('/page/{slug}', [PageController::class, 'show'])->name('pages.show');
    Route::post('/pages', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/pages/{page}', [PageController::class, 'update'])->name('admin.pages.update');

    Route::get('/news-index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    // Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::post('/news-index', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news-update', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});


Route::middleware('auth')->prefix('admin/sections')->name('admin.sections.')->group(function () {
    Route::get('/', [PageSectionController::class, 'index'])->name('index');
    Route::get('/{section}/edit', [PageSectionController::class, 'edit'])->name('edit');
    Route::put('/{section}', [PageSectionController::class, 'update'])->name('update');
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/loginn', [AuthController::class, 'showLoginFormm'])->name('loginn');
