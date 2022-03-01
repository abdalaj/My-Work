<?php

namespace App\Http\Controllers;

use App\bank;
use App\clients;
use App\important;
use Illuminate\Http\Request;
use App\Currency;
use App\exporter;
use App\log;
use App\order;
use App\publisher;
use App\store;
use App\supplier;
use App\userroles;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Torann\Currency\Currency as CurrencyCurrency;

class ImportantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = store::where('id', Auth::user()->store_id)->With(['exporter', 'publisher', 'important'])->get();
        $supplier = supplier::get();
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('important.index', compact('data', 'supplier', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $clients = clients::all();
        $store = store::where('id', Auth::user()->store_id)->get();
        $supplier = supplier::all();
        $order_id = order::orderby('id', 'DESC')
            ->first();
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

        $invoice_number = $order_id ? $order_id->invoice_number + 1 : 1;
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('important.create', compact('store', 'supplier', 'invoice_number', 'currencyCode', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $olddue = supplier::find($request->client_id);
            $olddue->due = $olddue->due - $request->due;
            $oldbank = bank::find(Auth()->user()->bank_id);
            $oldbank->amount = $oldbank->amount - $request->paid;
            for ($i = 0; $i < count($request->name); $i++) {
                $input[$i] = [
                    'name' => $request->name[$i],
                    'number_herfy' => $request->number_herfy[$i],
                    'number_client' => $request->number_client[$i],
                    'name_client' => $request->name_client[$i],
                    'number_factory' => $request->number_factory[$i],
                    'date' => $request->date[$i],
                    'width' => $request->width[$i],
                    'height' => $request->height[$i],
                    'volum' => $request->volum[$i],
                    'qty' => $request->qty[$i],
                    'safy' => $request->safy[$i],
                    'safy_after' => $request->safy_after[$i],
                    'discount' => $request->discount[$i],
                    'price' => $request->price[$i],
                    'amount' => $request->amount[$i],
                    'store_id' => $request->store_id[$i],
                    'month' => $request->month[$i],
                    'is_return' => 0,
                    'order_id' => $request->invoice_number,
                ];
                important::create($input[$i]);
            }
            $order = [
                'invoice_number' => $request->invoice_number,
                'invoice_type' => $request->invoice_type,
                'payment_type' => $request->payment_type,
                'total' => $request->total,
                'currency' => $request->currency,
                'paid' => $request->paid,
                'due' => $request->due,
                'tax' => $request->tax,
                'whoadd' => $request->whoadd,
                'client_id' => $request->client_id,
                'note' => $request->note
            ];
            $name = ' تم انشاء فاتورة برقم ' . $request->invoice_number . ' وتحتوي علي ' . count($request->name) . ' متجات بقيمة ' . $request->total . $request->currency . ' دفع منها ' . $request->paid . 'متبقي منها ' . $request->due . " للعميل رقم " . $request->client_id;
            $user = Auth::user()->name;
            $log = [
                'name' => $name,
                'user' => $user,
                'type' => 'اضافة فاتورة توريد',
            ];
            $olddue->save();
            $oldbank->save();
            log::create($log);
            order::create($order);
            $request->session()->flash('add', 'done!');
            return redirect('important');
        } catch (\Throwable $th) {
            $request->session()->flash('null', 'null');
            return redirect('important');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\important  $important
     * @return \Illuminate\Http\Response
     */
    public function show(important $important)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\important  $important
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $important = important::where('id', $id)->get();
        $supplier = supplier::all();
        $store = store::where('id', Auth::user()->store_id)->get();
        $roles = userroles::where('user_id', Auth::user()->id)->get();
        return view('important.edit', compact('important', 'store', 'supplier', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\important  $important
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = important::find($id);

        $oldorder = order::where('invoice_number', $olddata->order_id)->get();

        if ($olddata->amount > $request->amount) {
            $old = $olddata->amount;
            $new = $request->amount;
            $newamount = intval($old) - intval($new);
            $oldorder[0]->total = $oldorder[0]->total - $newamount;
        } else {
            $old = $olddata->amount;
            $new = $request->amount;
            $newamount =  intval($new) - intval($old);
            $oldorder[0]->total = $oldorder[0]->total + $newamount;
        }
        $oldorder[0]->save();
        $log = [
            'name' => ' تم تحديث فاتورة توريدات برقم ' . $id . ' من اسم ' . $olddata->name . ' الي ' . $request->name,
            'user' => Auth::user()->name,
            'type' => ' تحديث فاتورة  توريدات',
        ];
        $olddata->name = $request->name;
        $olddata->price = $request->price;
        $olddata->number_client = $request->number_client;
        $olddata->number_herfy = $request->number_herfy;
        $olddata->amount = $request->amount;
        $olddata->qty = $request->qty;
        $olddata->height = $request->height;
        $olddata->width = $request->width;
        $olddata->volum = $request->volum;
        $olddata->name_client = $request->name_client;
        $olddata->discount = $request->discount;
        $olddata->number_factory = $request->number_factory;
        $olddata->safy = $request->safy;
        $olddata->safy_after = $request->safy_after;
        $olddata->date = $olddata->date;
        $olddata->month = $olddata->month;
        $olddata->store_id = $olddata->store_id;
        $olddata->order_id = $olddata->order_id;
        $olddata->is_return = $olddata->is_return;


        $olddata->save();
        log::create($log);

        $request->session()->flash('edit', 'done!');
        return redirect("important");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\important  $important
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $olddata_1 = important::findOrFail($id);
        $publisher_1 = publisher::where('important_id', $olddata_1->id)->get();

        try {
            foreach ($publisher_1 as $pub) {
                exporter::where('publisher_id', $pub->id)->delete();
            }
        } catch (\Throwable $th) {
        }
        publisher::where('important_id', $olddata_1->id)->delete();
        $olddata = important::findOrFail($id);

        $oldorder = order::where('invoice_number', $olddata->order_id)->get();
        $newamount =  $olddata->amount;
        $log = [
            'name' => ' تم حذف فاتورة توريد برقم ' . $id . ' وتحديث السعر ',
            'user' => Auth::user()->name,
            'type' => ' حذف فاتورة  توريد',
        ];
        $oldorder[0]->total = $oldorder[0]->total - $newamount;
        // return $newamount;
        $oldorder[0]->save();
        log::create($log);

        $olddata->delete();
        return redirect('important');
    }
}
