<?php

namespace App\Http\Controllers;

use App\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class roomController extends Controller
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
        $data=room::orderByDesc('id')->get();
        return view('rooms.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',
        ]
    );
        $input=[
            'name'=>$request->name,
        ];

        room::create($input);
        return redirect('room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = room::where('id',$id)->get();
        return view('rooms.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = room::where('id',$id)->get();
        return view('rooms.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',

        ]
    );
        $olddata=room::find($id);
        $olddata->name=$request->name;
        $olddata->save();
        return redirect("room");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        room::findOrFail($id)->delete();
        return redirect('room');

    }
}
