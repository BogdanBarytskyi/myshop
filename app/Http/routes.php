<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function () {

    Route::get('/','HomeController@index');

    Route::get('/seach/', function () {
        return view('seach');
    });

    Route::get('/catalog/', function () {
        return view('catalog');
    });


    // public router
    Route::get('/product/','ProductController@index');
    Route::get('/product/{slug}/','ProductController@detail');
    Route::get('/cart/','CartController@index');
    Route::get('/cart/{product_id}/{quantity}/','CartController@addToCart');

    Route::get('/cart_delate/{cart_id}/','CartController@delate');
   // Route::get('/cart/{cart_id}/{quantity}','CartController@update');
    Route::get('/seach/','SeachController@index');
    Route::get('/category/{id}/','ProductController@category');


});



// admin router
Route::resource('/admin/category','CategoryController');
Route::resource('/admin/product','AdminProductController');
Route::resource('/admin/order','OrderController');