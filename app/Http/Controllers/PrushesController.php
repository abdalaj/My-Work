<?php

namespace App\Http\Controllers;

use App\foods;
use App\prushes;
use Illuminate\Http\Request;

class PrushesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = prushes::orderByDesc('id')->get();
        return view('prushes.index',compact('data'));
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
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty_prush,
            'date'=>date('y-m-d')
        ];
        prushes::create($input);

        $olddata=foods::find($request->id);
        $olddata->qty=$request->qty;
        $olddata->old_qty=$request->qty;
        // $olddata->qty_prush=$request->qty_prush;
        $olddata->save();

        return redirect("foods");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function show(prushes $prushes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function edit(prushes $prushes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $olddata=foods::find($id);
        $olddata->qty=$request->qty;
        // $olddata->old_qty=$request->qty;
        // $olddata->qty_prush=$request->qty_prush;
        $olddata->save();

        return redirect("foods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        prushes::findOrFail($id)->delete();
        return redirect('prushes');

    }
}
