<?php

namespace App\Http\Controllers;

use App\beauty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class beautyController extends Controller
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
        $data=beauty::orderByDesc('id')->paginate(250);
        return view('beauty.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\beauty  $beauty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = beauty::where('id',$id)->get();
        return view('beauty.item',compact('data'));
    }


}
