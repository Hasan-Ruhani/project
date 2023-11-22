<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\teamController;
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

// Web API Routes
Route::post('/user-registration',[userController::class,'userRegistration']);
Route::post('/user-login',[userController::class,'userLogin']);
Route::post('/send-otp',[userController::class,'sendOTPCode']);
Route::post('/verify-otp',[userController::class,'verifyOTP']);
Route::post('/reset-password',[userController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user-profile',[dashboardController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[userController::class,'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

// User Logout
Route::get('/logout',[userController::class,'userLogout']);

// page
Route::get('/userLogin',[userController::class,'LoginPage']);
Route::get('/userRegistration',[userController::class,'RegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[userController::class,'ResetPasswordPage']);

// ..........................................................................

Route::get('/', [homeController::class, 'homePage']);
Route::get('/team', [teamController::class, 'teamPage']);
Route::get('/contact', [contactController::class, 'contactPage']);
Route::get('/blog', [memberController::class, 'blogPage']);
Route::get('/404', [homeController::class, 'errorPage']);
Route::get('/dashboard', [dashboardController::class, 'dashboardPage']);

// backend
Route::get('/userList', [dashboardController::class, 'userList']);  
Route::post('/userProfile', [dashboardController::class, 'userProfile']);  

// dashboard backend
Route::post('/createProfile', [dashboardController::class, 'createProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/deleteProfile', [dashboardController::class, 'deleteProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/updateProfile', [dashboardController::class, 'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

// review
Route::post('/createReview', [reviewController::class, 'createReview'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userReview', [reviewController::class, 'userReview']);

// specific review
Route::post('/createSpcReview', [reviewController::class, 'createSpcReview'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/spcUserReview', [reviewController::class, 'spcUserReview']);

// specific contact
Route::post('/createSpcContact', [contactController::class, 'createSpcContact']);
Route::get('/spcUserContact', [contactController::class, 'spcUserContact'])->middleware([TokenVerificationMiddleware::class]);