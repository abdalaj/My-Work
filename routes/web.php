<?php

use App\orderes;
use App\orders;
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


//Foods

Route::resource('/foods','FoodsController');

Route::resource('/devices','DevicesController');

Route::resource('/room','RoomController');

Route::resource('/orders','OrdersController');

Route::resource('/timer','TimerController');

Route::resource('/orderfood','OrderfoodController');

Route::resource('/prushes','PrushesController');

Route::resource('/expenses','ExpensesController');

Route::resource('/orderexpenses','OrderexpensesController');

Route::resource('/timedown', 'TimerdownController');
Route::get('/createprushes',function(){
    return view('orderfood.create');
});


Route::get('/print',function(){
    $data =  orders::with(['orderfood'])->get();
    return view('recipt',compact('data'));
});

// Route::resource('/foods','FoodsController');

// Route::get('/printPills/{id}', function($id)
// {
//     $data = orderes::where('id',$id)->get();
//     return view('printPills',compact('data'));
// });


