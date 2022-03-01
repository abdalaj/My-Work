<?php

namespace App\Http\Controllers;

use App\privat;
use Illuminate\Http\Request;

class privatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('powers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = privat::all();
        return view('privat.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('privat.create');
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
            'private'=>'required',
        ],[
            'private.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $input=[
            'private'=>$request->private,
        ];
        privat::create($input);
        return redirect('privat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = privat::where('id',$id)->get();
        return view('privat.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = privat::where('id',$id)->get();
        return view('privat.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'private'=>'required',

        ],[
            'private.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $olddata=privat::find($id);
        $olddata->private=$request->private;

        $olddata->save();
        return redirect("privat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\privat  $privat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        privat::findOrFail($id)->delete();
        return redirect('privat');
    }
}
