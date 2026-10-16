<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCentersController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ApprenticesController;
use App\Http\Controllers\CourseTeachersController;
Route::get('/', function () {
    return view('welcome', ['news' => []]);
})->name('welcome');


// ÁREAS
Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');

Route::get('area/{area}', [AreaController::class, 'show'])->name('area.show');
Route::post('area', [AreaController::class, 'store'])->name('area.store');
Route::get('area/{area}/editar',[AreaController::class,'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

// CENTROS DE FORMACIÓN
Route::get('training-centers', [TrainingCentersController::class, 'index'])->name('training_center.index');
Route::get('training-centers/create', [TrainingCentersController::class, 'create'])->name('training_center.create');

Route::post('training-centers', [TrainingCentersController::class, 'store'])->name('training_center.store');
Route::get('training-centers/{id}', [TrainingCentersController::class, 'show'])->name('training_center.show');
Route::get('training-centers/{id}/edit', [TrainingCentersController::class, 'edit'])->name('training_center.edit');
Route::put('training-centers/{id}', [TrainingCentersController::class, 'update'])->name('training_center.update');
Route::delete('training-centers/{id}', [TrainingCentersController::class, 'destroy'])->name('training_center.destroy');

// EQUIPOS
Route::get('computers', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computers/create', [ComputerController::class, 'create'])->name('computer.create');

Route::post('computers', [ComputerController::class, 'store'])->name('computer.store');
Route::get('computers/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('computers/{id}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computers/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computers/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');

// CURSOS / FICHAS
Route::get('courses', [CoursesController::class, 'index'])->name('course.index');
Route::get('courses/create', [CoursesController::class, 'create'])->name('course.create');
Route::post('courses', [CoursesController::class, 'store'])->name('course.store');
Route::get('courses/{id}', [CoursesController::class, 'show'])->name('course.show');
Route::get('courses/{id}/edit', [CoursesController::class, 'edit'])->name('course.edit');
Route::put('courses/{id}', [CoursesController::class, 'update'])->name('course.update');
Route::delete('courses/{id}', [CoursesController::class, 'destroy'])->name('course.destroy');

// INSTRUCTORES
Route::get('teachers', [TeachersController::class, 'index'])->name('teacher.index');
Route::get('teachers/create', [TeachersController::class, 'create'])->name('teacher.create');
Route::post('teachers', [TeachersController::class, 'store'])->name('teacher.store');
Route::get('teachers/{id}', [TeachersController::class, 'show'])->name('teacher.show');
Route::get('teachers/{id}/edit', [TeachersController::class, 'edit'])->name('teacher.edit');
Route::put('teachers/{id}', [TeachersController::class, 'update'])->name('teacher.update');
Route::delete('teachers/{id}', [TeachersController::class, 'destroy'])->name('teacher.destroy');

// APRENDICES
Route::get('apprentices', [ApprenticesController::class, 'index'])->name('apprentice.index');
Route::get('apprentices/create', [ApprenticesController::class, 'create'])->name('apprentice.create');
Route::post('apprentices', [ApprenticesController::class, 'store'])->name('apprentice.store');
Route::get('apprentices/{id}', [ApprenticesController::class, 'show'])->name('apprentice.show');
Route::get('apprentices/{id}/edit', [ApprenticesController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentices/{id}', [ApprenticesController::class, 'update'])->name('apprentice.update');
Route::delete('apprentices/{id}', [ApprenticesController::class, 'destroy'])->name('apprentice.destroy');

// ASIGNACIÓN CURSOS / INSTRUCTORES
Route::get('course_teachers', [CourseTeachersController::class, 'index'])->name('course_teacher.index');
Route::get('course_teachers/create', [CourseTeachersController::class, 'create'])->name('course_teacher.create');
Route::post('course_teachers', [CourseTeachersController::class, 'store'])->name('course_teacher.store');
Route::get('course_teachers/{id}', [CourseTeachersController::class, 'show'])->name('course_teacher.show');
Route::get('course_teachers/{id}/edit', [CourseTeachersController::class, 'edit'])->name('course_teacher.edit');
Route::put('course_teachers/{id}', [CourseTeachersController::class, 'update'])->name('course_teacher.update');
Route::delete('course_teachers/{id}', [CourseTeachersController::class, 'destroy'])->name('course_teacher.destroy');
