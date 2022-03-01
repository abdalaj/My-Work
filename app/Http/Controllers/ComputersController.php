<?php

namespace App\Http\Controllers;

use App\computers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class computersController extends Controller
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
            $data=computers::orderByDesc('id')->paginate(250);
        return view('computers.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\computers  $computers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = computers::where('id',$id)->get();
        return view('computers.item',compact('data'));
    }


}
