<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\WorkofdayController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('global');
});

Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class,'store'])->name('post.store');
Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/post/{post}/update',[PostController::class,'update'])->name('posts.update');
Route::post('/post/{post}/handle',[PostController::class,'handle'] )->name('post.handle');



//Route for Visitor contorller
Route::get('/visitor',[VisitorController::class,'index'])->name('visitor.index');
Route::get('/visitor/create',[VisitorController::class,'create'])->name('visitor.create');
Route::post('/visitor',[VisitorController::class,'store'])->name('visitor.store');
Route::get('/visitor/{visitor}/edit',[VisitorController::class,'edit'])->name('visitor.edit');
Route::put('/visitor/{visitor}/update',[VisitorController::class,'update'])->name('visitor.update');
Route::get('/visitors/{visitor}/appointments', [VisitorController::class, 'appointments'])->name('visitor.appointments');



//Route for Officer controller
Route::get('/officer',[OfficerController::class,'index'])->name('officer.index');
Route::get('/officer/create', [OfficerController::class, 'create'])->name('officer.create');
Route::post('/officer', [OfficerController::class, 'store'])->name('officer.store');
Route::get('/officer/{officer}/edit', [OfficerController::class, 'edit'])->name('officer.edit');
Route::put('/officer/{officer}', [OfficerController::class, 'update'])->name('officer.update');


//Route for WorkDays Controller
Route::get('/workofday',[WorkofdayController::class,'index'])->name('workofday.index');
Route::get('/workofday/create', [WorkofdayController::class, 'create'])->name('workofday.create');
Route::post('/workofday', [WorkofdayController::class, 'store'])->name('workofday.store');
Route::get('/workofday/{workofday}/edit', [WorkofdayController::class, 'edit'])->name('workofday.edit');
Route::put('/workofday/{workofday}', [WorkofdayController::class, 'update'])->name('workofday.update');

//Route for ActivityController
Route::get('/activity',[ActivityController::class,'index'])->name('activity.index');
Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
Route::post('/activity', [ActivityController::class, 'store'])->name('activity.store');
Route::get('/activity/{activity}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
Route::put('/activity/{activity}', [ActivityController::class, 'update'])->name('activity.update');


//route for Appointment
Route::get('/appointments',[AppointmentController::class,'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
