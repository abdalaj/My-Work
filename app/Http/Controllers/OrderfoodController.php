<?php

namespace App\Http\Controllers;

use App\orderfood;
use Illuminate\Http\Request;

class OrderfoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = orderfood::orderByDesc('id')->get();
        return view('orderfood.index',compact('data'));
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

           try {
            for ($i=0; $i < count($request->name); $i++) {
                $input[$i]=[
                    'name'=>$request->name[$i],
                    'price'=>$request->price[$i],
                    'order_id'=>$request->ord_id,
                    'unique'=>$request->unique,
                    'qty'=>$request->qty[$i],
                    'date'=>date('y-m-d')
                ];
                orderfood::create($input[$i]);
            }
            return redirect('orderfood');
           } catch (\Throwable $th) {
               return redirect()->refresh();
           }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderfood  $orderfood
     * @return \Illuminate\Http\Response
     */
    public function show(orderfood $orderfood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderfood  $orderfood
     * @return \Illuminate\Http\Response
     */
    public function edit(orderfood $orderfood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderfood  $orderfood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderfood $orderfood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderfood  $orderfood
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        orderfood::findOrFail($id)->delete();
        return redirect('orderfood');
    }
}
