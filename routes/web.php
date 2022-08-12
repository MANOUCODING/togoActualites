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

Route::view('/welcome', 'welcome');

Route::view('/', 'welcome');

//Partie connexion

Route::view('/admin', 'login');

Route::view('/admin/login', 'login');

Route::view('/login', 'login');

//Partie administration

Route::view('/admin/dashboard', 'dashboard');
