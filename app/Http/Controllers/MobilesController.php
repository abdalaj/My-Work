<?php

namespace App\Http\Controllers;

use App\mobiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class mobilesController extends Controller
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
         $data=mobiles::orderByDesc('id')->paginate(250);
        return view('mobiles.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mobiles  $mobiles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = mobiles::where('id',$id)->get();
        return view('mobiles.item',compact('data'));
    }


}
