<?php

namespace App\Http\Controllers;

use App\Product;
use App\serial;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serial = Product::with(['serial'])->get();
        // return $serial;
        return view('serial.index',compact('serial'));
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
     * @param  \App\serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show(serial $serial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit(serial $serial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, serial $serial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy(serial $serial)
    {
        //
    }
}
