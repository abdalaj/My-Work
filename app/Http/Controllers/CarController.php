<?php

namespace App\Http\Controllers;

use App\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class carController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data=car::orderByDesc('id')->paginate(250);
        return view('car.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = car::where('id',$id)->get();
        return view('car.item',compact('data'));
    }


}
