<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\OfficerController;
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
    return view('welcome');
});

Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class,'store'])->name('post.store');
Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/post/{post}/update',[PostController::class,'update'])->name('posts.update');


//Route for Visitor contorller
Route::get('/visitor',[VisitorController::class,'index'])->name('visitor.index');
Route::get('/visitor/create',[VisitorController::class,'create'])->name('visitor.create');
Route::post('/visitor',[VisitorController::class,'store'])->name('visitor.store');
Route::get('/visitor/{visitor}/edit',[VisitorController::class,'edit'])->name('visitor.edit');
Route::put('/visitor/{visitor}/update',[VisitorController::class,'update'])->name('visitor.update');


//Route for Officer controller
Route::get('/officer',[OfficerController::class,'index'])->name('officer.index');
Route::get('/officer/create', [OfficerController::class, 'create'])->name('officer.create');
Route::post('/officer', [OfficerController::class, 'store'])->name('officer.store');
Route::get('/officer/{officer}/edit', [OfficerController::class, 'edit'])->name('officer.edit');
Route::put('/officer/{officer}', [OfficerController::class, 'update'])->name('officer.update');
