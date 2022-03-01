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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace('api')->group(function(){
    Route::resource('shoes','ShoesController');
    Route::resource('mobiles','MobilesController');
    Route::resource('clothes','ClothesController');
    Route::resource('electronics','ElectronicsController');
    Route::resource('foods','FoodsController');
    Route::resource('computers','ComputersController');
    Route::resource('toys','ToysController');
    Route::resource('beauty','BeautyController');
    Route::resource('accessories','AccessoriesController');
    Route::resource('car','CarController');
    Route::resource('books','BooksController');
    Route::resource('imghome','ImgHomeController');
    Route::resource('sliderimg','SliderimgController');
    Route::resource('orders','OrderesController');
    Route::resource('social','SocialController');
    Route::resource('about','AboutController');
    Route::resource('contact','ContactController');
    Route::resource('privat','PrivatController');
    Route::resource('sill','SillController');
    Route::resource('recover','RecoverController');
});
