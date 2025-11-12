<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\authentication\Login;
use App\Http\Controllers\authentication\UserController;
use App\Http\Controllers\pages\AddCategory;
use App\Http\Controllers\pages\ChairParts;
use App\Http\Controllers\pages\BlogController;
use App\Http\Controllers\services\ServicesController;
use Illuminate\Support\Facades\Mail;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['sessionProtection'])->group(function(){
    // Dashboard route
    Route::get('system-dashboard',[Dashboard::class, 'dashboard'])->name('system-dashboard');

    // CATEGORY ROUTE
    Route::get('category-addition',[AddCategory::class , 'addCatg'])->name('category');
    Route::post('store-catg',[AddCategory::class,'storeCatg'])->name('storecategory');
    Route::post('status-update',[AddCategory::class,'statusupdate'])->name('statusupdate');
    Route::post('delete-category',[AddCategory::class,'deletecatg'])->name('dlt-ctg');
    Route::get('edit-page/{num}',[AddCategory::class,'loadeditpage'])->name('editpage');
    Route::post('category-update',[AddCategory::class,'updateCatg'])->name('update-catg');

    // CHAIR ROUTE
    Route::get('chair-parts',[ChairParts::class,'chair_part'])->name('chair-ui');
    Route::post('addchairparts',[ChairParts::class,'addchairparts'])->name('addchair');
    Route::get('edit-chair-parts/{num}',[ChairParts::class , 'editChairParts'])->name('edit-chair');
    Route::post('update-chair-parts',[ChairParts::class , 'updateData'])->name('update-parts');
    Route::post('status-change',[ChairParts::class , 'statusChange'])->name('change-parts-status');
    Route::post('delete-chair-data',[ChairParts::class , 'deleteChairParts'])->name('delete-parts');

    // BLOGS ROUTE
    Route::get('blog',[BlogController::class , 'load_vlog'])->name('blog');
    Route::get('addblog',[BlogController::class , 'addBlog'])->name('addblog');
    Route::get('edit-blog-page/{num}',[BlogController::class, 'edit_blog'])->name('edit-blog-page');
    Route::post('add-blog',[BlogController::class,'add_blog'])->name('add_vlog');
    Route::post('update_blog',[BlogController::class,'update_blog'])->name('update_blog');
    Route::post('delete_blog',[BlogController::class,'deleteBlog'])->name('delete_blog');
    Route::post('blog_status-change',[BlogController::class,'status_chnage'])->name('statuschange');

    // SERVICES ROUTE
    Route::controller(ServicesController::class)->group(function(){
        Route::get('service', 'loadservices')->name('loadservice');
        Route::get('load-service','loadaddservice')->name('addservice');
        Route::post('add-service','addservices')->name('add-services');
    });
    
    // USER ROUTE
    Route::controller(UserController::class)->group(function(){
        Route::get('activeuser','activeusers')->name('active-users');
        Route::get('inactiveuser','inactiveusers')->name('in-active-users');
        Route::get('rejectrd-user','rejectedusers')->name('rejected-users');
        Route::get('add-users','loadaddusers')->name('addusers');
        Route::post('add-users','addusers')->name('adduser');
        Route::post('changeusertype','updateusertype')->name('changeuser');
        Route::post('updatestatus','statusupdate')->name('update-status');
        Route::get('userprofile','userProfile')->name('user-profile');
        // accept and reject controller
        Route::get('accept-users/{num}','acceptuser')->name('accept-user');
        Route::get('reject-users/{num}','rejectuser')->name('reject-user');
        Route::get('deactivate-account/{num}','deactivated')->name('account-deactivate');
        Route::get('activate-account/{num}','activated')->name('account-activate');
    });

    Route::get('dummy',[BlogController::class,'dummy'])->name('dmg');
    Route::post('dummypage',[BlogController::class,'dummypg'])->name('dmpg');
    // helper testing ==========
    Route::get('helper_data',[BlogController::class,'helper_data'])->name('helper_data');

    // LOGOUT ROUTE ========
    Route::get('logout',[Login::class, 'logout'])->name('logout');

});
// authentication route
Route::get('dashboard-log',[Login::class, 'login'])->name('dashboard-log');
Route::post('auth-check',[Login::class, 'authCheck'])->name('auth-check');