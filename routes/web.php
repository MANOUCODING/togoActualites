<?php

use Illuminate\Support\Facades\Route;

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

//Partie affichage pour les clients ou visiteurs


Route::view('/home', 'welcome');

Route::view('/', 'welcome');

Route::view('/about', 'welcome');

Route::view('/login', 'welcome');

Route::view('/register', 'welcome');

Route::view('/contact', 'welcome');

//Partie administration

Route::view('/admin/dashboard', 'dashboard');
