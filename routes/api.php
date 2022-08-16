<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/profile', [AuthController::class, 'profile'])->name('profile');
});

//Espace Accueil

Route::get('/home', [CategoryController::class, 'home']);

//Espace Super Administrateur


//Gestion des categories

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('index.category.show');

Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category.show');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete.category.show');

Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');
