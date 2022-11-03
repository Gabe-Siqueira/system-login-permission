<?php

use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\FileAdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\MenuAdminController;
use App\Http\Controllers\Admin\PermissionAdminController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autentication'])->name('login-autentication');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/sessionexpire', [HomeController::class, 'sessionexpire'])->name('home.sessionexpire');

Route::group(['middleware' => ['front', 'web']], function (){

    // HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // UserAdminController
    Route::get('/user',  [UserAdminController::class, 'index'])->name('user.index');
    Route::get('/user/create',  [UserAdminController::class, 'create'])->name('user.create');
    Route::post('/user',  [UserAdminController::class, 'store'])->name('user.store');
    Route::get('/user/{id}',  [UserAdminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}',  [UserAdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}',  [UserAdminController::class, 'destroy'])->name('user.destroy');

    // MenuAdminController
    Route::get('/menu',  [MenuAdminController::class, 'index'])->name('menu.index');
    Route::get('/menu/create',  [MenuAdminController::class, 'create'])->name('menu.create');
    Route::post('/menu',  [MenuAdminController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}',  [MenuAdminController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}',  [MenuAdminController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}',  [MenuAdminController::class, 'destroy'])->name('menu.destroy');

    // PermissionAdminController
    Route::get('/permission',  [PermissionAdminController::class, 'index'])->name('permission.index');
    Route::get('/permission/create',  [PermissionAdminController::class, 'create'])->name('permission.create');
    Route::post('/permission',  [PermissionAdminController::class, 'store'])->name('permission.store');
    Route::get('/permission/{id}',  [PermissionAdminController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/{id}',  [PermissionAdminController::class, 'update'])->name('permission.update');
    Route::delete('/permission/{id}',  [PermissionAdminController::class, 'destroy'])->name('permission.destroy');

    // CourseAdminController
    Route::get('/course',  [CourseAdminController::class, 'index'])->name('course.index');

    // CategoryAdminController
    Route::get('/category',  [CategoryAdminController::class, 'index'])->name('category.index');

    // FileAdminController
    Route::get('/file',  [FileAdminController::class, 'index'])->name('file.index');

});
