<?php

namespace App\Http\Controllers;

use App\devices;
use App\foods;
use App\orders;
use App\prushes;
use Illuminate\Http\Request;

class TimerController extends Controller
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
        // $data=devices::orderByDesc('id')->get();
        // return view('timer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=devices::where('id',$id)->get();
        $order = orders::where('room_id',$id)->orderBy('id', 'DESC')->take(1)->get();
        // try {
        //     $exp=(int)explode(":",$order[0]->copy_start)[1];
        //     return view('timer.index',compact('data','order','exp'));
        // } catch (\Throwable $th) {
        //     $exp=0;
        //     return view('timer.index',compact('data','order','exp'));
        // }
        return view('timer.index',compact('data','order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $order = orders::where('room_id',$id)->orderBy('id', 'DESC')->take(1)->get();
        $data=devices::where('id',$id)->get();
        return view('timer.timerdown',compact('data','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timer  $timer
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
        $olddata->old_qty=$request->qty;
        $olddata->qty_prush=$request->qty_prush;
        $olddata->save();

        $input=[
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty_prush,
            'amount'=>$request->amo,
            'date'=>date('y-m-d')

        ];

        prushes::create($input);

        return redirect("prushes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
