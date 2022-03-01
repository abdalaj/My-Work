<?php

namespace App\Http\Controllers;

use App\bank;
use App\log;
use App\prushes;
use App\shorka;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrushesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = prushes::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('prushes.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('prushes.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        prushes::create($request->all());
        $log = [
            'name'=>' تم انشاء مصروف باسم ' . $request->name . ' بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'انشاء مصروف جديد',
        ];
        log::create($log);
        request()->session()->flash('add', 'done!');

        return redirect('prushes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function show(prushes $prushes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = prushes::where('id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('prushes.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = prushes::find($id);

        $log = [
            'name'=>' تم تعديل مصروف باسم ' . $olddata->name . ' الي ' . $request->name . ' بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'تعديل مصروف ',
        ];
        log::create($log);

        $olddata->name = $request->name;
        $olddata->save();
        request()->session()->flash('edit', 'done!');

        return redirect('prushes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prushes  $prushes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $olddata = prushes::find($id);
        $log = [
            'name'=>' تم حذف مصروف باسم ' . $olddata->name . ' بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'حذف مصروف ',
        ];
        log::create($log);
        $olddata->delete();
        return redirect()->back();
    }


}
