<?php

namespace App\Http\Controllers\api;

use App\sliderimg;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class sliderimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=sliderimg::all();
        return $data;
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
     * @param  \App\sliderimg  $sliderimg
     * @return \Illuminate\Http\Response
     */
    public function show(sliderimg $sliderimg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sliderimg  $sliderimg
     * @return \Illuminate\Http\Response
     */
    public function edit(sliderimg $sliderimg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sliderimg  $sliderimg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sliderimg $sliderimg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sliderimg  $sliderimg
     * @return \Illuminate\Http\Response
     */
    public function destroy(sliderimg $sliderimg)
    {
        //
    }
}
