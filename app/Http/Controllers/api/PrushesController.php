<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\prushes;
use Illuminate\Http\Request;

class PrushesController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = prushes::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name'=>$request->name,
        ];
        prushes::create($input);
        return redirect('prushes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = prushes::where('id',$id)->get();
        return $data;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = prushes::where('id',$id)->get();
        return view('prushes.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $olddata=prushes::find($id);
        $olddata->name=$request->name;
        $olddata->save();
        return redirect("prushes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        prushes::findOrFail($id)->delete();
        return redirect('prushes');
    }
}
