<?php

namespace App\Http\Controllers;

use App\bank;
use App\log;
use App\order;
use App\purchases;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Purchases::orderBy('id','DESC')->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('Purchases.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = supplier::get();
        $currencyCode = array(
                'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN',
                'BAM', 'BBD', 'BDT', 'BGN', 'BHD', 'BIF', 'BMD', 'BND', 'BOB', 'BRL',
                'BSD', 'BTN', 'BWP', 'BYN', 'BZD', 'CAD', 'CDF', 'CHF', 'CLP', 'CNY',
                'COP', 'CRC', 'CUC', 'CUP', 'CVE', 'CZK', 'DJF', 'DKK', 'DOP', 'DZD',
                'EGP', 'ERN', 'ETB', 'EUR', 'FJD', 'FKP', 'GBP', 'GEL', 'GHS', 'GIP',
                'GMD', 'GNF', 'GTQ', 'GYD', 'HKD', 'HNL', 'HRK', 'HTG', 'HUF', 'IDR',
                'ILS', 'INR', 'IQD', 'IRR', 'ISK', 'JMD', 'JOD', 'JPY', 'KES', 'KGS',
                'KHR', 'KMF', 'KPW', 'KRW', 'KWD', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR',
                'LRD', 'LSL', 'LYD', 'MAD', 'MDL', 'MGA', 'MKD', 'MMK', 'MNT', 'MOP',
                'MRU', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO',
                'NOK', 'NPR', 'NZD', 'OMR', 'PAB', 'PEN', 'PGK', 'PHP', 'PKR', 'PLN',
                'PYG', 'QAR', 'RON', 'RSD', 'RUB', 'RWF', 'SAR', 'SBD', 'SCR', 'SDG',
                'SEK', 'SGD', 'SHP', 'SLL', 'SOS', 'SRD', 'SSP', 'STN', 'SYP', 'SZL',
                'THB', 'TJS', 'TMT', 'TND', 'TOP', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH',
                'UGX', 'USD', 'UYU', 'UZS', 'VES', 'VND', 'VUV', 'WST', 'XAF', 'XCD',
                'XOF', 'XPF', 'YER', 'ZAR', 'ZMW',
            );

        $order_id = order::orderby('id','DESC')
        ->first();
        $invoice_number = $order_id?$order_id->invoice_number+1:1;
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('purchases.create',compact('supplier','currencyCode','invoice_number','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        try{
            $olddue = supplier::find($request->client_id);
            $olddue->due = $olddue->due - $request->due;
            $oldbank = bank::find(Auth()->user()->bank_id);
            $oldbank->amount = $oldbank->amount - $request->paid;
            for ($i=0; $i < count($request->name); $i++) {
                $input[$i]=[
                    'name'=>$request->name[$i],
                    'price'=>$request->price[$i],
                    'date'=>$request->date[$i],
                    'qty'=>$request->qty[$i],
                    'describe'=>$request->describ[$i],
                    'order_id'=>$request->invoice_number,
                    'client_id'=>$request->client_id,
                    'is_return' => 0,
                ];
                purchases::create($input[$i]);
           }
            $order = [
                'invoice_number'=>$request->invoice_number,
                'invoice_type'=>$request->invoice_type,
                'payment_type'=>$request->payment_type,
                'total'=>$request->total,
                'currency'=>$request->currency,
                'paid'=>$request->paid,
                'due'=>$request->due,
                'tax'=>$request->tax,
                'whoadd'=>$request->whoadd,
                'client_id'=>$request->client_id,
                'note'=>$request->note
            ];
            $log = [
                'name'=>' تم انشاء فاتورة مشتريات برقم '.$request->invoice_number.' وتحتوي علي ' . count($request->name) .' متجات بقيمة ' . $request->total.$request->currency.' دفع منها '. $request->paid.'متبقي منها '. $request->due." للعميل رقم " . $request->client_id,
                'user'=>Auth::user()->name,
                'type'=>'اضافة فاتورة مشتريات',
            ];
            log::create($log);
            order::create($order);
            $oldbank->save();
            $olddue->save();
            $request->session()->flash('add', 'done!');
            return redirect('purchases');
        } catch (\Throwable $th) {
            $request->session()->flash('null', 'null');
            return redirect('purchases');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = purchases::where('id', $id)->get();
        $supplier = supplier::get();
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('purchases.edit', compact('data','supplier', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = purchases::find($id);
        $oldorder = order::where('invoice_number', $olddata->order_id)->get();

        if ( ($olddata->qty * $olddata->price) > ($request->qty * $request->price)) {
            $old = ($olddata->qty * $olddata->price);
            $new = ($request->qty * $request->price);
            $newamount = intval($old) - intval($new);
            $oldorder[0]->total = $oldorder[0]->total - $newamount;
        } else {
            $old = ($olddata->qty * $olddata->price);
            $new = ($request->qty * $request->price);
            $newamount =  intval($new) - intval($old);
            $oldorder[0]->total = $oldorder[0]->total + $newamount;
        }
        $oldorder[0]->save();
        $log = [
            'name' => ' تم تحديث فاتورة مشتريات برقم ' . $id . ' من اسم ' . $olddata->name . ' الي ' . $request->name,
            'user' => Auth::user()->name,
            'type' => ' تحديث فاتورة  مشتريات',
        ];
        $olddata->name = $request->name;
        $olddata->price = $request->price;
        $olddata->qty = $request->qty;
        $olddata->describe = $request->describe;
        $olddata->client_id = $olddata->client_id;
        $olddata->date = $olddata->date;
        $olddata->order_id = $olddata->order_id;
        $olddata->is_return = $olddata->is_return;

        $olddata->save();
        log::create($log);

        $request->session()->flash('edit', 'done!');
        return redirect("purchases");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $olddata = purchases::findOrFail($id);

        $oldorder = order::where('invoice_number', $olddata->order_id)->get();
        $newamount =  ($olddata->qty * $olddata->price);
        $log = [
            'name' => ' تم حذف فاتورة مشتريات برقم ' . $id . ' وتحديث السعر ',
            'user' => Auth::user()->name,
            'type' => ' حذف فاتورة  مشتريات',
        ];
        $oldorder[0]->total = $oldorder[0]->total - $newamount;
        $oldorder[0]->save();
        log::create($log);
        $olddata->delete();
        return redirect('purchases');
    }
}
