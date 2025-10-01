<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\authentication\Login;
use App\Http\Controllers\pages\AddCategory;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['sessionProtection'])->group(function(){
    // Dashboard route
    Route::get('system-dashboard',[Dashboard::class, 'dashboard'])->name('system-dashboard');

    // pages
    Route::get('category-addition',[AddCategory::class , 'addCatg'])->name('category');
    Route::post('store-catg',[AddCategory::class,'storeCatg'])->name('storecategory');
    Route::post('status-update',[AddCategory::class,'statusupdate'])->name('statusupdate');
    Route::post('delete-category',[AddCategory::class,'deletecatg'])->name('dlt-ctg');
    Route::get('edit-page/{num}',[AddCategory::class,'loadeditpage'])->name('editpage');
    Route::post('category-update',[AddCategory::class,'updateCatg'])->name('update-catg');

    // Logout 
    Route::get('logout',[Login::class, 'logout'])->name('logout');

});
// authentication route
Route::get('dashboard-log',[Login::class, 'login'])->name('dashboard-log');
Route::post('auth-check',[Login::class, 'authCheck'])->name('auth-check');