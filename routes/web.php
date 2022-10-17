<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*----------------------------- Start Website Controllers usage -----------------------------*/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RatingController;
// use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\MissionVisionController;
/*----------------------------- End Website Controllers usage -----------------------------*/

/*----------------------------- Start Dashboard Controllers usage -----------------------------*/
use App\Http\Controllers\Admin\DashboardHomeController;
use App\Http\Controllers\Admin\DashboardProductController;
use App\Http\Controllers\Admin\DashboardCategoryController;
use App\Http\Controllers\Admin\DashboardCartController;
use App\Http\Controllers\Admin\DashboardProfileController;
/*----------------------------- End Dashboard Controllers usage -----------------------------*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["verify" => true]);

/////////////////////////------------------------- start website route. -------------------------/////////////////////////

Route::group([], function () {    //group function for "home" route (same route name "home")
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/******************************************** Start profile & edit-profile Route ********************************************/
Route::group([
    'middleware' => ['auth'] // more than one middleware for the one or more route
], function () {
    Route::get('/profile', [ProfileController::class, 'cartItems_in_user_profile'])->name('User');
    Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->name('editProfile');
    Route::post('/edit-profile-post', [ProfileController::class, 'profileUpdatePassword'])->name('editProfile-post');
    Route::post('/edit-myProfile', [ProfileController::class, 'edit_my_Profile'])->name('editMyProfile');
});
/******************************************** Start profile & edit-profile Route ********************************************/

/******************************************** Start email verification Route ********************************************/
Route::get('/email-verification', [VerificationController::class, 'index'])->name('email-verification');
/******************************************** End email verification Route ********************************************/

/******************************************** Start Forgot Password (reset by Email) Route ********************************************/
Route::get('/reset-password', [ForgotPasswordController::class, 'add toindex'])->name('reset-password');
/******************************************** End Forgot Password (reset by Email) Route ********************************************/

/******************************************** Start reset Password (change password by using the email that was used for "Forgot Password") Route ********************************************/
Route::get('/change-password', [ResetPasswordController::class, 'index'])->name('change-password');
/******************************************** End reset Password (change password by using the email that was used for "Forgot Password") Route ********************************************/

/******************************************** Start Products Routes ********************************************/
Route::get('/products', [ProductController::class, 'index'])->name('products'); //products-landing-page
Route::get('/search' , [ProductController::class, 'search'])->name('search'); //product-results-landing-page (from the search 'query')
Route::get('/all-clothes', [ProductController::class, 'clothes_all_filter'])->name('clothes_all_filter'); //all-clothes-page
Route::get('/kids-wear', [ProductController::class, 'clothes_kids_filter'])->name('clothes_kids_filter'); //kids-clothes-page-only
Route::get('/men-wear', [ProductController::class, 'clothes_men_filter'])->name('clothes_men_filter'); //men-clothes-page-only
Route::get('/women-wear', [ProductController::class, 'clothes_women_filter'])->name('clothes_women_filter'); //women-clothes-page-only
Route::get('/formal-clothes', [ProductController::class, 'formal_clothes_all_filter'])->name('formal_clothes_all_filter'); //all-formal-clothes-page
Route::get('/casual-clothes', [ProductController::class, 'casual_clothes_all_filter'])->name('casual_clothes_all_filter'); //all-casual-clothes-page
Route::get('/sports-wear-clothes', [ProductController::class, 'sports_wear_clothes_all_filter'])->name('sports_wear_clothes_all_filter'); //all-sports-wear-clothes-page
Route::get('/all-accessories', [ProductController::class, 'accessories_all_filter'])->name('accessories_all_filter'); //all-accessories-page
Route::get('/kids-accessories', [ProductController::class, 'accessories_kids_filter'])->name('accessories_kids_filter'); //kids-accessories-page-only
Route::get('/men-accessories', [ProductController::class, 'accessories_men_filter'])->name('accessories_men_filter'); //men-accessories-page-only
Route::get('/women-accessories', [ProductController::class, 'accessories_women_filter'])->name('accessories_women_filter'); //women-accessories-page-only
Route::get('/product/{id}', [ProductController::class, 'single_product_page'])->name('single_product_page'); //single-product-page
/******************************************** End Products Routes ********************************************/

/******************************************** Start Some static website's pages Routes ********************************************/
Route::get('/mission-vision', [MissionVisionController::class, 'index'])->name('mission-vision');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');
/******************************************** End Some static website's pages Routes ********************************************/

/******************************************** Start Subscription Routes ********************************************/
Route::post('/subscription-submit' , [SubscriptionController::class, 'submit_subscription']);
/******************************************** End Subscription Routes ********************************************/

