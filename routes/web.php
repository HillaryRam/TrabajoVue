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
Route::get("students/create", [UserController::class, "createStudent"])->name("students.create");
Route::post("students", [UserController::class, "storeStudent"])->name("students.store");
Route::get("students/{user}/edit", [UserController::class, "editStudent"])->name("students.edit");
Route::put("students/{user}", [UserController::class, "updateStudent"])->name("students.update");
Route::delete("students/{user}", [UserController::class, "destroyStudent"])->name("students.destroy");

Route::get("teachers", [UserController::class, "getTeachers"])->name("teachers.index");
Route::get("teachers/create", [UserController::class, "createTeacher"])->name("teachers.create");
Route::post("teachers", [UserController::class, "storeTeacher"])->name("teachers.store");
Route::get("teachers/{user}/edit", [UserController::class, "editTeacher"])->name("teachers.edit");
Route::put("teachers/{user}", [UserController::class, "updateTeacher"])->name("teachers.update");
Route::delete("teachers/{user}", [UserController::class, "destroyTeacher"])->name("teachers.destroy");

Route::resource('users', UserController::class);

Route::resource('courses', \App\Http\Controllers\CourseController::class)->except(['index']);
Route::get("courses", [UserController::class, "getCourses"])->name("courses.index");

require __DIR__ . '/auth.php';
