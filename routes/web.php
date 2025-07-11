<?php
use App\Http\Controllers\AboutServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogsDetailsController;
use App\Http\Controllers\BlogsfirstsectionController;
use App\Http\Controllers\BlogsSections;
use App\Http\Controllers\Detailpage6;
use App\Http\Controllers\DetailProductInventoryManagement;
use App\Http\Controllers\Detailssection7Controller;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FeaturebannerController;
use App\Http\Controllers\FeatureHighlightController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\FeaturesdetailsController;
use App\Http\Controllers\FeatureSection3Controller;
use App\Http\Controllers\Featuresection5Controller;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\MainFaqsController;
use App\Http\Controllers\MainSectionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductDetailscontroller;
use App\Http\Controllers\ProductDetailsHighlightcontroller;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Section4DetailPage;
use App\Http\Controllers\Section5DetailPage;
use App\Http\Controllers\ServiceBannercontroller;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceHighlightController;
use App\Http\Controllers\ServiceSection3Controller;
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
//to open feature detail
Route::get('/feature/{slug}/details', [FeaturesdetailsController::class, 'detailsfeature'])
    ->name('feature.details');
//to open blogs detail
Route::get('/blogs/{slug}/details', [BlogsDetailsController::class, 'detailsblog'])
    ->name('blogs.details');
