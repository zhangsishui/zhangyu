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
    return view('welcome');
});

//主后台路由
Route::domain('admin.baolemei.com')->namespace('Admin')->group(function () {
    //商铺分类
    Route::get('shop_category/index','ShopCategoryController@index')->name("shop_category.index");
    Route::any('shop_category/add','ShopCategoryController@add')->name("shop_category.add");
    Route::any('shop_category/edit/{id}','ShopCategoryController@edit')->name("shop_category.edit");
    Route::get('shop_category/del/{id}','ShopCategoryController@del')->name("shop_category.del");
    //店铺
    Route::get('shop/index','ShopController@index')->name("shop.index");
    Route::any('shop/reg','ShopController@reg')->name("shop.reg");
    Route::any('shop/add','ShopController@add')->name("shop.add");
    Route::any('shop/edit/{id}','ShopController@edit')->name("shop.edit");
    Route::get('shop/del/{id}','ShopController@del')->name("shop.del");
    Route::get('shop/reset/{id}','ShopController@reset')->name("shop.reset");
    Route::get('shop/change_status/{id}','ShopController@change_status')->name("shop.change_status");
    Route::get('shop/change/{id}','ShopController@change')->name("shop.change");
    //管理员
    Route::get('admin/index','AdminController@index')->name("admin.index");
    Route::any('admin/add','AdminController@add')->name("admin.add");
    Route::any('admin/edit/{id}','AdminController@edit')->name("admin.edit");
    Route::any('admin/del/{id}','AdminController@del')->name("admin.del");
    Route::any('admin/changePwd/{id}','AdminController@changePwd')->name("admin.changePwd");
    Route::any('admin/login','AdminController@login')->name("admin.login");
    Route::any('admin/logout','AdminController@logout')->name("admin.logout");
});

//商户路由
Route::domain('shop.baolemei.com')->namespace('Shop')->group(function () {
    //商铺
    Route::get('user/index','UserController@index')->name("user.index");
    Route::any('user/login','UserController@login')->name("user.login");
    Route::any('user/logout','UserController@logout')->name("user.logout");
    Route::any('user/changePwd/{id}','UserController@changePwd')->name("user.changePwd");
    //菜品分类
    Route::get('menuCategory/index','MenuCategoryController@index')->name("menuCategory.index");
    Route::any('menuCategory/add','MenuCategoryController@add')->name("menuCategory.add");
    Route::any('menuCategory/edit/{id}','MenuCategoryController@edit')->name("menuCategory.edit");
    Route::any('menuCategory/del/{id}','MenuCategoryController@del')->name("menuCategory.del");
    Route::any('menuCategory/default/{id}','MenuCategoryController@default')->name("menuCategory.default");
    //菜品
    Route::get('menu/index','MenuController@index')->name("menu.index");
    Route::any('menu/add','MenuController@add')->name("menu.add");
    Route::any('menu/edit/{id}','MenuController@edit')->name("menu.edit");
    Route::any('menu/del/{id}','MenuController@del')->name("menu.del");
    //test
    Route::any('test/test','MenuController@test')->name("test.test");

});


