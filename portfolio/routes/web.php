<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\userController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Middleware\adminMiddleware;
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

    // Admin..............................................
    // Route::middleware(['adminAuth']) -> group(function() {
        // Route::get('/user-profile',[dashboardController::class,'userProfile'])->middleware([adminMiddleware::class]);
        // Route::post('/user-update',[userController::class,'updateProfile']);

    // });

// Web API Routes
Route::post('/admin-login',[adminController::class,'adminLogin']);
Route::post('/user-registration',[userController::class,'userRegistration']);
Route::post('/user-login',[userController::class,'userLogin']);
Route::post('/send-otp',[userController::class,'sendOTPCode']);
Route::post('/verify-otp',[userController::class,'verifyOTP']);
Route::post('/reset-password',[userController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user-profile',[dashboardController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[userController::class,'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

// User/Admin Logout
Route::get('/admin-logout',[adminController::class,'adminLogout']);
Route::get('/user-logout',[userController::class,'userLogout']);

// page
Route::get('/adminLogin',[adminController::class,'AdminPage']);
Route::get('/userLogin',[userController::class,'LoginPage']);
Route::get('/userRegistration',[userController::class,'RegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[userController::class,'ResetPasswordPage']);

// profile page
Route::get('/profile',[dashboardController::class,'profilePage'])->middleware([TokenVerificationMiddleware::class]);


// ..........................................................................

Route::get('/', [homeController::class, 'homePage']);
Route::get('/team', [teamController::class, 'teamPage']);
Route::get('/contact', [contactController::class, 'contactPage']);
Route::get('/blog', [memberController::class, 'blogPage']);
Route::get('/404', [homeController::class, 'errorPage']);
Route::get('/dashboard', [dashboardController::class, 'dashboardPage']);

// backend
Route::get('/userList', [dashboardController::class, 'userList']);  
Route::get('/profileDetail/{id}', [dashboardController::class, 'profileDetail']);  

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