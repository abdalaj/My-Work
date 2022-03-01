<?php

namespace App\Http\Controllers;

use App\toys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class toysController extends Controller
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
        $data=toys::orderByDesc('id')->paginate(250);
        return view('toys.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\toys  $toys
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = toys::where('id',$id)->get();
        return view('toys.item',compact('data'));
    }


}
