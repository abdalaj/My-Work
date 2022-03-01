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
        $this->middleware('powers');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=User::count();
        $data1=accessories::count();
        $data2=beauty::count();
        $data3=toys::count();
        $data4=books::count();
        $data5=foods::count();
        $data6=electronics::count();
        $data7=computers::count();
        $data8=clothes::count();
        $data9=shoes::count();
        $data10=mobiles::count();
        $order=orderes::count();

        return view('home',compact('data','data1','data2','data3','data4','data5','data6','data7','data8','data9','data10','order'));
    }
    public function red()
    {
        return view('auth.login');
    }
}
