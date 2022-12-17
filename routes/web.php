<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
  
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
  
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [DashboardController::class, 'index']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function() {
    // Route::get('roles/{id}', 'RoleController@manage');
    Route::get('roles/{id?}', [RoleController::class, 'index'])->name('roles.index');
    Route::post('manage', [RoleController::class, 'manage'])->name('roles.manage');
    Route::resource('users', UserController::class);
    Route::get('affiliate', [DashboardController::class, 'affiliate'])->name('affiliate'); 
    // Route::resource('products', ProductController::class);
});