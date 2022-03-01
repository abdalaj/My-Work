<?php

namespace App\Http\Controllers\api;

use App\orderes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=orderes::all();
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
        $input=[
            'id'=>$request->id,
            'name'=>$request->name,
            'many'=>$request->many,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'carya'=>$request->carya,
            'describ'=>$request->describ,
            'price'=>$request->price,
            'details'=>$request->details,
            'user_item_id'=>$request->user_item_id,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->updated_at
        ];
        orderes::create($input);
        return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alldata = orderes::where('id',$id)->get();
        return $alldata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alldata=orderes::find($id);
        return $alldata;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata=orderes::find($id);
        $olddata->id=$request->id;
        $olddata->name=$request->name;
        $olddata->many=$request->many;
        $olddata->phone=$request->phone;
        $olddata->city=$request->city;
        $olddata->carya=$request->carya;
        $olddata->describ=$request->describ;
        $olddata->details=$request->details;
        $olddata->price=$request->price;
        $olddata->user_item_id=$request->user_item_id;
        $olddata->created_at=$request->created_at;
        $olddata->updated_at=$request->updated_at;
        $olddata->save();
        return $olddata;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderes  $orderes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        orderes::findOrFail($id)->delete();
    }
}
