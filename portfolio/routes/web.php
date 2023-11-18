<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\userController;
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
Route::post('/user-registration',[UserController::class,'userRegistration']);
Route::post('/user-login',[UserController::class,'userLogin']);
Route::post('/send-otp',[UserController::class,'sendOTPCode']);
Route::post('/verify-otp',[UserController::class,'verifyOTP']);
Route::post('/reset-password',[UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user-profile',[UserController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

// User Logout
Route::get('/logout',[UserController::class,'userLogout']);

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
Route::get('/memberList', [dashboardController::class, 'memberList']);  
Route::post('/memberDetail/{id}', [memberController::class, 'memberDetail']);  

// dashboard backend
Route::post('/createMember', [dashboardController::class, 'createMember']);
Route::post('/deleteMember', [dashboardController::class, 'deleteMember']);
Route::post('/updateMember', [dashboardController::class, 'updateMember']);