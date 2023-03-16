<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Job Controller

// All Jobs
Route::get('/', [JobController::class, 'index'])->name('home');

// get a Job
Route::get('/job/{id}', [JobController::class, 'show']);

// show post form
Route::get('/post', [JobController::class, 'post'])->middleware('auth');

// insert a job
Route::post('/job/insert', [JobController::class, 'insert'])->middleware('auth');

// show edit form
Route::get('/job/{id}/edit', [JobController::class, 'edit'])->middleware('auth');

// update a job
Route::put('/job/{id}/update', [JobController::class, 'update'])->middleware('auth');

// delete a job
Route::delete('/job/delete', [JobController::class, 'delete'])->middleware('auth');


// UserController

// show user register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// regist a new user
Route::post('/user/insert', [UserController::class, 'insert'])->middleware('guest');

// show a user info
Route::get('/user', [UserController::class, 'get'])->middleware('auth');

// update user info in the database
Route::put('/user/update', [UserController::class, 'update'])->middleware('auth');

// delete the user from database  /user/delete
Route::delete('/user/delete', [UserController::class, 'delete'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login to app /user/login
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// about this application
Route::get('/about', function() {
    return view('about');
});
