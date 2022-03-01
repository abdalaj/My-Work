<?php

use App\orderes;
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

Route::resource('/', 'ImgHomeController');


Route::resource('/home', 'ImgHomeController');


//Social
Route::resource('/social','SocialController');

//About
Route::resource('/about','AboutController');

//Contact
Route::resource('/contact','ContactController');

//Sill
Route::resource('/sill','SillController');

//Privat
Route::resource('/private','PrivatController');

//Recover
Route::resource('/recover','RecoverController');

//Accessories

Route::resource('/accessories','AccessoriesController');

//Beauty

Route::resource('/beauty','BeautyController');

//Books

Route::resource('/books','BooksController');

//clothes

Route::resource('/clothes','ClothesController');

//Computers

Route::resource('/computers','ComputersController');

//Electronics

Route::resource('/electronics','ElectronicsController');

//Foods

Route::resource('/foods','FoodsController');

//Mobiles

Route::resource('/mobiles','MobilesController');

//Shoes


Route::resource('/shoes','ShoesController');

//Toys
Route::resource('/toys','ToysController' );

//Cars
Route::resource('/car','CarController' );

//Order
Route::resource('/order', 'OrderesController');



