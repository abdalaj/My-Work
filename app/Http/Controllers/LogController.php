<?php

namespace App\Http\Controllers;

use App\log;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = log::orderby('id','DESC')->get();
        $supplier = supplier::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('logs.index',compact('data','supplier','roles'));
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
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(log $log)
    {
        //
    }
}
