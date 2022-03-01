<?php

namespace App\Http\Controllers;

use App\about;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        $data = about::all();
        return view('about.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
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
            'que'=>'required',
            'ans'=>'required',
        ],[
            'que.required'=>'من فضلك اكتب السؤال',
            'ans.required'=>'من فضلك اكتب الاجابه ',
        ]
    );
        $input=[
            'que'=>$request->que,
            'ans'=>$request->ans,
        ];
        about::create($input);
        return redirect('about');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = about::where('id',$id)->get();
        return view('about.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = about::where('id',$id)->get();
        return view('about.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'que'=>'required',
            'ans'=>'required',

        ],[
            'ans.required'=>'من فضلك اكتب السؤال',
            'que.required'=>'من فضلك اكتب الاجابه ',
        ]
    );
        $olddata=about::find($id);
        $olddata->que=$request->que;
        $olddata->ans=$request->ans;

        $olddata->save();
        return redirect("about");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        about::findOrFail($id)->delete();
        return redirect('about');
    }
}
