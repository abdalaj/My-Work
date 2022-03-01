<?php

namespace App\Http\Controllers;

use App\bank;
use App\exporter;
use App\getmony;
use App\important;
use App\log;
use App\order;
use App\publisher;
use App\supplier;
use App\userroles;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = supplier::all();
        $banks = bank::where('id',Auth::user()->bank_id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('supplier.index', compact('data','banks','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('supplier.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
            'whoadd' => $request->whoadd,
            'type' => $request->type,
            'code' => $request->code,
            'due' => 0,
        ];
        supplier::create($input);
        $log = [
            'name' => ' تم انشاء عميل جديد باسم ' . $request->name,
            'user' => Auth::user()->name,
            'type' => ' انشاء عميل',
        ];
        log::create($log);
        $request->session()->flash('add', 'done!');
        return redirect('supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $from = request()->fromdate;
        $to = request()->todate;

        $supplier = supplier::where('id',$id)->get();

        $important = important::where('name_client', $id);
        $publisher = publisher::where('name_client', $id);
        $exporter = exporter::where('name_client', $id);
        $orders = order::where('client_id', $id);

        if ($from) {
            $orders->whereRaw("DATE(created_at) >= '{$from}'");
            $important->whereRaw("DATE(created_at) >= '{$from}'");
            $exporter->whereRaw("DATE(created_at) >= '{$from}'");
            $publisher->whereRaw("DATE(created_at) >= '{$from}'");
        }
        if ($to) {
            $orders->whereRaw("DATE(created_at) <= '{$to}'");
            $important->whereRaw("DATE(created_at) <= '{$to}'");
            $exporter->whereRaw("DATE(created_at) <= '{$to}'");
            $publisher->whereRaw("DATE(created_at) <= '{$to}'");
        }
        $important = $important->get();
        $publisher = $publisher->get();
        $exporter = $exporter->get();
        $orders = $orders->get();

        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('supplier.details', compact('supplier', 'important', 'publisher', 'exporter', 'orders','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = supplier::where('id', $id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('supplier.edit', compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata = supplier::find($id);
        $log = [
            'name' => ' تم التعديل في عميل باسم ' . $olddata->name,
            'user' => Auth::user()->name,
            'type' => ' تعديل عميل',
        ];
        log::create($log);
        $olddata->name = $request->name;
        $olddata->number_phone = $request->number_phone;
        $olddata->address = $request->address;
        $olddata->type = $olddata->type;
        $olddata->code = $request->code;
        $olddata->whoadd = $olddata->whoadd;
        $olddata->due = $olddata->due;
        $olddata->save();
        $request->session()->flash('edit', 'done!');
        return redirect("supplier");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $log = [
            'name' => ' تم حذف عميل باسم ' . supplier::findOrFail($id)->name,
            'user' => Auth::user()->name,
            'type' => ' حذف عميل',
        ];
        log::create($log);
        $supplier = supplier::findOrFail($id);

        important::where('name_client', $supplier->id)->delete();
        exporter::where('name_client', $supplier->id)->delete();
        publisher::where('name_client', $supplier->id)->delete();

        supplier::findOrFail($id)->delete();
        return redirect('supplier');
    }
    /**
     * getmony the specified resource from storage.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function getmony($id,Request $request)
    {

        $mony = [
            'client_id'=>$id,
            'name'=>supplier::find($id)->name,
            'mony'=>$request->mony,
            'whoadd'=>$request->whoadd,
        ];

        // $client_type = supplier::findOrFail($id)->type;
        // return request()->all();
        if ($request->supplier_type == 1) {

            $log = [
                'name' => ' تم التحصيل من عميل رقم ' . $id . ' باسم ' . supplier::findOrFail($id)->name . ' مبلغ قدره ' . $request->mony . ' بواسطة ' . Auth::user()->name,
                'user' => Auth::user()->name,
                'type' => 'تحصيل من عميل',
            ];

            $olddata = bank::findOrFail($request->bank_id);
            $olddata->amount = $olddata->amount + $request->mony;
            $olddata->save();

            $oldmony = supplier::findOrFail($id);
            $oldmony->due = $oldmony->due - $request->mony;
            $oldmony->save();

        }elseif($request->supplier_type == 2){

            $log = [
                'name' => ' تم الدفع للمورد رقم  ' . $id . ' باسم ' . supplier::findOrFail($id)->name  . ' مبلغ قدره ' . $request->mony . ' بواسطة ' . Auth::user()->name,
                'user' => Auth::user()->name,
                'type' => 'دفع لمورد',
            ];

            $olddata = bank::findOrFail($request->bank_id);
            $olddata->amount = $olddata->amount - $request->mony;
            $olddata->save();

            $oldmony = supplier::findOrFail($id);
            $oldmony->due = $oldmony->due + $request->mony;
            $oldmony->save();
        }

        log::create($log);
        getmony::create($mony);
        request()->session()->flash('add', 'done!');
        return redirect()->back();
    }
}
