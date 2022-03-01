<?php

namespace App\Http\Controllers;

use App\foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class foodsController extends Controller
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
        $data=foods::orderByDesc('id')->get();
        return view('foods.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods.create');
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
            'price'=>'required',
            'qty'=>'required',

        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',
            'price.required'=>'من فضلك اكتب السعر ',
            'qty'=>'من فضلك اكتب الكميه',
        ]
    );
        $input=[
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'old_qty'=>$request->qty,
            'qty_prush'=>0
        ];
        foods::create($input);
        return redirect('foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = foods::where('id',$id)->get();
        return view('foods.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = foods::where('id',$id)->get();
        return view('foods.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $olddata->old_qty=$olddata->old_qty;
        $olddata->save();
        return redirect("foods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foods::findOrFail($id)->delete();
        return redirect('foods');

    }
}
