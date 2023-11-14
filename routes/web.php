<?php

use App\Http\Controllers\ProfileController;
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
        //

    });

});

require __DIR__.'/auth.php';


