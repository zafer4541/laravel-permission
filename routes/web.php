<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class,'show'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('login-post');
Route::middleware(['auth'])->group(function () {
   
    #Role routes
    Route::get('/role', [RoleController::class,'show'])->name('role.show');
    Route::get('/role-fetch', [RoleController::class,'roleFetch'])->name('role.fetch');
    Route::get('/roleEdit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::post('/roleUpdate/{id}', [RoleController::class,'update'])->name('role.update');
    Route::get('/roleCreate', [RoleController::class,'create'])->name('role.create');
    Route::post('/roleStore', [RoleController::class,'store'])->name('role.store');

    #User routes
    Route::get('/user', [UserController::class,'show'])->name('user.show');
    Route::get('/user-fetch', [UserController::class,'userFetch'])->name('user.fetch');
    Route::get('/userEdit/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('/userUpdate/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('/userCreate', [UserController::class,'create'])->name('user.create');
    Route::post('/userStore', [UserController::class,'store'])->name('user.store');
    Route::post('/userDelete', [UserController::class,'delete'])->name('user.delete');

    #Blogs routes
    Route::get('/blog', [BlogController::class,'show'])->name('blog.show');
    Route::get('/blog-fetch', [BlogController::class,'blogFetch'])->name('blog.fetch');
    Route::get('/blogEdit/{id}', [BlogController::class,'edit'])->name('blog.edit');
    Route::post('/blogUpdate/{id}', [BlogController::class,'update'])->name('blog.update');
    Route::get('/blogCreate', [BlogController::class,'create'])->name('blog.create');
    Route::post('/blogStore', [BlogController::class,'store'])->name('blog.store');

});
