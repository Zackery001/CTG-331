<?php

use App\Http\Controllers\TaskManageController;
use App\Http\Controllers\UserAuthController;
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
//User Authentication Routes 

//Register
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserAuthController::class, 'register'])->name('register');

//Login
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');

//Task Management Routes 

Route::get('/', [TaskManageController::class, 'index'])->name('welcome'); //index/landing page
Route::get('/completed', [TaskManageController::class, 'completed'])->name('completed'); //completed tasks page
Route::get('/bin', [TaskManageController::class, 'bin'])->name('bin'); // recycle bin page

Route::get('create', [TaskManageController::class, 'create'])->name('create.show'); //task create page
Route::post('create', [TaskManageController::class, 'store'])->name('create.store'); //route to upload created task to the database

Route::get('edit/{id}', [TaskManageController::class, 'show'])->name('edit.show'); //route to edit
Route::post('edit/{id}', [TaskManageController::class, 'update'])->name('edit.update'); //route to update

Route::get('remove/{id}', [TaskManageController::class, 'remove'])->name('remove'); //route to remove task and send it to the recycle bin
Route::get('delete/{id}', [TaskManageController::class, 'delete'])->name('delete'); //route to delete task permanently
Route::get('restore/{id}', [TaskManageController::class, 'restore'])->name('restore'); //route to restore task from recycle bin

Route::get('update/{id}/{status}', [TaskManageController::class, 'updateStatus'])->name('update.status'); //route to update task status
