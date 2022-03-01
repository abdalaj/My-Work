<?php

namespace App\Http\Controllers;

use App\bank;
use App\exporter;
use App\important;
use App\log;
use App\order;
use App\publisher;
use App\store;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExporterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=store::where('id',Auth::user()->store_id)->With(['exporter','publisher','important'])->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('exporter.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = store::where('id',Auth::user()->store_id)->get();
        $client = supplier::all();
        $publisher = publisher::with(['important'])->get();
        // return $publisher;
        $order_id = order::orderby('id','DESC')
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
        $invoice_number = $order_id?$order_id->invoice_number+1:1;

        $collection = important::with(['publisher'=>function($q){
            $q->with(['exporter'])->get();
        }])->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        // return $collection;
        return view('exporter.create',compact('store','client','publisher','invoice_number','currencyCode','collection','roles'));
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
            $olddue->due = $olddue->due + $request->due;

            $oldbank = bank::find(Auth()->user()->bank_id);
            $oldbank->amount = $oldbank->amount + $request->paid;

            for ($i=0; $i < count($request->name); $i++) {
                $input[$i]=[
                    'is_return' => 0,
                    'name'=>$request->name[$i],
                    'code'=>$request->code[$i],
                    'describ'=>$request->describ[$i],
                    'qty'=>$request->qty[$i],
                    'height'=>$request->height[$i],
                    'volum'=>$request->volum[$i],
                    'safym2'=>$request->safym2[$i],
                    'price'=>$request->price[$i],
                    'amount'=>$request->amount[$i],
                    'qty_refuse'=>$request->qty_refuse[$i],
                    'allqty_refuse'=>$request->allqty_refuse[$i],
                    'amount_refuse'=>$request->amount_refuse[$i],
                    'qty_found'=>$request->qty_found[$i],
                    'qtyall_found'=>$request->qtyall_found[$i],
                    'amount_found'=>$request->amount_found[$i],
                    'import_miuns_publish_befor_discount'=>$request->import_miuns_publish_befor_discount[$i],
                    'import_miuns_publish_after_discount'=>$request->import_miuns_publish_after_discount[$i],
                    'import_miuns_export'=>$request->import_miuns_export[$i],
                    'god'=>$request->god[$i],
                    'number_hawya'=>$request->number_hawya[$i],
                    'name_client'=>$request->name_client[$i],
                    'date'=>$request->date[$i],
                    'store_id'=>$request->store_id[$i],
                    'publisher_id'=>$request->publisher_id[$i],
                    'order_id'=>$request->invoice_number,
                    'month'=>$request->month[$i],
                ];
                exporter::create($input[$i]);
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
                'name'=>' تم انشاء فاتورة برقم '.$request->invoice_number.' وتحتوي علي ' . count($request->name) .' متجات بقيمة ' . $request->total.$request->currency.' دفع منها '. $request->paid.'متبقي منها '. $request->due." للعميل رقم " . $request->client_id,
                'user'=>Auth::user()->name,
                'type'=>'اضافة فاتورة تصنيع وتحميل',
            ];
            $olddue->save();
            $oldbank->save();
            log::create($log);
            order::create($order);
            $request->session()->flash('add', 'done!');
            return redirect('exporter');
        } catch (\Throwable $th) {
            $request->session()->flash('null', 'null');
            return redirect('important');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function show(exporter $exporter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $exporter = exporter::where('id',$id)->get();
        $store = store::where('id',Auth::user()->store_id)->get();
        $client = supplier::all();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('exporter.edit',compact('exporter','store','client','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
            // return $request->all();
                $olddata=exporter::find($id);

                $oldorder=order::where('invoice_number',$olddata->order_id)->get();
                if ($olddata->amount > $request->amount) {
                    $old = $olddata->amount;
                    $new = $request->amount;
                    $newamount = intval($old) - intval($new);
                    $oldorder[0]->total=$oldorder[0]->total-$newamount;
                    $oldorder[0]->save();
                }else{
                    $old = $olddata->amount;
                    $new = $request->amount;
                    $newamount =  intval($new) - intval($old);
                    $oldorder[0]->total=$oldorder[0]->total+$newamount;
                    $oldorder[0]->save();
                }
                $log = [
                    'name'=>' تم تحديث فاتورة تصنيع وتحميل برقم '.$id.' من اسم ' .$olddata->name.' الي '. $request->name,
                    'user'=>Auth::user()->name,
                    'type'=>' تحديث فاتورة تصنيع وتحميل ',
                ];
                $olddata->name=$request->name;
                $olddata->code=$request->code;
                $olddata->describ=$request->describ;
                $olddata->qty=$request->qty;
                $olddata->height=$request->height;
                $olddata->volum=$request->volum;
                $olddata->safym2=$request->safym2;
                $olddata->price=$request->price;
                $olddata->amount=$request->amount;
                $olddata->qty_refuse=$request->qty_refuse;
                $olddata->allqty_refuse=$request->allqty_refuse;
                $olddata->amount_refuse=$request->amount_refuse;
                $olddata->qty_found=$request->qty_found;
                $olddata->qtyall_found=$request->qtyall_found;
                $olddata->amount_found=$request->amount_found;
                $olddata->import_miuns_publish_befor_discount=$request->import_miuns_publish_befor_discount;
                $olddata->import_miuns_publish_after_discount=$request->import_miuns_publish_after_discount;
                $olddata->import_miuns_export=$request->import_miuns_export;
                $olddata->god=$request->god;
                $olddata->number_hawya=$request->number_hawya;
                $olddata->date=$olddata->date;
                $olddata->month=$olddata->month;
                $olddata->name_client=$request->name_client;
                $olddata->store_id=$olddata->store_id;
                $olddata->publisher_id=$olddata->publisher_id;
                $olddata->is_return = $olddata->is_return;

                $olddata->save();
                log::create($log);

                $request->session()->flash('edit','done!');
                return redirect('exporter');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $destroy = exporter::findOrFail($id);

        $oldorder=order::where('invoice_number',$destroy->order_id)->get();
        $newamount =  $destroy->amount;
        // return $oldorder;
        $oldorder[0]->total=$oldorder[0]->total-$newamount;
        // return $newamount;
        $oldorder[0]->save();
        exporter::findOrFail($id)->delete();
        return redirect('exporter');
    }
}
