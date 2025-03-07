<?php
use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DetailProductInventoryManagement;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductDetailscontroller;
use App\Http\Controllers\ProductDetailsHighlightcontroller;
use App\Http\Controllers\ProjectsController;
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
//to open product detail
Route::get('/product/{slug}/details', [ProductDetailsController::class, 'detailsPage'])
    ->name('project.details');

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
    Route::get("messages", [MessageController::class, "message"]);
    Route::get("add-banner-details", [BannerController::class, "addbannerdetails"]);
    Route::get("add-highlight", [HighlightController::class, "highlight"]);
    Route::get("add-products", [ProjectsController::class, "addprojects"]);
    Route::get("add-product-details-banner", [ProductDetailscontroller::class, "addproductdetails"]);
    Route::get("add-product-details-highlight", [ProductDetailsHighlightcontroller::class, "addproducthighlight"]);
    Route::get("add-product-inventory-management", [DetailProductInventoryManagement::class, "inventorymanagement"]);
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
// to save customer message
Route::post('/submit-message', [MessageController::class, 'submitMessage'])->name('submit.message');
//to delet msg
Route::post('/delete-message', [MessageController::class, 'deletemessage'])->name('delete.message');
//to chng msg status
Route::post('/update-status', [MessageController::class, 'updateStatus']);
//to add banner data
Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
//to get banner data
Route::get('/banner/{id}', [BannerController::class, 'show'])->name('banner.show');
// Update banner data
Route::post('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
//to delet banner
Route::post('/delete-banner', [BannerController::class, 'deletebanner'])->name('delete.banner');
//to add highlight data
Route::post('/highlight/store', [HighlightController::class, 'store'])->name('highlight.store');
//to get highlight data
Route::get('/highlight/{id}', [HighlightController::class, 'show'])->name('highlight.show');
// Update highlight data
Route::post('/highlight/{id}', [HighlightController::class, 'update'])->name('highlight.update');
//to delet highlight
Route::post('/delete-highlight', [HighlightController::class, 'deletehighlight'])->name('delete.highlight');
//to add product data
Route::post('/project/store', [ProjectsController::class, 'store'])->name('project.store');
//to get product data
Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('project.show');
// Update product data
Route::post('/project/{id}', [ProjectsController::class, 'update'])->name('project.update');
//to delet product
Route::post('/delete-project', [ProjectsController::class, 'deleteproject'])->name('delete.project');
//to add product data
Route::post('/product/store', [ProductDetailscontroller::class, 'store'])->name('product.store');
//to get product data
Route::get('/product/{id}', [ProductDetailscontroller::class, 'show'])->name('product.show');
// Update product data
Route::post('/product/{id}', [ProductDetailscontroller::class, 'update'])->name('product.update');
//to delet product
Route::post('/delete-product', [ProductDetailscontroller::class, 'deleteproduct'])->name('delete.product');
//to add productdetailhighlight data
Route::post('/productdetailhighlight/store', [ProductDetailsHighlightcontroller::class, 'store'])->name('productdetailhighlight.store');
//to get productdetailhighlight data
Route::get('/productdetailhighlight/{id}', [ProductDetailsHighlightcontroller::class, 'show'])->name('productdetailhighlight.show');
// Update productdetailhighlight data
Route::post('/productdetailhighlight/{id}', [ProductDetailsHighlightcontroller::class, 'update'])->name('productdetailhighlight.update');
//to delet productdetailhighlight
Route::post('/delete-productdetailhighlight', [ProductDetailsHighlightcontroller::class, 'deletehighlight'])->name('delete.productdetailhighlight');
//to add inventory data
Route::post('/inventory/store', [DetailProductInventoryManagement::class, 'store'])->name('inventory.store');
//to get inventory data
Route::get('/inventory/{id}', [DetailProductInventoryManagement::class, 'show'])->name('inventory.show');
// Update inventory data
Route::post('/inventory/{id}', [DetailProductInventoryManagement::class, 'update'])->name('inventory.update');
//to delet inventory
Route::post('/delete-inventory', [DetailProductInventoryManagement::class, 'deleteinventory'])->name('delete.inventory');
