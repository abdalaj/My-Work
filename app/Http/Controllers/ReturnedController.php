<?php

namespace App\Http\Controllers;

use App\bank;
use App\expenses;
use App\exporter;
use App\important;
use App\log;
use App\order;
use App\prushes;
use App\purchases;
use App\returned;
use App\store;
use App\supplier;
use App\userroles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = request()->invoice_number;
        $orders = null;
        $important = null;
        $exporter = null;
        $purchases = null;
        $supplier = supplier::get();
        $store = store::get();
        if ($num) {
            $orders = order::where('invoice_number',$num)->get()->first();
            if ($orders->invoice_type == 'توريد') {
                $important = important::where("order_id",$orders->invoice_number)->get();
            }elseif($orders->invoice_type == 'تحميل'){
                $exporter = exporter::where("order_id",$orders->invoice_number)->get();
            }elseif($orders->invoice_type == 'مشتريات') {
                $purchases = purchases::where("order_id",$orders->invoice_number)->get();
            }else{
                $orders = [];
            }
        }
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('return.index', compact('orders','important','exporter','purchases','supplier','store','roles'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function edit(returned $returned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returned $returned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function destroy(returned $returned,$id)
    {
        return $id;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function important($id)
    {
        $olddata = important::find($id);
        // return $olddata;
        $olddata->is_return = 1;
        $olddata->save();
        $log = [
            'name' => ' تم تحديث فاتورة رقم ' . $id . ' من نوع وارادات وارجاع صنف منها باسم  ' . $olddata->name . ' ورقم ' . $olddata->id . ' وقيمة ' . $olddata->amount . ' واضافتهم للخزنه رقم ' . Auth::user()->bank_id,
            'user' => Auth::user()->name,
            'type' => ' مرتجع واردات',
        ];
        log::create($log);
        $oldbank = bank::find(Auth()->user()->bank_id);
        $oldbank->amount = $oldbank->amount + $olddata->amount;
        $oldbank->save();

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function exporter($id)
    {
        $olddata = exporter::find($id);
        $olddata->is_return = 1;
        $olddata->save();
        $log = [
            'name' => ' تم تحديث فاتورة رقم ' . $id . ' من نوع تحميل وارجاع صنف منها باسم  ' . $olddata->name . ' ورقم ' . $olddata->id . ' وقيمة ' . $olddata->amount . ' وخصمهم من الخزنه رقم ' . Auth::user()->bank_id,
            'user' => Auth::user()->name,
            'type' => ' مرتجع تحميل',
        ];
        log::create($log);
        $oldbank = bank::find(Auth()->user()->bank_id);
        $oldbank->amount = $oldbank->amount - $olddata->amount;
        $oldbank->save();

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function purchases($id)
    {
        $olddata = purchases::find($id);
        $olddata->is_return = 1;
        $olddata->save();
        $log = [
            'name' => ' تم تحديث فاتورة رقم ' . $id . ' من نوع مشتريات وارجاع صنف منها باسم  ' . $olddata->name . ' ورقم ' . $olddata->id . ' وقيمة ' . $olddata->amount . ' واضافتهم للخزنه رقم ' . Auth::user()->bank_id,
            'user' => Auth::user()->name,
            'type' => ' مرتجع مشتريات',
        ];
        log::create($log);
        $oldbank = bank::find(Auth()->user()->bank_id);
        $oldbank->amount = $oldbank->amount + ($olddata->price * $olddata->qty);
        $oldbank->save();

        return redirect()->back();
    }
}
