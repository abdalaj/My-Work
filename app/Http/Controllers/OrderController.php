<?php

namespace App\Http\Controllers;

use App\exporter;
use App\important;
use App\log;
use App\order;
use App\publisher;
use App\purchases;
use App\store;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::orderby('id', 'DESC')->get();
        $client = supplier::get();
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('orders.index', compact('orders', 'client','roles'));
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
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = order::find($id);
        $supplier = supplier::get();
        $store = store::get();

        if ($data->invoice_type == 'توريد') {
            $imp = important::where('order_id', $data->invoice_number)->get();
            $roles = userroles::where('user_id', Auth::user()->id)->get();
            return view('orders.details', compact('imp', 'supplier', 'store', 'roles'));
        } else if ($data->invoice_type == 'نشر') {
            $pub = publisher::where('order_id', $data->invoice_number)->get();
            $roles = userroles::where('user_id', Auth::user()->id)->get();
            $important = important::get();
            return view('orders.details', compact('pub', 'supplier', 'store', 'important', 'roles'));
        }else if ($data->invoice_type == 'مشتريات') {
            $purchases = purchases::where('order_id', $data->invoice_number)->get();
            $roles = userroles::where('user_id', Auth::user()->id)->get();
            return view('orders.details', compact( 'supplier', 'roles','purchases'));
        } else {
            $exp = exporter::where('order_id', $data->invoice_number)->get();
            $roles = userroles::where('user_id', Auth::user()->id)->get();
            return view('orders.details', compact('exp', 'supplier', 'store', 'roles'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = order::find($id);
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('orders.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata = order::find($id);

        $log = [
            'name'=>' تم تعديل فاتورة رئيسيه برقم ' . $olddata->invoice_number . 'بواسطة ' . Auth::user()->name ,
            'user'=>Auth::user()->name,
            'type'=>'تعديل فاتورة رئيسيه ',
        ];
        log::create($log);

        $olddata->client_id = $olddata->client_id;
        $olddata->invoice_number = $olddata->invoice_number;
        $olddata->invoice_type = $request->invoice_type;
        $olddata->payment_type = $request->payment_type;
        $olddata->total = $request->total;
        $olddata->paid = $request->paid;
        $olddata->due = $request->due;
        $olddata->tax = $request->tax;
        $olddata->note = $request->note;
        $olddata->save();
        request()->session()->flash('edit', 'done!');

        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::where('id', $id)->get();

        if ($order[0]->invoice_type == 'توريد') {
            try {
                important::where('order_id', $order[0]->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            } catch (\Throwable $th) {
                important::where('order_id', $order->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            }
        }
        if ($order[0]->invoice_type == 'نشر') {
            try {
                publisher::where('order_id', $order[0]->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            } catch (\Throwable $th) {
                publisher::where('order_id', $order->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            }
        }
        if ($order[0]->invoice_type == 'تحميل') {
            try {
                exporter::where('order_id', $order[0]->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            } catch (\Throwable $th) {
                exporter::where('order_id', $order->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            }
        }
        if ($order[0]->invoice_type == 'مشتريات') {
            try {
                purchases::where('order_id', $order[0]->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            } catch (\Throwable $th) {
                purchases::where('order_id', $order->invoice_number)->delete();
                $log = [
                    'name' => ' تم حذف فاتورة برقم ' . $order[0]->invoice_number,
                    'user' => Auth::user()->name,
                    'type' => ' حذف فاتورة كامله',
                ];
                log::create($log);
            }
        }
        order::find($id)->delete();
        return redirect('orders');
    }
}
