<?php

namespace App\Http\Controllers;

use App\recover;
use Illuminate\Http\Request;

class recoverController extends Controller
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
        $data = recover::all();
        return view('recover.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recover.create');
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
            'recover'=>'required',
        ],[
            'recover.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $input=[
            'recover'=>$request->recover,
        ];
        recover::create($input);
        return redirect('recover');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = recover::where('id',$id)->get();
        return view('recover.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = recover::where('id',$id)->get();
        return view('recover.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'recover'=>'required',

        ],[
            'recover.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $olddata=recover::find($id);
        $olddata->recover=$request->recover;

        $olddata->save();
        return redirect("recover");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recover  $recover
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        recover::findOrFail($id)->delete();
        return redirect('recover');
    }
}
