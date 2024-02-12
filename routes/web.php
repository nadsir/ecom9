<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function (){
    return view('emails.vendor_confirmation');
});
Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function (){
    Route::match(['get','post'],'login','AdminController@login');

    Route::group(['middleware'=>['admin']],function (){
        //admin dashboard route
        Route::get('dashboard','AdminController@dashboard');
        //admin logout
        Route::get('logout','AdminController@logout');
        //update admin password
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        //check password
        Route::post('checkpassword','AdminController@checkPassword');
        //updating admin details
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
        //View Admins / Subadmins / Vendors
        Route::get('admins/{type?}','AdminController@admins');
        //View Vendor Details
        Route::get('view-vendor-details/{id}','AdminController@ViewVendorDetails');
        //Update Admin Status
        Route::post('/update-admin-status','AdminController@updateAdminStatus');
        //update vendor details
        Route::match(['get','post'],'update-vendor-details/{slug}','AdminController@updateVendorDetails');
        //Update Vendor Commission
        Route::post('update-vendor-commission','AdminController@updateVendorCommission');
        //Sections
        Route::get('sections','SectionController@sections');
        Route::post('/update-section-status','SectionController@updateSectionStatus');
        Route::get('delete-section/{id}','SectionController@deleteSection');
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');
        //Brands
        Route::get('brands','BrandController@brands');
        Route::post('/update-brand-status','BrandController@updateBrandStatus');
        Route::get('delete-brand/{id}','BrandController@deleteBrand');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        //Categories
        Route::get('categories','CategoryController@categories');
        Route::post('/update-category-status','CategoryController@updateCategoryStatus');
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
        Route::post('/append-categories-level','CategoryController@appendCategoriesLevel');
        Route::get('delete-category/{id}','CategoryController@deleteCategory');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');
        //Products
        Route::get('products','ProductsController@products');
        Route::post('/update-product-status','ProductsController@updateProductStatus');
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
        Route::get('delete-product-video/{id}','ProductsController@deleteProductVideo');

        //Attributes
        Route::match(['post','get'],'add-attributes/{id}','ProductsController@addAttibures');
        Route::post('/update-attribute-status','ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');
        Route::match(['get','post'],'edit-attributes/{id}','ProductsController@editAttributes');
        //Filter
        Route::get('filters','FilterController@filters');
        Route::get('filters-values','FilterController@filtersValues');
        Route::post('/update-filter-status','FilterController@updateFilterStatus');
        Route::post('/update-filter-value-status','FilterController@updateFilterValueStatus');
        Route::match(['post','get'],'add-edit-filter/{id?}','FilterController@addEditFilter');
        Route::match(['post','get'],'add-edit-filter-value/{id?}','FilterController@addEditFilterValue');
        Route::post('category-filters','FilterController@categoryFilters');

        //Images
        Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
        Route::post('/update-image-status','ProductsController@updateImageStatus');
        Route::get('delete-image/{id}','ProductsController@deleteImage');
        //Banners
        Route::get('banners','BannersController@banners');
        Route::post('/update-banner-status','BannersController@updateBannerStatus');
        Route::get('delete-banner/{id}','BannersController@deleteBanner');
        Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');
        //coupons
        Route::get('coupons','CouponsController@coupons');
        Route::post('/update-coupon-status','CouponsController@updateCouponStatus');
        Route::get('delete-coupon/{id}','CouponsController@deleteCoupon');
        Route::match(['get','post'],'add-edit-coupon/{id?}','CouponsController@addEditCoupon');
        //Users
        Route::get('users','UserController@users');
        Route::post('/update-user-status','UserController@updateUserStatus');

        //Orders
        Route::get('orders','OrderController@orders');
        Route::get('orders/{id}','OrderController@orderDetails');
        Route::post('update-order-status','OrderController@updateOrderStatus');
        Route::post('update-order-item-status','OrderController@updateOrderItemStatus');

        //Oder Invoices
        Route::get('orders/invoice/{id}','OrderController@viewOrderInvoice');
        Route::get('orders/invoice/pdf/{id}','OrderController@viewPDFInvoice');
        //Shipping Charges
        Route::get('shipping-charges','ShippingController@shippingCharges');
        Route::post('update-shipping-status','ShippingController@updateShippingStatus');
        Route::match(['get','post'],'edit-shipping-charges/{id}','ShippingController@editShippingCharges');

        //Newsletter Subscriber
        Route::get('subscribers','NewsletterController@subscribers');
        Route::post('/update-subscriber-status','NewsletterController@updateSubscriberStatus');
        Route::get('delete-subscriber/{id}','NewsletterController@deleteSubscriber');
        Route::get('exports-subscribers','NewsletterController@exportSubscribers');



    });

});
Route::get('orders/invoice/download/{id}','App\Http\Controllers\Admin\OrderController@viewPDFInvoice');



