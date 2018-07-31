<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    // Controllers Within The "App\Http\Controllers\Api" Namespace
    Route::get('shop/list','ShopController@list');
    Route::get('shop/index','ShopController@index');
    Route::post('member/reg','MemberController@reg');
    Route::any('member/sms','MemberController@sms');
    Route::post('member/loginCheck','MemberController@loginCheck');
    Route::any('member/changePassword','MemberController@changePassword');
    Route::any('member/forgetPassword','MemberController@forgetPassword');
    Route::any('member/detail','MemberController@detail');
    Route::any('address/createAddress','AddressController@createAddress');
    Route::get('address/list','AddressController@list');
    Route::get('address/back','AddressController@back');
    Route::any('address/edit','AddressController@edit');
    Route::post('cart/addCart','CartController@addCart');
    Route::get('cart/list','CartController@list');
    Route::any('order/add','OrderController@add');
    Route::get('order/order','OrderController@order');
    Route::any('order/pay','OrderController@pay');
    Route::any('order/list','OrderController@list');

});
