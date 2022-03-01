<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('powers');
    }
    public function index()
    {
        $data=contact::all();
        return view('contact.index',compact('data'));
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
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'message'=>$request->message,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->updated_at
        ];
        contact::create($input);
        return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = contact::where('id',$id)->get();
        return view('contact.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alldata=contact::find($id);
        return $alldata;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata=contact::find($id);
        $olddata->id=$request->id;
        $olddata->name=$request->name;
        $olddata->email=$request->email;
        $olddata->phone=$request->phone;
        $olddata->message=$request->message;
        $olddata->created_at=$request->created_at;
        $olddata->updated_at=$request->updated_at;
        $olddata->save();
        return $olddata;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contact::findOrFail($id)->delete();
        return redirect('contact');
    }
}
