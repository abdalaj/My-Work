<?php

namespace App\Http\Controllers;

use App\expenses;
use App\orderexpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderexpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = orderexpenses::orderByDesc('id')->get();
        return view('orderexpenses.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ex = expenses::all();
        return view('orderexpenses.create',compact('exp'));
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
            'date'=>date('y-m-d')
        ];
        orderexpenses::create($input);
        return redirect('orderexpenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderexpenses  $orderexpenses
     * @return \Illuminate\Http\Response
     */
    public function show(orderexpenses $orderexpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderexpenses  $orderexpenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=orderexpenses::where('id',$id)->get();
        $ex = expenses::all();
        return view('orderexpenses.edit',compact('data','ex'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderexpenses  $orderexpenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata=orderexpenses::find($id);
        $olddata->name=$request->name;
        $olddata->price=$request->price;
        $olddata->date=$olddata->date;
        $olddata->save();
        return redirect("orderexpenses");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderfood  $orderfood
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        orderexpenses::findOrFail($id)->delete();
        return redirect('orderexpenses');
    }
}
