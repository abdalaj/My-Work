<?php

namespace App\Http\Controllers;

use App\expenses;
use App\exporter;
use App\log;
use App\prushes;
use App\shorka;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ShorkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = shorka::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('shorka.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('shorka.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        shorka::create($request->all());
        $log = [
            'name'=>' تم انشاء شريك باسم ' . $request->name . ' بواسطة ' . Auth::user()->name  ,
            'user'=>Auth::user()->name,
            'type'=>'انشاء شريك جديد ',
        ];
        log::create($log);
        request()->session()->flash('add', 'done!');
        return redirect('shorka');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shorka  $shorka
     * @return \Illuminate\Http\Response
     */
    public function show(shorka $shorka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shorka  $shorka
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = shorka::where('id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('shorka.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shorka  $shorka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $olddata = shorka::find($id);

        $log = [
            'name'=>' تم اجراء تعديل شريك باسم ' . $olddata->name . " الي " . $olddata->name . ' بواسطة ' . Auth::user()->name  ,
            'user'=>Auth::user()->name,
            'type'=>'تعديل شريك  ',
        ];

        $olddata->name = $request->name;
        $olddata->amount = $request->amount;
        $olddata->prec = $request->prec;

        log::create($log);
        $olddata->save();

        request()->session()->flash('add', 'done!');
        return redirect('shorka');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shorka  $shorka
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $olddata = shorka::find($id);
        $log = [
            'name'=>' تم حذف شريك باسم ' . $olddata->name . ' بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'حذف شريك ',
        ];
        log::create($log);
        $olddata->delete();
        return redirect()->back();
    }

    /**
     * shorkareport the specified resource from storage.
     *
     * @param  \App\shorka  $shorka
     * @return \Illuminate\Http\Response
     */
    public function shorkareport( )
    {
        $data = shorka::get();
        $god = exporter::where('is_return',0)->get()->sum('god');
        $expences = expenses::where('prushes_type',0)->get()->sum('mony');
        $expences_ty = expenses::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.shorka',compact('data','god','expences','expences_ty','roles'));
    }

}
