<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ProductControll;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/Product-Details/{id}', [HomeController::class, 'ProductDetails'])->name('show');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/login', [UserController::class, 'loginuser'])->name('loginuser');
    Route::post('/login', [UserController::class, 'loginusereque'])->name('loginusereque');
    Route::get('/register', [UserController::class, 'registeruser'])->name('registeruser');
    Route::post('/register', [UserController::class, 'storeuser'])->name('storeuser');
    Route::post('/Liking-Product/{Product_id}', [LikesController::class, 'LikeProduct'])->name('likes')->middleware('AuthUser');
    Route::post('/logout',[UserController::class,'logoutuser'])->name('logoutuser')->middleware('AuthUser');
});

Route::name('admin.')->prefix('wp-admin')->group(function() {
    Route::get('/login',[AdminController::class,'loginAdmin'])->name('loginAdmin');
    Route::post('/login',[AdminController::class,'loginAdminRequ'])->name('loginAdminRequ');
    Route::middleware('AuthAdmin')->group(function() {
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/category',[ProductController::class,'category'])->name('category');
        Route::post('/category',[ProductController::class,'categoryreq'])->name('categoryreq');
        Route::post('/category/{id}',[ProductController::class,'categorydestroy'])->name('categorydestroy');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/create',[ProductController::class,'createreq'])->name('createreq');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('/edit/{id}',[ProductController::class,'editreq'])->name('editreq');
        Route::post('/delete/{id}',[ProductController::class,'deletereq'])->name('deletereq');
        Route::post('/logout',[AdminController::class,'logoutAdmin'])->name('logoutAdmin');
        // Route::get('/show-users',[AdminController::class,'listusers'])->name('listusers');
        // Route::get('/messages-center',[AdminController::class,'listcontact'])->name('listcontact');
        // route::get('/show-message/{id}', [AdminController::class, 'showmessage'])->name('showmessage');
        // route::post('/delete/{id}',[AdminController::class,'destroymessage'])->name('destroymessage');
    });
});


