<?php

namespace App\Http\Controllers;

use App\recover;
use Illuminate\Http\Request;

class RecoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = recover::all();
        return view('with.recover',compact('data'));
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
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function show(recover $recover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function edit(recover $recover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recover $recover)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function destroy(recover $recover)
    {
        //
    }
}
