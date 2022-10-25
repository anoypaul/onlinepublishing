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

Route::get('/', function () {
    // return view('welcome');
    return view('frontend.visitor.index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [UserController::class, 'index']);

// Route::get('/membership/index', [MembershipController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index']);
    Route::get('/membership/index', [MembershipController::class, 'index']);
    Route::get('/membership/create', [MembershipController::class, 'create']);
    Route::post('/membership/store', [MembershipController::class, 'store']);
    Route::get('/membership/edit/{id}', [MembershipController::class, 'edit']);
    Route::post('/membership/update/{id}', [MembershipController::class, 'update']);
    Route::get('/membership/delete/{id}', [MembershipController::class, 'delete']);

    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store']);


});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});
