<?php

namespace App\Http\Controllers;

use App\devices;
use App\foods;
use App\orders;
use App\room;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = orders::orderBy('id', 'DESC')->get();

        return view('orders.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Request $request,$id)
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
            'room_id'=>$request->room_id,
            'start'=>$request->start,
            'copy_start'=>$request->start,

            'end'=>0,
            'hours'=>0,
            'price'=>$request->price,
            'fully'=>0,
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
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = orders::where('room_id',$id)->orderBy('id', 'DESC')->take(1)->get();
        $data=devices::where('id',$id)->get();

        return view('timer.index',compact('order','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',
            'price.required'=>'من فضلك اكتب السعر ',
            'qty.required'=>'من فضلك اكتب الكميه ',
        ]
    );
        $olddata=foods::find($id);
        $olddata->name=$request->name;
        $olddata->price=$request->price;
        $olddata->qty=$request->qty;
        $olddata->save();

        return redirect("foods");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata=orders::find($id);
        $olddata->name=$olddata->name;
        $olddata->price=$olddata->price;
        $olddata->copy_start=0;
        $olddata->start=$olddata->start;
        $olddata->end=number_format((float)date(' h.i') + 2,2);
        $olddata->hours=$request->hours;
        $olddata->unique=$olddata->unique;
        // return ((100-explode(".",$request->hours)[1])*$olddata->price);
        // (((60-explode(".",$request->hours)[1])/100)*$olddata->price)
        $olddata->fully = number_format((float)( ((explode(".",$request->hours)[0] )*60)+((explode(".",$request->hours)[1] )) )*($olddata->price/60),2)  ;
        // $olddata->fully=number_format((float)($request->hours*$olddata->price),2);
        $olddata->date=$olddata->date;
        $olddata->save();
        $old = devices::find($request->room_id);
        $old->active=0;
        $old->save();
        $print=orders::with(['orderfood'])->where('id',$id)->get();
        // $room_id=devices::where('id',$request->room_id)->get();
        return view('recipt',compact('print'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        orders::findOrFail($id)->delete();
        return redirect('orders');
    }
}
