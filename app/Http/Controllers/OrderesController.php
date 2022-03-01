<?php

namespace App\Http\Controllers;
use App\orderes;
use Illuminate\Http\Request;
use SweetAlert;
class OrderesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input=[
            'id'=>$request->id,
            'name'=>$request->name,
            'many'=>$request->many,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'carya'=>$request->carya,
            'describ'=>$request->describ,
            'details'=>$request->details,
            'price'=>$request->price,
            'user_item_id'=>$request->user_item_id,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->updated_at
        ];
        orderes::create($input);
        session()->put('sender',true);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function show(orderes $orderes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function edit(orderes $orderes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderes $orderes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderes $orderes)
    {
        //
    }
}
