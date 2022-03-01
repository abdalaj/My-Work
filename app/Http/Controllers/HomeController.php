<?php

namespace App\Http\Controllers;

use App\accessories;
use App\beauty;
use App\books;
use App\clothes;
use App\computers;
use App\electronics;
use App\foods;
use App\mobiles;
use App\orderes;
use App\orderexpenses;
use App\orderfood;
use App\orders;
use App\prushes;
use App\shoes;
use App\toys;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $prushes=prushes::where('date',date('y-m-d'))->sum('amount');

        $siles=orders::where('date',date('y-m-d'))->sum('fully');
        $siles2=orderfood::where('date',date('y-m-d'))->sum('price');
        $siles3=$siles+$siles2;

        $orderexpenses=orderexpenses::where('date',date('y-m-d'))->sum('price');

        return view('home',compact('prushes','siles3','siles','siles2','orderexpenses'));
    }
    public function red()
    {
        return view('auth.login');
    }
}
