<?php

namespace App\Http\Controllers;

use App\sill;
use Illuminate\Http\Request;

class sillController extends Controller
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
        $data = sill::all();
        return view('sill.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sill.create');
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
            'sill'=>'required',
        ],[
            'sill.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $input=[
            'sill'=>$request->sill,
        ];
        sill::create($input);
        return redirect('sill');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = sill::where('id',$id)->get();
        return view('sill.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = sill::where('id',$id)->get();
        return view('sill.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sill'=>'required',

        ],[
            'sill.required'=>'من فضلك اكتب الشرط',
        ]
    );
        $olddata=sill::find($id);
        $olddata->sill=$request->sill;

        $olddata->save();
        return redirect("sill");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sill  $sill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sill::findOrFail($id)->delete();
        return redirect('sill');
    }
}
