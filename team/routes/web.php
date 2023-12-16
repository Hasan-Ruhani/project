<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\portfolioController;
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

    Route::get('/', [Controller::class, 'homePage']);

    // category
    Route::post('/createCategory', [categoryController::class, 'createCategory']);
    Route::get('/allCategory', [categoryController::class, 'allCategory']);
    Route::post('/deleteCategory/{id}', [categoryController::class, 'deleteCategory']);

    // portfolio
    Route::post('/portfolioItem/{id}', [portfolioController::class, 'createPortfolio_item']);
    Route::post('/portfolioItem_update/{id}', [portfolioController::class, 'updatePortfolio_item']);
    Route::get('/portfolioBy_category/{id}', [portfolioController::class, 'portfolioBy_category']);
    Route::get('/allPortfolio', [portfolioController::class, 'allPortfolio']);
    Route::post('/deletePortfolio/{id}', [portfolioController::class, 'deletePortfolio']);

    // teamd
    Route::post('/createProfile', [teamController::class, 'createProfile']); //->middleware([TokenVerificationMiddleware::class]);
    Route::get('/user-profile',[teamController::class,'userProfile']); //->middleware([TokenVerificationMiddleware::class]);
    Route::post('/deleteProfile', [teamController::class, 'deleteProfile']); //->middleware([TokenVerificationMiddleware::class]);
    Route::post('/updateProfile', [teamController::class, 'updateProfile']); //->middleware([TokenVerificationMiddleware::class]);

