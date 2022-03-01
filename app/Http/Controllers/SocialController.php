<?php

namespace App\Http\Controllers;

use App\social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class socialController extends Controller
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
        $data=social::all();
        return view('social.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('social.create');
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
            'facebook'=>'required',
            'twitter'=>'required',
            'instagrame'=>'required',
            'youtube'=>'required',
        ],[
            'facebook.required'=>'من فضلك ادخل رابط الفيسبوك',
            'instagrame.required'=>'من فضلك ادخل رابط الانستجرام',
            'youtube.required'=>'من فضلك ادخل رابط اليوتيوب',
            'twitter.required'=>'من فضلك ادخل رابط تويتر',
        ]
    );
        $input=[
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagrame'=>$request->instagrame,
            'youtube'=>$request->youtube,
        ];

        social::create($input);
        return redirect('social');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = social::where('id',$id)->get();
        return view('social/details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = social::where('id',$id)->get();
        return view('social.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'facebook'=>'required',
            'twitter'=>'required',
            'instagrame'=>'required',
            'youtube'=>'required',
        ],[
            'facebook.required'=>'من فضلك ادخل رابط الفيسبوك',
            'instagrame.required'=>'من فضلك ادخل رابط الانستجرام',
            'youtube.required'=>'من فضلك ادخل رابط اليوتيوب',
            'twitter.required'=>'من فضلك ادخل رابط تويتر',
        ]
    );
        $olddata=social::find($id);
        $olddata->facebook=$request->facebook;
        $olddata->twitter=$request->twitter;
        $olddata->youtube=$request->youtube;
        $olddata->instagrame=$request->instagrame;
        $olddata->save();
        return redirect("social");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        social::findOrFail($id)->delete();
        return redirect('social');

    }
}
