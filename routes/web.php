<?php

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
Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'app.admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/media-center', [App\Http\Controllers\Admin\MediaCenterController::class, 'index'])->name('media-center');
    Route::resource('user', 'App\Http\Controllers\Admin\UserController');

    // Role Routes
    Route::get('role/trash', ['as' => 'role.trash', 'uses' => 'App\Http\Controllers\Admin\RoleController@trash']);
    Route::get('role/{role}/restore', ['as' => 'role.restore', 'uses' => 'App\Http\Controllers\Admin\RoleController@restore']);
    Route::delete('role/{role}/delete', ['as' => 'role.delete', 'uses' => 'App\Http\Controllers\Admin\RoleController@delete']);
    Route::resource('role', 'App\Http\Controllers\Admin\RoleController');

    // Permission Routes
    Route::get('permission/trash', ['as' => 'permission.trash', 'uses' => 'App\Http\Controllers\Admin\PermissionController@trash']);
    Route::get('permission/{permission}/restore', ['as' => 'permission.restore', 'uses' => 'App\Http\Controllers\Admin\PermissionController@restore']);
    Route::delete('permission/{permission}/delete', ['as' => 'permission.delete', 'uses' => 'App\Http\Controllers\Admin\PermissionController@delete']);
    Route::resource('permission', 'App\Http\Controllers\Admin\PermissionController');
});

