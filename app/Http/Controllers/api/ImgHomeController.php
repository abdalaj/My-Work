<?php

namespace App\Http\Controllers\api;

use App\imgHome;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ImgHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=imghome::all();
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
     * @param  \App\imgHome  $imgHome
     * @return \Illuminate\Http\Response
     */
    public function show(imgHome $imgHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\imgHome  $imgHome
     * @return \Illuminate\Http\Response
     */
    public function edit(imgHome $imgHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\imgHome  $imgHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imgHome $imgHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\imgHome  $imgHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(imgHome $imgHome)
    {
        //
    }
}
