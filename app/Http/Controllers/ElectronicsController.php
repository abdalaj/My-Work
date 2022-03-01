<?php

namespace App\Http\Controllers;

use App\electronics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class electronicsController extends Controller
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
            $data=electronics::orderByDesc('id')->paginate(250);
        return view('electronics.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\electronics  $electronics
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = electronics::where('id',$id)->get();
        return view('electronics.item',compact('data'));
    }


}
