<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\LoginController;
use App\Http\Controllers\Backoffice\LogoutController;
use App\Http\Controllers\ProductosShoppingController;
use App\Http\Controllers\Backoffice\RegisterController;
use App\Http\Controllers\Backoffice\DashboardController;

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
Route::get('/', function () {
    return view('backoffice.auth.login');
});
Route::post('login',[LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.' , 'middleware' => 'ValidarPermisos' ], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('index', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('index', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::get('show/{role}', [RoleController::class, 'show'])->name('show');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit');
        Route::put('update/{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('destroy/{role}', [RoleController::class, 'destroy'])->name('destroy');
        Route::get('changeStatus/{role}', [RoleController::class,'changeStatus'])->name('changeStatus');
    });
    Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
        Route::get('index', [PermissionController::class, 'index'])->name('index');
        Route::get('create', [PermissionController::class, 'create'])->name('create');
        Route::get('show/{permission}', [PermissionController::class, 'show'])->name('show');
        Route::post('store', [PermissionController::class, 'store'])->name('store');
        Route::get('edit/{permission}', [PermissionController::class, 'edit'])->name('edit');
        Route::put('update/{permission}e', [PermissionController::class, 'update'])->name('update');
        Route::delete('destroy/{permission}', [PermissionController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'provider', 'as' => 'provider.'], function () {
        Route::get('index', [ProviderController::class, 'index'])->name('index');
        Route::get('create', [ProviderController::class, 'create'])->name('create');
        Route::get('show/{provider}', [ProviderController::class, 'show'])->name('show');
        Route::post('store', [ProviderController::class, 'store'])->name('store');
        Route::get('edit/{provider}', [ProviderController::class, 'edit'])->name('edit');
        Route::put('update/{provider}', [ProviderController::class, 'update'])->name('update');
        Route::delete('destroy/{provider}', [ProviderController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'calendar', 'as' => 'calendar.'], function () {
        Route::get('index', [CalendarController::class, 'index'])->name('index');
        Route::post('show', [CalendarController::class, 'show'])->name('show');
        Route::post('create', [CalendarController::class, 'create'])->name('create');
        Route::post('display/{id}', [CalendarController::class, 'display'])->name('display');
        Route::post('destroy/{id}', [CalendarController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('changeStatus/{product}', [ProductController::class,'changeStatus'])->name('changeStatus');
    });

    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::get('index', [ServiceController::class, 'index'])->name('index');
        Route::get('create', [ServiceController::class, 'create'])->name('create');
        Route::get('show/{product}', [ServiceController::class, 'show'])->name('show');
        Route::post('store', [ServiceController::class, 'store'])->name('store');
        Route::get('edit/{product}', [ServiceController::class, 'edit'])->name('edit');
        Route::put('update/{product}', [ServiceController::class, 'update'])->name('update');
        Route::delete('destroy/{product}', [ServiceController::class, 'destroy'])->name('destroy');
        Route::get('changeStatus/{product}', [ServiceController::class,'changeStatus'])->name('changeStatus');
    });

    Route::group(['prefix' => 'shopping', 'as' => 'shopping.'], function () {
        Route::get('index', [ShoppingController::class, 'index'])->name('index');
        Route::get('create', [ShoppingController::class, 'create'])->name('create');
        Route::get('show/{shopping}', [ShoppingController::class, 'show'])->name('show');
        Route::post('store', [ShoppingController::class, 'store'])->name('store');
        Route::get('edit/{shopping}', [ShoppingController::class, 'edit'])->name('edit');
        Route::put('update/{shopping}', [ShoppingController::class, 'update'])->name('update');
        Route::delete('destroy/{shopping}', [ShoppingController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'application', 'as' => 'application.'], function () {
        Route::get('index', [ApplicationController::class, 'index'])->name('index');
        Route::get('create', [ApplicationController::class, 'create'])->name('create');
        Route::get('show/{application}', [ApplicationController::class, 'show'])->name('show');
        Route::post('store', [ApplicationController::class, 'store'])->name('store');
        Route::get('edit/{application}', [ApplicationController::class, 'edit'])->name('edit');
        Route::put('update/{application}', [ApplicationController::class, 'update'])->name('update');
        Route::delete('destroy/{application}', [ApplicationController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'detailsproductshoppings', 'as' => 'detailsproductshoppings.'], function () {
        Route::get('index', [ProductosShoppingController::class, 'index'])->name('index');
        Route::get('create', [ProductosShoppingController::class, 'create'])->name('create');
    });
});

