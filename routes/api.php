<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test',function(){
    dd(\request()->lang);
});


Route::group(['namespace' => 'API'], function () {
    Route::post('auth/login','UserController@login');//
    Route::post('auth/register','UserController@register');//
    Route::post('auth/password/forget','UserController@forgetPassword');//
    Route::post('auth/password/reset','UserController@checkPassword');//
    Route::post('auth/activate','UserController@activateUser');//
    Route::get('countries','CountryController@index');//
    Route::get('country/{id}/cities','CountryController@cities');//
    Route::get('city/{id}/regions','CityController@regions');//
    Route::get('blood_types','BloodTypeController@index');//
    Route::get('advertisements','AdvertisementController@index');//
    Route::get('sliders','SliderController@index');//

    Route::group(['middleware' => ['auth:sanctum']],function ()
    {
        Route::put('users/profile','UserController@updateProfile');//
        Route::get('users/advertisements','UserController@advertisements');//
        Route::get('users/{id}','UserController@show');//
        Route::get('users/products/favorite','UserController@productFavorite');//
        Route::get('users/advertisements/favorite','UserController@advertisementFavorite');//
        Route::post('users/firebase/updateToken','UserController@updateFirebaseToken');//
        Route::get('categories','CategoryController@index');//
        Route::get('categories/{id}/subcategories','CategoryController@subcategories');//
        Route::get('products','ProductController@index');//
        Route::get('products/{id}/favorite','ProductController@toggleFavorite');//
        Route::get('orders/{id}','OrderController@show');//
        Route::post('orders','OrderController@store');//
        Route::put('orders/{id}','OrderController@update');//
        Route::delete('orders/{id}','OrderController@destroy');//
        Route::post('advertisements','AdvertisementController@store');//
        Route::put('advertisements/{id}','AdvertisementController@update');//
        Route::delete('advertisements/{id}','AdvertisementController@destroy');//
        Route::get('advertisements/{id}/favorite','AdvertisementController@toggleFavorite');//
        Route::post('reports','ReportController@store');//
        Route::get('plans','PlanController@index');//

    });
});
