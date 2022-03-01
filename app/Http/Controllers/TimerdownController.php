<?php

namespace App\Http\Controllers;

use App\devices;
use App\orders;
use App\timerdown;
use Illuminate\Http\Request;

class TimerdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data=devices::where('id',$id)->get();
        return view('timer.timerdown',compact('data'));
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
            'room_id'=>$request->room_id,
            'start'=>$request->start,
            'copy_start'=>$request->start,
            'hours'=>$request->hours,
            'end'=>$request->end,
            'price'=>$request->price,
            'fully'=>number_format(($request->price/60) * (explode(".",$request->hours)[0]*60+explode(".",$request->hours)[1]),2),
            'date'=>date('y-m-d'),
            'unique'=>uniqid()
        ];
        orders::create($input);
        $old = devices::find($request->room_id);
        $old->active=1;
        $old->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\timerdown  $timerdown
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data=devices::where('id',$id)->get();
        $order = orders::where('room_id',$id)->orderBy('id', 'DESC')->take(1)->get();
        return view('timer.timerdown',compact('data','order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\timerdown  $timerdown
     * @return \Illuminate\Http\Response
     */
    public function edit(timerdown $timerdown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timerdown  $timerdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata=orders::find($id);
        $olddata->name=$olddata->name;
        $olddata->price=$olddata->price;
        $olddata->copy_start=0;
        $olddata->start=$olddata->start;
        $olddata->end=$olddata->end;
        $olddata->hours=$olddata->hours;
        $olddata->unique=$olddata->unique;
        $olddata->fully = $olddata->fully;
        $olddata->date=$olddata->date;
        $olddata->save();
        $old = devices::find($request->room_id);
        $old->active=0;
        $old->save();
        $print=orders::with(['orderfood'])->where('id',$id)->get();
        return view('recipt',compact('print'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timerdown  $timerdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(timerdown $timerdown)
    {
        //
    }
}