/******************************************** Start Cart Routes ********************************************/
Route::group([
    'middleware' => ['auth', 'only_customers'] // more than one middleware for the one or more route
], function () {
    Route::get('/cart', [CartController::class , 'cart_registered'])->name('cart-registered'); //will open the cart page for registered users (customers ONLY!)
    Route::delete('/cart/{id}', [CartController::class, 'destroy_for_cart'])->name('carts.destroy');
});
Route::group([
    'middleware' => ['only_customers_and_suppliers', 'cart_already_logged_in_as_a_customer'] // more than one middleware for the one or more route
], function () {
    Route::get('/cart-guest', [CartController::class , 'cart_unregistered'])->name('cart-unregistered'); //will open a page that tells the guests to login for accessing the cart page (from the URL)
});
// Route::get('/checkout/get/item/{id}', [CartController::class, 'getCartItemsForCheckout']);
Route::group([
    'middleware' => ['unregistered_users' , 'only_customers']
], function () {
    Route::post('/addCart/{id}', [CartController::class, 'addCart']);
    Route::post('/update-cart-items-quantity/{id}', [CartController::class, 'update_cart_items_quantity']);
    Route::get('/checkout/get/items', [CartController::class, 'getCartItemsForCheckout']); // total amount!
    Route::get('/checkout-items-details', [CartController::class, 'cartCheckOutView'])->name('checkout_details');
    Route::delete('/checkout-items-details/{id}', [CartController::class, 'destroy_for_cart_checkout'])->name('carts_checkout.destroy');
});

// Route::resource('/carts', DashboardCartController::class)->except(['index', 'create', 'store', 'show', 'update', 'edit']); //the 'destroy' resource function will be the one used only!

// Route::post('/cart', [CartController_x::class, 'store'])->name('cart');
// Route::post('/process/user/payment', [CartController_x::class, 'processPayment']);
/******************************************** End Cart Routes ********************************************/

/******************************************** Start Favorite Routes ********************************************/
Route::group([
    'middleware' => ['unregistered_users' , 'only_customers']
], function () {
    Route::post('/addFavorite/{id}', [FavoriteController::class, 'addFavorite']);
    Route::get('/favorites', [FavoriteController::class, 'favoritesCustomer'])->name('favorites-registered');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    // Route::get('/favorites/restore/{id}/', [FavoriteController::class, 'restore'])->name('favorites.restore');
});
Route::get('/favorites-guest', [FavoriteController::class, 'favoritesGuest'])->middleware('only_guests')->name('favorites-unregistered');
/******************************************** End Favorite Routes ********************************************/

/******************************************** Start Rating Route ********************************************/
Route::post('/addRating/{id}', [RatingController::class, 'addRating'])->middleware('only_customers');
/******************************************** End Rating Route ********************************************/
Route::group([
    'middleware' => ['unregistered_users' , 'only_admins_and_moderators']
], function () {
    Route::get('/contact-info-submitted', [ContactController::class, 'contact_success_view'])->name('contact_info_submitted');
});
Route::post('/contact-submit' , [ContactController::class, 'submit_contact_form']);
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::get('/contact-guest' , [ContactController::class, 'contactGuest'])->middleware('only_guests')->name('contact-guest');
/////////////////////////------------------------- end website route. -------------------------/////////////////////////






/////////////////////////------------------------- start dashboard (for admin, moderator & supplier) route. -------------------------/////////////////////////
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard'); //Dashborad home route
        /********************** Start products route. **********************/
        Route::resource('/products', DashboardProductController::class);
        Route::get('/product/delete', [DashboardProductController::class, 'delete'])->name('products.delete');
        Route::get('/product/restore/{id}/', [DashboardProductController::class, 'restore'])->name('products.restore');
        Route::delete('/product/forceDelete/{id}/', [DashboardProductController::class, 'forceDelete'])->name('products.forceDelete');
        /********************** End products route. **********************/

        /********************** Start categories route. **********************/
        Route::resource('/categories', DashboardCategoryController::class);
        Route::get('/category/delete', [DashboardCategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}/', [DashboardCategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forceDelete/{id}/', [DashboardCategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        /********************** End categories route. **********************/

        /********************** Start carts route. **********************/
        Route::resource('/carts', DashboardCartController::class);
        Route::get('/cart/delete', [DashboardCartController::class, 'delete'])->name('carts.delete');
        Route::get('/cart/restore/{id}/', [DashboardCartController::class, 'restore'])->name('carts.restore');
        Route::delete('/cart/forceDelete/{id}/', [DashboardCartController::class, 'forceDelete'])->name('carts.forceDelete');
        /********************** End carts route. **********************/

        //-------------------- Start users route. --------------------//
        Route::resource('users', UserController::class);
        Route::get('/profile', [DashboardProfileController::class, 'profile'])->name('profile');
        Route::get('/edit-profile', [DashboardProfileController::class, 'edit'])->name('edit-profile');
        Route::post('/edit-profile-post', [DashboardProfileController::class, 'profileUpdatePassword'])->name('edit-profile-post');
        Route::post('/edit-myProfile', [DashboardProfileController::class, 'edit_my_Profile'])->name('edit-myProfile');
        //-------------------- End users route. --------------------//

    });

});
/////////////////////////------------------------- end dashboard (for admin, moderator & supplier) route. -------------------------/////////////////////////


// Route::prefix('facebook')->name('facebook.')->group( function(){
//     Route::get('auth' , FacebookController::class, 'LoginUsingFacebook')->name('login');
//     Route::get('callback' , FacebookController::class, 'callbackFromFacebook')->name('callback');
// });


//*****-------------------- start social media (facebook). --------------------*****//
// Route::get('/redirect', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');
//*****-------------------- end social media (facebook). --------------------*****//


// Route::middleware(['middleware'=>'auth'])->group(function () {
//     Auth::routes();
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
//         Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
//         Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
//         Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');


//         Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
//         Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
//         Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

// });

// Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function(){
//     Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
//     Route::get('profile',[UserController::class,'profile'])->name('user.profile');
//     Route::get('settings',[UserController::class,'settings'])->name('user.settings');

// });

