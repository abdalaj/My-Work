<?php

use App\orderes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@red');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//imghome
Route::get('homeimg/create','ImgHomeController@create' );

Route::resource('/homeimg','ImgHomeController');

//sliderimg
Route::get('sliderimg/create','SliderimgController@create' );

Route::resource('/sliderimg','SliderimgController');

//Social
Route::resource('/social','SocialController');

//About
Route::resource('/about','AboutController');

//Contact
Route::resource('/contact','ContactController');

//Sill
Route::resource('/sill','SillController');

//Privat
Route::resource('/privat','PrivatController');

//Recover
Route::resource('/recover','RecoverController');

//Accessories
Route::get('accessorie/create','AccessoriesController@create' );

Route::get('accessorie/edit','AccessoriesController@edit' );

Route::resource('/accessories','AccessoriesController');

//Beauty
Route::get('beaut/create','BeautyController@create' );

Route::get('beaut/edit','BeautyController@edit' );

Route::resource('/beauty','BeautyController');

//Books
Route::get('books/create','BooksController@create' );

Route::get('books/edit','BooksController@edit' );

Route::resource('/books','BooksController');

//clothes
Route::get('clothe/create','ClothesController@create' );

Route::get('clothe/edit','ClothesController@edit' );

Route::resource('/clothes','ClothesController');

//Computers
Route::get('computer/create','ComputersController@create' );

Route::get('computer/edit','ComputersController@edit' );

Route::resource('/computers','ComputersController');

//Electronics
Route::get('electronic/create','ElectronicsController@create' );

Route::get('electronic/edit','ElectronicsController@edit' );

Route::resource('/electronics','ElectronicsController');

//Foods
Route::get('food/create','FoodsController@create' );

Route::get('food/edit','FoodsController@edit' );

Route::resource('/foods','FoodsController');

//Mobiles
Route::get('mobile/create','MobilesController@create' );

Route::get('mobile/edit','MobilesController@edit' );

Route::resource('/mobiles','MobilesController');

//Shoes
Route::get('shoe/create','ShoesController@create' );

Route::get('shoe/edit','ShoesController@edit' );

Route::resource('/shoes','ShoesController');

//Toys
Route::get('toy/create','ToysController@create' );

Route::get('toy/edit','ToysController@edit' );

Route::resource('/toys','ToysController');

//Cars
Route::get('car/create','CarController@create' );

Route::get('car/edit','CarController@edit' );

Route::resource('/car','CarController');

//Orders
Route::resource('/orders','OrderesController');

Route::resource('/users','UserController');

Route::get('user/create','UserController@create' );

Route::get('user/edit','UserController@edit' );

Route::get('/activate',function(){
    return view('user.activate');
});

Route::get('/printPills/{id}', function($id)
{
    $data = orderes::where('id',$id)->get();
    return view('printPills',compact('data'));
});


