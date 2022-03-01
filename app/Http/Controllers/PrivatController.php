<?php

namespace App\Http\Controllers;

use App\privat;
use Illuminate\Http\Request;

class PrivatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = privat::all();
        return view('with.private',compact('data'));
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
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function show(privat $privat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function edit(privat $privat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, privat $privat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function destroy(privat $privat)
    {
        //
    }
}
