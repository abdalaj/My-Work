<?php

namespace App\Http\Controllers;

use App\shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class shoesController extends Controller
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
        $data=shoes::orderByDesc('id')->paginate(250);
        return view('shoes.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = shoes::where('id',$id)->get();
        return view('shoes.item',compact('data'));
    }


}
