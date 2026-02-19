<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

Route::get("cronos", function () {
    return Inertia::render("Cronometro");
});

Route::get('/main', function () {
    return Inertia::render('Main', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('main');

Route::get('/dashboard', MainController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('projects', \App\Http\Controllers\ProjectController::class);

Route::get("students", [UserController::class, "getStudents"])->name("students.index");

Route::get("teachers", [UserController::class, "getTeachers"])->name("teachers.index");

Route::resource('users', UserController::class);


Route::resource('courses', \App\Http\Controllers\CourseController::class);

require __DIR__ . '/auth.php';
