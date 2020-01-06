<?php

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
    //return ['city'=>'changsha'];
    return view('welcome');
});

//前台路由组
Route::group(['namespace' => 'Home'], function(){
    // 控制器在 "App\Http\Controllers\Home" 命名空间下
    Route::get('/a', 'IndexController@index');
});

//后台路由组
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    Route::get('/b', 'AdminController@index');
});

// 或者用另外一种写法：
Route::namespace('Admin')->prefix('admin')->group(function() {
    // App\Http\Controllers\Admin\AdminController
    Route::get('/c', 'AdminController@index');
});

