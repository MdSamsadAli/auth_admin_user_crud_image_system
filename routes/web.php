<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', [LoginController::class, 'loginForm'])->name('auth.login');
Route::post('/', [LoginController::class, 'authenticate'])->name('auth.loginUser');

Route::get('/register', [RegisterController::class, 'registerForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('auth.registerUser');

Route::group(['middleware' => 'auth'], function(){

    Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/create', [DashboardController::class, 'create'])->name('admin.create');
        Route::post('/store', [DashboardController::class, 'store'])->name('admin.store');
        
        Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [DashboardController::class, 'update'])->name('admin.update');

        Route::get('/delete/{id}', [DashboardController::class, 'destroy'])->name('admin.destroy');
        Route::get('/force-delete/{id}', [DashboardController::class, 'forceDelete'])->name('admin.forceDelete');
        Route::get('/restore/{id}', [DashboardController::class, 'restore'])->name('admin.restore');
        
        
        
        Route::get('/all/user', [DashboardController::class, 'show'])->name('admin.all');

        Route::get('/all/user/trash', [DashboardController::class, 'trash'])->name('admin.trash');

        Route::get('/usersedit/{id}/', [DashboardController::class, 'useredit'])->name('admin.useredit');
        Route::post('/userupdate/{id}/', [DashboardController::class, 'userupdate'])->name('admin.userupdate');
        Route::get('/userdelete/{id}/', [DashboardController::class, 'userdelete'])->name('admin.userdelete');
        
    });
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    Route::get('/index', [UserController::class, 'index'])->name('index');

});
