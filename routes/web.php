<?php
use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Detailpage6;
use App\Http\Controllers\DetailProductInventoryManagement;
use App\Http\Controllers\Detailssection7Controller;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductDetailscontroller;
use App\Http\Controllers\ProductDetailsHighlightcontroller;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Section4DetailPage;
use App\Http\Controllers\Section5DetailPage;
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
    Route::get("add-detail-page-section_4", [Section4DetailPage::class, "section4"]);
    Route::get("add-detail-page-section_5", [Section5DetailPage::class, "section5"]);
    Route::get("add-detail-page-section_6", [Detailpage6::class, "detail6"]);
    Route::get("add-detail-page-section_7", [Detailssection7Controller::class, "detail7"]);
    Route::get("add-detail-page-faqs", [FaqsController::class, "faqs"]);
    Route::get("add-features", [FeaturesController::class, "feature"]);
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
//to add section4 data
Route::post('/section4/store', [Section4DetailPage::class, 'store'])->name('section4.store');
//to get section4 data
Route::get('/section4/{id}', [Section4DetailPage::class, 'show'])->name('section4.show');
// Update section4 data
Route::post('/section4/{id}', [Section4DetailPage::class, 'update'])->name('section4.update');
//to delet section4
Route::post('/delete-section4', [Section4DetailPage::class, 'deletesection4'])->name('delete.section4');
//to add section5 data
Route::post('/section5/store', [Section5DetailPage::class, 'store'])->name('section5.store');
//to get section5 data
Route::get('/section5/{id}', [Section5DetailPage::class, 'show'])->name('section5.show');
// Update section5 data
Route::post('/section5/{id}', [Section5DetailPage::class, 'update'])->name('section5.update');
//to delet section5
Route::post('/delete-section5', [Section5DetailPage::class, 'deletesection5'])->name('delete.section5');
//to add detail6 data
Route::post('/detail6/store', [Detailpage6::class, 'store'])->name('detail6.store');
//to get section5 data
Route::get('/detail6/{id}', [Detailpage6::class, 'show'])->name('detail6.show');
// Update section5 data
Route::post('/detail6/{id}', [Detailpage6::class, 'update'])->name('detail6.update');
//to delet section5
Route::post('/delete-detail6', [Detailpage6::class, 'deletedetail6'])->name('delete.detail6');
//to add detail7 data
Route::post('/detail7/store', [Detailssection7Controller::class, 'store'])->name('detail7.store');
//to get section5 data
Route::get('/detail7/{id}', [Detailssection7Controller::class, 'show'])->name('detail7.show');
// Update section5 data
Route::post('/detail7/{id}', [Detailssection7Controller::class, 'update'])->name('detail7.update');
//to delet section5
Route::post('/delete-detail7', [Detailssection7Controller::class, 'deletedetail7'])->name('delete.detail7');
//to add faqs data
Route::post('/faqs/store', [FaqsController::class, 'store'])->name('faqs.store');
//to get faqs data
Route::get('/faqs/{id}', [FaqsController::class, 'show'])->name('faqs.show');
// Update faqs data
Route::post('/faqs/{id}', [FaqsController::class, 'update'])->name('faqs.update');
//to delet faqs
Route::post('/delete-faqs', [FaqsController::class, 'deletefaqs'])->name('delete.faqs');
//to add feature data
Route::post('/feature/store', [FeaturesController::class, 'store'])->name('feature.store');
//to get feature data
Route::get('/feature/{id}', [FeaturesController::class, 'show'])->name('feature.show');
// Update feature data
Route::post('/feature/{id}', [FeaturesController::class, 'update'])->name('feature.update');
//to delet feature
Route::post('/delete-feature', [FeaturesController::class, 'deletefeature'])->name('delete.feature');