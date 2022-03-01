<?php

namespace App\Http\Controllers;

use App\exporter;
use App\important;
use App\log;
use App\publisher;
use App\store;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = store::where('id',Auth::user()->store_id)->get();
        $sum = publisher::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('store.index',compact('data','sum','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('store.create',compact('roles'));
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
            'name'=>$request->name
        ];
        $log = [
            'name'=>' تم انشاء مخزن '.$request->name,
            'user'=>Auth::user()->name,
            'type'=>'انشاء مخزن',
        ];
        log::create($log);
        store::create($input);
        $request->session()->flash('add', 'done!');
        return redirect('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = store::where('id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('store.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = store::find($id);
        $log = [
            'name'=>' تم تعديل مخزن '.$olddata->name,
            'user'=>Auth::user()->name,
            'type'=>'تعديل مخزن',
        ];
        log::create($log);
        $olddata->name=$request->name;
        $olddata->save();
        $request->session()->flash('edit', 'done!');
        return redirect('store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=store::find($id);
        important::where('store_id',$destroy->id)->delete();
        publisher::where('store_id',$destroy->id)->delete();
        exporter::where('store_id',$destroy->id)->delete();
        $log = [
            'name'=>' تم حذف مخزن '.$destroy->name,
            'user'=>Auth::user()->name,
            'type'=>'حذف مخزن',
        ];
        log::create($log);
        $destroy->delete();
        return redirect('store');
    }
}
