<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MessageController;
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


//Espace Super Administrateur


//Gestion des categories

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('index.category.show');

Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category.show');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete.category.show');

Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');


//Gestion des articles

Route::get('/articles/create', [ArticleController::class, 'create']);

Route::post('/articles/store', [ArticleController::class, 'store']);


//Gestion Message

Route::post('/message/store', [MessageController::class, 'store']);
Route::get('/messages', [MessageController::class, 'index']);
Route::get('/messages/{id}', [MessageController::class, 'show']);
Route::delete('/message/{id}', [MessageController::class, 'destroy']);

