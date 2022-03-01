<?php

namespace App\Http\Controllers;

use App\accessories;


class AccessoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=accessories::orderByDesc('id')->paginate(250);
        return view('accessories.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = accessories::where('id',$id)->get();
        return view('accessories.item',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\accessories  $accessories
     * @return \Illuminate\Http\Response
     */



}
