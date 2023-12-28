<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\testController;
use App\Http\Controllers\userController;
use App\Http\Middleware\TokenVerificationMiddleware;
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

    // Web API Routes
    Route::post('/user-registration',[userController::class,'userRegistration']);
    Route::post('/user-login',[userController::class,'userLogin']);
    Route::post('/send-otp',[userController::class,'sendOTPCode']);
    Route::post('/verify-otp',[userController::class,'verifyOTP']);
    Route::post('/reset-password',[userController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);

    // User/Admin Logout
    Route::get('/user-logout',[userController::class,'userLogout']);

    // page
    Route::get('/userLogin',[userController::class,'LoginPage']);
    Route::get('/userRegistration',[userController::class,'RegistrationPage']);
    Route::get('/sendOtp',[userController::class,'SendOtpPage']);
    Route::get('/verifyOtp',[userController::class,'VerifyOTPPage']);
    Route::get('/resetPassword',[userController::class,'ResetPasswordPage']);

    // profile page
    Route::get('/profile',[teamController::class,'profilePage'])->middleware([TokenVerificationMiddleware::class]);

    // dashboard backend
    Route::post('/createProfile', [teamController::class, 'createProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::get('/user-profile',[teamController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::post('/deleteProfile', [teamController::class, 'deleteProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::post('/updateProfile', [teamController::class, 'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

    // category
    Route::post('/createCategory', [categoryController::class, 'createCategory']);
    Route::get('/allCategory', [categoryController::class, 'allCategory']);
    Route::post('/deleteCategory/{id}', [categoryController::class, 'deleteCategory']);

    // portfolio
    Route::post('/store', [testController::class, 'store']);
    Route::get('/view', [testController::class, 'view']);
    // Route::post('/portfolioItem/{id}', [portfolioController::class, 'createPortfolio_item']);
    Route::post('/portfolioItem_update/{id}', [portfolioController::class, 'updatePortfolio_item']);
    Route::get('/portfolioBy_category/{id}', [portfolioController::class, 'portfolioBy_category']);
    Route::get('/allPortfolio', [portfolioController::class, 'allPortfolio']);
    Route::post('/deletePortfolio/{id}', [portfolioController::class, 'deletePortfolio']);

    // teamd
    Route::post('/createProfile', [teamController::class, 'createProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::get('/user-profile',[teamController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::post('/deleteProfile', [teamController::class, 'deleteProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::post('/updateProfile', [teamController::class, 'updateProfile'])->middleware([TokenVerificationMiddleware::class]);
    Route::get('/userList', [teamController::class, 'userList']);  ; 
    Route::get('/profileDetail/{id}', [teamController::class, 'profileDetail']);
    Route::get('/profileDetails', [teamController::class, 'profileDetail_page']);
    
    // specific review
    Route::post('/createSpcReview/{profile_id}', [ReviewController::class, 'createSpcReview'])->middleware([TokenVerificationMiddleware::class]);
    Route::get('/spcUserReview/{id}', [reviewController::class, 'spcUserReview']);

    // specific contact
    Route::post('/createSpcContact/{id}', [contactController::class, 'createSpcContact']);
    Route::get('/spcUserContact', [contactController::class, 'spcUserContact'])->middleware([TokenVerificationMiddleware::class]);
    
    
    
  



