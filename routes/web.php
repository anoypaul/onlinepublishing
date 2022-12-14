<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\MembershipController;
use App\Http\Controllers\Frontend\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [UserController::class, 'read']);


Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index']);

    // _______membership route_______
    Route::get('/membership/index', [MembershipController::class, 'index']);
    Route::get('/membership/create', [MembershipController::class, 'create']);
    Route::post('/membership/store', [MembershipController::class, 'store']);
    Route::get('/membership/edit/{id}', [MembershipController::class, 'edit']);
    Route::post('/membership/update/{id}', [MembershipController::class, 'update']);
    Route::get('/membership/delete/{id}', [MembershipController::class, 'delete']);

    // _______post route_______
    Route::get('/post/index', [PostController::class, 'index']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store']);
    Route::get('/post/edit/{id}', [PostController::class, 'edit']);
    Route::post('/post/update/{id}', [PostController::class, 'update']);
    Route::get('/post/delete/{id}', [PostController::class, 'delete']);
});

// _______admin route_______
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});
