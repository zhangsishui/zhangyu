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
});

//商户路由
Route::domain('shop.baolemei.com')->namespace('Shop')->group(function () {
    //商铺
    Route::get('shop/index','ShopController@index')->name("shop.index");
    Route::any('shop/add','ShopCategoryController@add')->name("shop.add");
    Route::any('shop/edit/{id}','ShopCategoryController@edit')->name("shop.edit");
    Route::get('shop/del/{id}','ShopCategoryController@del')->name("shop.del");
});


