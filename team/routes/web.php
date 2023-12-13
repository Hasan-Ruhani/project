<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\portfolioController;
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

    Route::get('/', [Controller::class, 'homePage']);

    // category
    Route::post('/createCategory', [categoryController::class, 'createCategory']);
    Route::get('/allCategory', [categoryController::class, 'allCategory']);
    Route::post('/deleteCategory/{id}', [categoryController::class, 'deleteCategory']);

    // portfolio
    Route::post('/portfolioItem/{id}', [portfolioController::class, 'createPortfolio_item']);
    Route::get('/portfolioBy_category/{id}', [portfolioController::class, 'portfolioBy_category']);
    Route::get('/allPortfolio', [portfolioController::class, 'allPortfolio']);
    Route::post('/deletePortfolio/{id}', [portfolioController::class, 'deletePortfolio']);
