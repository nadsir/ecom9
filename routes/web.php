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
        //change password
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        //check password
        Route::post('checkpassword','AdminController@checkPassword');
    });

});

require __DIR__.'/auth.php';


