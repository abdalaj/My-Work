<?php

namespace App\Http\Controllers;

use App\sill;
use Illuminate\Http\Request;

class SillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = sill::all();
        return view('with.sill',compact('data'));
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
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function show(sill $sill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function edit(sill $sill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sill $sill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function destroy(sill $sill)
    {
        //
    }
}
