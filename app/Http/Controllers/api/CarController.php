<?php

namespace App\Http\Controllers\api;

use App\car;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=car::orderBy('id','DESC')->get();
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
        // $input=[
        //     'name'=>$request->name,
        //     'price'=>$request->price,
        //     'summry'=>$request->summry,
        //     'number'=>$request->number,
        //     'imghome'=>$request->imghome,
        //     'video'=>$request->video,
        //     'img1'=>$request->img1,
        //     'img2'=>$request->img2,
        //     'img3'=>$request->img3,
        //     'img4'=>$request->img4,
        //     'img5'=>$request->img5,
        //     'img6'=>$request->img6,
        //     'class'=>$request->class,
        //     'describ'=>$request->describ,
        //     'discount'=>$request->discount,
        //     'saler'=>$request->saler,
        //     'stauts'=>$request->stauts,
        // ];
        // car::create($input);
        // return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alldata = car::where('id',$id)->get();
        return $alldata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $alldata=car::find($id);
        // return $alldata;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $olddata=car::find($id);
        // $olddata->name=$request->name;
        // $olddata->price=$request->price;
        // $olddata->summry=$request->summry;
        // $olddata->number=$request->number;
        // $olddata->imghome=$request->imghome;
        // $olddata->video=$request->video;
        // $olddata->img1=$request->img1;
        // $olddata->img2=$request->img2;
        // $olddata->img3=$request->img3;
        // $olddata->img4=$request->img4;
        // $olddata->img5=$request->img5;
        // $olddata->img6=$request->img6;
        // $olddata->class=$request->class;
        // $olddata->describ=$request->describ;
        // $olddata->discount=$request->discount;
        // $olddata->saler=$request->saler;
        // $olddata->stauts=$request->stauts;
        // $olddata->save();
        // return $olddata;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // car::findOrFail($id)->delete();
    }
}