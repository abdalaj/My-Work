<?php

namespace App\Http\Controllers;

use App\clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class clothesController extends Controller
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
        $data=clothes::orderByDesc('id')->paginate(250);
        return view('clothes.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clothes  $clothes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = clothes::where('id',$id)->get();
        return view('clothes.item',compact('data'));
    }


}