Route::namespace('App\Http\Controllers\Front')->group(function (){
    Route::get('/','IndexController@index');
    //Listing/Categories Routes
    $catUrls=Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    foreach ($catUrls as $key => $url){
        Route::match(['get','post'],'/'.$url,'ProductsController@listing');
    }
    // Vendor Products
    Route::get('/products/{vendorid}','ProductsController@vendorListing');
    //Product Details Page
    Route::get('product/{id}','ProductsController@details');
    //Get Product Attribute Price
    Route::post('get-product-price','ProductsController@getProductPrice');

    //Vendor Login/Register
    Route::get('/vendor/login-register','VendorController@LoginRegister');
    //Vendor Register
    Route::post('vendor/register','VendorController@VendorRegister');

    //Confirm Vendor Account
    Route::get('vendor/confirm/{code}','VendorController@confirmVendor');
    //Add to Cart Route
    Route::post('cart/add','ProductsController@cartAdd');
    //Cart Route
    Route::get('/cart','ProductsController@cart');
    //Update cart Item Quantity
    Route::post('/cart/update','ProductsController@cartUpdate');
    //Delete cart Item
    Route::post('/cart/delete','ProductsController@cartDelete');
    //User Login/Register
    Route::get('user/login-register',['as'=>'login','uses'=>'UserController@LoginRegister']);
    //User Register
    Route::post('/user/register','UserController@userRegister');
    //Search Products
    Route::get('search-products','ProductsController@listing');
    //Contact page
    Route::match(['get','post'],'contact','CmsController@contact');
    //Add Subscriber Email
    Route::post('add-subscriber-email','NewsletterController@addSubscriberEmail');

    Route::group(['middleware'=>['auth']],function (){
        //User Account
        Route::match(['get','post'],'user/account','UserController@userAccount');
        //User Update Password
        Route::post('user/update-password','UserController@userUpdatePassword');
        //Apply Coupon
        Route::post('/apply-coupon','ProductsController@applyCoupon');
        //checkout
        Route::match(['GET','POST'],'/checkout','ProductsController@checkout');
        //Get Delivery Address
        Route::post('get-delivery-address','AddressController@getDeliveryAddress');
        //Save Delivery Address
        Route::post('save-delivery-address','AddressController@saveDeliveryAddress');
        //Remove Delivery Address
        Route::post('remove-delivery-address','AddressController@removeDeliveryAddress');
        //Thanks
        Route::get('thanks','ProductsController@thanks');
        //Users Orders
        Route::get('user/orders/{id?}','OrderController@oreders');
        //Paypal
        Route::get('paypal','paypalController@paypal');

    });



    //User Login
    Route::post('/user/login','UserController@userLogin');
    //User Forgot Password
    Route::match(['get','post'],'user/forgot-password','UserController@forgotPassword');
    //User logout
    Route::get('user/logout','UserController@userLogout');
    //Confirm User Account
    Route::get('/user/confirm/{code}','UserController@confirmAccount');

});



