<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\teamController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// page
Route::get('/', [homeController::class, 'homePage']);
Route::get('/team', [teamController::class, 'teamPage']);
Route::get('/contact', [contactController::class, 'contactPage']);
Route::get('/blog', [memberController::class, 'blogPage']);
Route::get('/404', [homeController::class, 'errorPage']);

// backend
Route::get('/memberList', [memberController::class, 'memberList']);  
Route::get('/memberDetail/{id}', [memberController::class, 'memberDetail']);  

// dashboard backend
Route::post('/createMember', [dashboardController::class, 'createMember']);
Route::post('/deleteMember', [dashboardController::class, 'deleteMember']);
Route::post('/updateMember', [dashboardController::class, 'updateMember']);