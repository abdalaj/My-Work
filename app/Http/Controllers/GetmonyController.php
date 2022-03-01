<?php

namespace App\Http\Controllers;

use App\getmony;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetmonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = getmony::orderBy('id','desc')->get();
        $supplier = supplier::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.getmony',compact('data','supplier','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\getmony  $getmony
     * @return \Illuminate\Http\Response
     */
    public function show(getmony $getmony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\getmony  $getmony
     * @return \Illuminate\Http\Response
     */
    public function edit(getmony $getmony)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\getmony  $getmony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, getmony $getmony)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\getmony  $getmony
     * @return \Illuminate\Http\Response
     */
    public function destroy(getmony $getmony)
    {
        //
    }
}
