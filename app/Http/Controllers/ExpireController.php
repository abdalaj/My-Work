<?php

namespace App\Http\Controllers;

use App\expire;
use App\log;
use App\store;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        $data = expire::get();
        return view('expire.index', compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        $stores = store::where('id',Auth::user()->store_id)->get();
        return view('expire.create',compact('roles','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        expire::create($request->all());
        $log = [
            'name'=>' تم انشاء هالك باسم ' . $request->name . ' بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'انشاء هالك جديد',
        ];
        log::create($log);
        request()->session()->flash('add', 'done!');

        return redirect('expire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\expire  $expire
     * @return \Illuminate\Http\Response
     */
    public function show(expire $expire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\expire  $expire
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $olddata = expire::find($id);
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('expire.edit',compact('olddata','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\expire  $expire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = expire::find($id);
        $log = [
            'name'=>' تم تعديل هالك باسم ' . $olddata->name .' بواسطة ' . Auth::user()->name . ' وتغيير قيمته من ' . $olddata->price . ' الي ' . $request->price ,
            'user'=>Auth::user()->name,
            'type'=>'تعديل هالك ',
        ];

        $olddata->name = $request->name;
        $olddata->store = $olddata->store;
        $olddata->price = $request->price;
        $olddata->date = $request->date;

        log::create($log);
        $olddata->save();
        request()->session()->flash('edit', 'done!');
        return redirect('expire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\expire  $expire
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $olddata = expire::find($id);
        $log = [
            'name'=>' تم حذف هالك باسم ' . $olddata->name . ' بواسطة ' . Auth::user()->name . " قيمته " . $olddata->price,
            'user'=>Auth::user()->name,
            'type'=>'حذف هالك ',
        ];
        log::create($log);
        $olddata->delete();
        return redirect()->back();
    }
}
