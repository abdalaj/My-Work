<?php

namespace App\Http\Controllers;

use App\foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class foodsController extends Controller
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
            $data=foods::orderByDesc('id')->paginate(250);
        return view('foods.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = foods::where('id',$id)->get();
        return view('foods.item',compact('data'));
    }


}
