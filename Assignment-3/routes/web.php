<?php

use App\Http\Controllers\TaskManageController;
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
Route::get('register', [UserAuthController::class, 'index'])->name('register.show');
Route::post('register', [UserAuthController::class, 'register'])->name('register');

//Task Management Routes
Route::get('/', [TaskManageController::class, 'index'])->name('welcome');
Route::get('/completed', [TaskManageController::class, 'completed'])->name('completed');
Route::get('/bin', [TaskManageController::class, 'bin'])->name('bin');

Route::get('create', [TaskManageController::class, 'create'])->name('create.show');
Route::post('create', [TaskManageController::class, 'store'])->name('create.store');

Route::get('edit/{id}', [TaskManageController::class, 'show'])->name('edit.show');
Route::post('edit/{id}', [TaskManageController::class, 'update'])->name('edit.update');

Route::get('remove/{id}', [TaskManageController::class, 'remove'])->name('remove');
Route::get('delete/{id}', [TaskManageController::class, 'delete'])->name('delete');
Route::get('restore/{id}', [TaskManageController::class, 'restore'])->name('restore');

Route::get('update/{id}/{status}', [TaskManageController::class, 'updateStatus'])->name('update.status');
