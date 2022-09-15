<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\NewsLatterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VisiteController;
use App\Http\Controllers\AuthController;
use App\Models\NewsLatter;
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
    
});

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

});

//Espace Accueil
Route::get('/home', [HomeController::class, 'home']);

Route::get('/alaUne', [HomeController::class, 'aLaUne']);

//Espace Super Administrateur

Route::get('/articles/publish/dashboard', [DashboardController::class, 'index']);


//Tableau de Bord

Route::get('/articles/publish/dashboard', [DashboardController::class, 'index']);

//Gestion des categories

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('index.category.show');

Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category.show');

Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete.category.show');

Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');


//Gestion des articles

Route::get('/articles/create', [ArticleController::class, 'create']);

Route::post('/articles/store', [ArticleController::class, 'store']);

Route::get('/article/{slug}/show', [ArticleController::class, 'show']);

Route::get('/article/{slug}/show/HH', [ArticleController::class, 'showHH']);

Route::put('/articles/{slug}/update', [ArticleController::class, 'update']);

Route::get('/articles/publish', [ArticleController::class, 'publish']);

Route::get('/articles/not/publish', [ArticleController::class, 'notPublish']);

Route::get('/articles/by/category', [ArticleController::class, 'byCategory']);

Route::get('/articles/by/author', [ArticleController::class, 'byAuthor']);

Route::delete('/article/{id}/delete', [ArticleController::class, 'destroy']);

Route::delete('/article/{id}/delete/author', [ArticleController::class, 'destroyByAuthor']);

Route::patch('/article/{id}/publish', [ArticleController::class, 'changePublish']);

Route::patch('/article/{id}/alaune', [ArticleController::class, 'changeAlaUne']);

//Gestion des visites

Route::get('/visites', [VisiteController::class, 'index']);

Route::post('/visites/create', [VisiteController::class, 'store']);


//Gestion Message

Route::post('/message/store', [MessageController::class, 'store']);

Route::get('/messages', [MessageController::class, 'index']);

Route::get('/messages/{id}', [MessageController::class, 'show']);

Route::delete('/message/{id}', [MessageController::class, 'destroy']);

//NewsLatters

Route::get('/newslatters/statistiques', [NewsLatterController::class, 'statisques']);

Route::get('/newslatters', [NewsLatterController::class, 'index']);

Route::get('/newslatters/{id}', [NewsLatterController::class, 'show']);

Route::put('/newslatters/{id}/update', [NewsLatterController::class, 'update']);

Route::delete('/newslatters/{id}', [NewsLatterController::class, 'destroy']);

Route::post('/newslatters/store', [NewsLatterController::class, 'store']);

Route::patch('/newslatters/{id}/status', [NewsLatterController::class, 'changeStatus']);


//NewsLatters

Route::get('/users/statistiques', [UserController::class, 'statisques']);

Route::get('/users/externes', [UserController::class, 'index']);

Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::delete('/users/{id}/HH', [UserController::class, 'destroyHH']);

Route::patch('/users/{id}/status', [UserController::class, 'changeStatus']);

Route::patch('/users/{id}/status/HH', [UserController::class, 'changeStatusHH']);