//to open servce detail
Route::get('/service/{slug}/details', [ServiceController::class, 'detailsservice'])
    ->name('service.details');    

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
    Route::get("add-feature-banner", [FeaturebannerController::class, "featurebanner"]);
    Route::get("add-settings", [SettingsController::class, "websitesettings"]);
    Route::get("add-feature-highlights", [FeatureHighlightController::class, "featurehighlight"]);
    Route::get("add-feature-section_3", [FeatureSection3Controller::class, "featuresection3"]);
    Route::get("add-feature-section_4", [Featuresection5Controller::class, "featuresection5"]);
    Route::get("add-faqs", [MainFaqsController::class, "mainfaqs"]);
    Route::get("add-main_section", [MainSectionController::class, "mainsection"]);
    Route::get("add-blog", [BlogsController::class, "blog"]);
    Route::get("add-blog_detail", [BlogsfirstsectionController::class, "blogsdetails"]);
    Route::get("add-blog_detail_section", [BlogsSections::class, "blogssectionsssss"]);
    Route::get("services", [ServiceController::class, "openservices"]);
    Route::get("add-service-banner", [ServiceBannercontroller::class, "servicebanner"]);
    Route::get("add-service-highlights", [ServiceHighlightController::class, "servicehighlight"]);
     Route::get("add-service-section_3", [ServiceSection3Controller::class, "servicesection3"]);
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
//to add featurebanner data
Route::post('/featurebanner/store', [FeaturebannerController::class, 'store'])->name('featurebanner.store');
//to get section5 data
Route::get('/featurebanner/{id}', [FeaturebannerController::class, 'show'])->name('featurebanner.show');
// Update section5 data
Route::post('/featurebanner/{id}', [FeaturebannerController::class, 'update'])->name('featurebanner.update');
//to delet section5
Route::post('/delete-featurebanner', [FeaturebannerController::class, 'deletefeaturebanner'])->name('delete.featurebanner');
//to add setting data
Route::post('/setting/store', [SettingsController::class, 'store'])->name('settings.store');
//to get setting data
Route::get('/get-setting/{id}', [SettingsController::class, 'show'])->name('settings.show');
// Update setting data
Route::post('/update-setting/{id}', [SettingsController::class, 'update'])->name('settings.update');
//to add featurehighlight data
Route::post('/featurehighlight/store', [FeatureHighlightController::class, 'storefeaturehighlight'])->name('featurehighlight.store');
//to get featurehighlight data
Route::get('/featurehighlight/{id}', [FeatureHighlightController::class, 'showfeaturehighlight'])->name('featurehighlight.show');
// Update featurehighlight data
Route::post('/featurehighlight/{id}', [FeatureHighlightController::class, 'updatefeaturehighlight'])->name('featurehighlight.update');
//to delet featurehighlight
Route::post('/delete-featurehighlight', [FeatureHighlightController::class, 'deletefeaturehighlight'])->name('delete.featurehighlight');
//to add Featuresection3 data
Route::post('/featuresection3/store', [FeatureSection3Controller::class, 'store'])->name('featuresection3.store');
//to get Featuresection3 data
Route::get('/featuresection3/{id}', [FeatureSection3Controller::class, 'show'])->name('featuresection3.show');
// Update Featuresection3 data
Route::post('/featuresection3/{id}', [FeatureSection3Controller::class, 'update'])->name('featuresection3.update');
//to delet Featuresection3
Route::post('/delete-featuresection3', [FeatureSection3Controller::class, 'deletefeaturesection3'])->name('delete.Featuresection3');
//to add Featuresection5 data
Route::post('/featuresection5/store', [FeatureSection5Controller::class, 'store'])->name('featuresection5.store');
//to get featuresection5 data
Route::get('/featuresection5/{id}', [FeatureSection5Controller::class, 'show'])->name('featuresection5.show');
// Update featuresection5 data
Route::post('/featuresection5/{id}', [FeatureSection5Controller::class, 'update'])->name('featuresection5.update');
//to delet featuresection5
Route::post('/delete-featuresection5', [FeatureSection5Controller::class, 'deletefeaturesection5'])->name('delete.Featuresection5');
//to add mainfaqs data
Route::post('/mainfaqs/store', [MainFaqsController::class, 'store'])->name('mainfaqs.store');
//to get mainfaqs data
Route::get('/mainfaqs/{id}', [MainFaqsController::class, 'show'])->name('mainfaqs.show');
// Update mainfaqs data
Route::post('/mainfaqs/{id}', [MainFaqsController::class, 'update'])->name('mainfaqs.update');
//to delet mainfaqs
Route::post('/delete-mainfaqs', [MainFaqsController::class, 'deletemainfaqs'])->name('delete.mainfaqs');
//to add main data
Route::post('/main/store', [MainSectionController::class, 'store'])->name('main.store');
//to get main data
Route::get('/main/{id}', [MainSectionController::class, 'show'])->name('main.show');
// Update main data
Route::post('/main/{id}', [MainSectionController::class, 'update'])->name('main.update');
//to delet main
Route::post('/delete-main', [MainSectionController::class, 'deletemain'])->name('delete.main');
//to add blog data
Route::post('/blog/store', [BlogsController::class, 'store'])->name('blog.store');
//to get blog data
Route::get('/blog/{id}', [BlogsController::class, 'show'])->name('blog.show');
// Update blog data
Route::post('/blog/{id}', [BlogsController::class, 'update'])->name('blog.update');
//to delet blog
Route::post('/delete-blog', [BlogsController::class, 'deleteblog'])->name('delete.blog');
//to add blogdetails data
Route::post('/detailblogssssss/store', [BlogsfirstsectionController::class, 'store'])->name('detailblogssssss.store');
//to get blog data
Route::get('/detailblogssssss/{id}', [BlogsfirstsectionController::class, 'show'])->name('detailblogssssss.show');
// Update blog data
Route::post('/detailblogssssss/{id}', [BlogsfirstsectionController::class, 'update'])->name('detailblogssssss.update');
//to delet blog
Route::post('/delete-detailblogssssss', [BlogsfirstsectionController::class, 'deletedetailblogssssss'])->name('delete.detailblogssssss');
//to add sectionssssssssblog data
Route::post('/sectionssssssssblog/store', [BlogsSections::class, 'store'])->name('sectionssssssssblog.store');
//to get sectionssssssssblog data
Route::get('/sectionssssssssblog/{id}', [BlogsSections::class, 'show'])->name('sectionssssssssblog.show');
// Update sectionssssssssblog data
Route::post('/sectionssssssssblog/{id}', [BlogsSections::class, 'update'])->name('sectionssssssssblog.update');
//to delet blog
Route::post('/delete-sectionssssssssblog', [BlogsSections::class, 'deletesectionssssssssblog'])->name('delete.sectionssssssssblog');
//to add service data
Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
//to get service data
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show');
// Update service data
Route::post('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
//to delet service
Route::post('/delete-service', [ServiceController::class, 'deleteservice'])->name('delete.service');
//to add servicebanner data
Route::post('/servicebanner/store', [ServiceBannercontroller::class, 'store'])->name('servicebanner.store');
//to get section5 data
Route::get('/servicebanner/{id}', [ServiceBannercontroller::class, 'show'])->name('servicebanner.show');
// Update section5 data
Route::post('/servicebanner/{id}', [ServiceBannercontroller::class, 'update'])->name('servicebanner.update');
//to delet section5
Route::post('/delete-servicebanner', [ServiceBannercontroller::class, 'deleteservicebanner'])->name('delete.servicebanner');
//to add servicehighlight data
Route::post('/servicehighlight/store', [ServiceHighlightController::class, 'storeservicehighlight'])->name('servicehighlight.store');
//to get servicehighlight data
Route::get('/servicehighlight/{id}', [ServiceHighlightController::class, 'showservicehighlight'])->name('servicehighlight.show');
// Update servicehighlight data
Route::post('/servicehighlight/{id}', [ServiceHighlightController::class, 'updateservicehighlight'])->name('servicehighlight.update');
//to delet servicehighlight
Route::post('/delete-servicehighlight', [ServiceHighlightController::class, 'deleteservicehighlight'])->name('delete.servicehighlight');

//to add servicesection3 data
Route::post('/servicesection3/store', [ServiceSection3Controller::class, 'store'])->name('servicesection3.store');
//to get servicesection3 data
Route::get('/servicesection3/{id}', [ServiceSection3Controller::class, 'show'])->name('servicesection3.show');
// Update servicesection3 data
Route::post('/servicesection3/{id}', [ServiceSection3Controller::class, 'update'])->name('servicesection3.update');
//to delet servicesection3
Route::post('/delete-servicesection3', [ServiceSection3Controller::class, 'deleteservicesection3'])->name('delete.servicesection3');