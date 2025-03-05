<?php
use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserAuthcontroller;
use Illuminate\Support\Facades\Route;

//User Page    
Route::get('/', [UserAuthController::class, 'home']);
//to open register page
Route::get("register", [RegisterController::class, "register"]);
//to open login page
Route::get("login", [RegisterController::class, "login"]);
//register
Route::post("register",[UserAuthcontroller::class,"register"]);
//Login
Route::post("login",[UserAuthcontroller::class,"login"])->name('login');
//to open accounting page
Route::get("accounting", [UserAuthcontroller::class, "account"]);
//to open installation page
Route::get("installment-management-software", [UserAuthcontroller::class, "installation"]);
//to open manufacturing page
Route::get("manufacturing", [UserAuthcontroller::class, "manufacturing"]);
//to open bookkeeping page
Route::get("bookkeeping-software", [UserAuthcontroller::class, "bookkeeping"]);
//to open expense page
Route::get("expense-management-software", [UserAuthcontroller::class, "expense"]);
//to open financial page
Route::get("financial-reporting-software", [UserAuthcontroller::class, "financial"]);
//to open financial page
Route::get("invoicing-software", [UserAuthcontroller::class, "invoicing"]);
//to open ocr page
Route::get("OCR-software", [UserAuthcontroller::class, "ocr"]);
//to open blog page
Route::get("our_blog", [UserAuthcontroller::class, "blog"]);
//to open grow_your_business page
Route::get("blog/grow_your_business", [UserAuthcontroller::class, "growbusiness"]);
//to open select_app page
Route::get("select_app", [UserAuthcontroller::class, "selectapp"]);
//to open contact page
Route::get("contact_us", [UserAuthcontroller::class, "contact"]);

Route::group([
    "middleware" => ["auth:sanctum"]
],function(){

//Logout
Route::post("logout",[UserAuthcontroller::class,"logout"]);
//to logout normal user
Route::post('logoutuser', [UserAuthcontroller::class, 'logoutuser']);
//to change password
Route::post("changePassword",[UserAuthcontroller::class,"changePassword"]);
});

Route::group(['middleware' => ['admin.auth'], 'prefix' => 'admin'], function() {
    Route::get("", [UserAuthcontroller::class, "admin"]);
    Route::get("users", [UserAuthcontroller::class, "users"]);
    Route::get("admin_profile", [SettingsController::class, "adminprofile"]);
});
//to open forgot password page
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
//to send reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
//to open reset password page
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//to reset password
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
//to update profile
Route::post('/update-profile', [SettingsController::class, 'updateProfile'])->name('update.profile');
//to get user data
Route::post('/get-user-data', [UserAuthcontroller::class, 'getUserData'])->name('user.getData');
//to edit user
Route::post('/users/{id}/edit', [UserAuthController::class, 'editUser']);
//to delet user
Route::post('/delete-user', [UserAuthcontroller::class, 'deleteUser'])->name('delete.user');
