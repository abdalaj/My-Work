<?php

namespace App\Http\Controllers;

use App\devices;
use App\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class devicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=devices::orderByDesc('id')->get();
        return view('devices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = room::all();
        return view('devices.create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'time'=>'required',
            'price'=>'required',
            'room_id'=>'required',
            'active'=>'required',
        ],[
            'name.required'=>'من فضلك اكتب الجهاز',
            'time.required'=>'من فضلك وحدة الوقت',
            'price.required'=>'من فضلك ادخل سعر الاستجئار',
            'room_id.required'=>'من فضلك ادخل اسم الغرفه',
            'active.required'=>'من فضلك ادخل حالة الاستئجار',
        ]
    );
        $input=[
            'name'=>$request->name,
            'time'=>$request->time,
            'price'=>$request->price,
            'room_id'=>$request->room_id,
            'active'=>$request->active,
        ];
        $img=$request->file('img');
        if ($img) {
            $filename=$img->getClientOriginalExtension();
            $filename="myimage".uniqid().".".$filename;
            $img->move('images/devices/',$filename);
            $input['img']=$filename;
        }
        devices::create($input);
        return redirect('devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = devices::where('id',$id)->get();
        return view('devices.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = devices::where('id',$id)->get();
        $rooms = room::all();
        return view('devices.edit',compact('data','rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'time'=>'required',
            'price'=>'required',
            'room_id'=>'required',
            'active'=>'required',
        ],[
            'name.required'=>'من فضلك اكتب الجهاز',
            'time.required'=>'من فضلك وحدة الوقت',
            'price.required'=>'من فضلك ادخل سعر الاستجئار',
            'room_id.required'=>'من فضلك ادخل اسم الغرفه',
            'active.required'=>'من فضلك ادخل حالة الاستئجار',
        ]
    );
        $olddata=devices::find($id);
        $olddata->name=$request->name;
        $olddata->time=$request->time;
        $olddata->price=$request->price;
        $olddata->room_id=$request->room_id;
        $olddata->active=$request->active;
        $olddata->save();
        return redirect("devices");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = devices::findOrFail($id);
        File::delete(public_path("images/devices/{$data->img}"));

        devices::findOrFail($id)->delete();
        return redirect('devices');

    }
}
