<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccountcategoriesController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/users', [UserController::class, 'showusers']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get("/user/view",[UserController::class, 'viewuser']);
    Route::get("/user/edit",[UserController::class, 'displayedituser']);
    Route::post("/user/edit",[UserController::class, 'edituser']);
    Route::get("/user/delete",[UserController::class, 'deleteuser']);
    Route::get("/user/add",[UserController::class, 'goadduser']);
    Route::post("/user/add",[UserController::class, 'adduser']);

    Route::get("/account/category",[AccountcategoriesController::class, 'goaccountcategory']);
    Route::get("/account/category/add",[AccountcategoriesController::class, 'goaddaccountcategory']);
    Route::post("/account/category/add",[AccountcategoriesController::class, 'addaccountcategory']);
    Route::get("/account/category/edit",[AccountcategoriesController::class, 'goeditaccountcategory']);
    Route::post("/account/category/edit",[AccountcategoriesController::class, 'editaccountcategory']);
    Route::get("/account/category/delete",[AccountcategoriesController::class, 'deleteaccountcategory']);
    Route::get("/account/category/view",[AccountcategoriesController::class, 'viewaccountcategory']);

    Route::get("/account",[AccountsController::class, 'goaccount']);
    Route::get("/account/add",[AccountsController::class, 'goaddaccount']);
    Route::post("/account/add",[AccountsController::class, 'addaccount']);
    Route::get("/account/view",[AccountsController::class, 'goviewaccount']);
    Route::get("/account/edit",[AccountsController::class, 'goeditaccount']);
    Route::post("/account/edit",[AccountsController::class, 'editaccount']);
    Route::get("/account/delete",[AccountsController::class,'deleteaccount']);
});
