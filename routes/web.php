<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\authentication\Login;
use App\Http\Controllers\pages\AddCategory;
use App\Http\Controllers\pages\ChairParts;
use App\Http\Controllers\pages\BlogController;

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
    Route::post('add-blog',[BlogController::class,'add_blog'])->name('add_vlog');

    // LOGOUT ROUTE 
    Route::get('logout',[Login::class, 'logout'])->name('logout');

});
// authentication route
Route::get('dashboard-log',[Login::class, 'login'])->name('dashboard-log');
Route::post('auth-check',[Login::class, 'authCheck'])->name('auth-check');