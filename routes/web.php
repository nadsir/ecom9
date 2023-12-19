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
    return view('welcome2');
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

    });

});


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

});
require __DIR__.'/auth.php';


