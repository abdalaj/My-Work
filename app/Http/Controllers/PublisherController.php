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

class PublisherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=store::where('id',Auth::user()->store_id)->With(['exporter','publisher','important'])->get();
        $client = supplier::get();
        $important=important::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('publisher.index',compact('data','client','important','roles'));
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
        $important = important::all();
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
        return view('publisher.create',compact('store','client','important','invoice_number','currencyCode','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // $olddue = supplier::find($request->client_id);
            // $olddue->due = $olddue->due - $request->due;
            // $oldbank = bank::find(Auth()->user()->bank_id);
            // $oldbank->amount = $oldbank->amount - $request->paid;
            for ($i=0; $i < count($request->name); $i++) {
                $input[$i]=[
                    'name'=>$request->name[$i],
                    'number_makina'=>$request->number_makina[$i],
                    'volum_almaza'=>$request->volum_almaza[$i],
                    'volum_publish'=>$request->volum_publish[$i],
                    'volum_amount'=>$request->volum_amount[$i],
                    'number_smears'=>$request->number_smears[$i],
                    'number_tables'=>$request->number_tables[$i],
                    'copy_number_tables'=>$request->number_tables[$i],
                    'height'=>$request->height[$i],
                    'width'=>$request->width[$i],
                    'volum'=>$request->volum[$i],
                    'safy'=>$request->safy[$i],
                    'price'=>$request->price[$i],
                    'amount'=>$request->amount[$i],
                    'price_mears'=>$request->price_mears[$i],
                    'amount_mears'=>$request->amount_mears[$i],
                    'amount_all'=>$request->amount_all[$i],
                    'price_charge'=>$request->price_charge[$i],
                    'amount_all_plus'=>$request->amount_all_plus[$i],
                    'safym2'=>$request->safym2[$i],
                    'amount_with_safym2'=>$request->amount_with_safym2[$i],
                    'date'=>$request->date[$i],
                    'month'=>$request->month[$i],
                    'tip'=>$request->tip[$i],
                    'name_client'=>$request->name_client[$i],
                    'qty_publish'=>$request->qty_publish[$i],
                    'store_id'=>$request->store_id[$i],
                    'order_id'=>$request->invoice_number,
                    'important_id'=>$request->important_id[$i]
                ];
                publisher::create($input[$i]);
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
                'type'=>'اضافة فاتورة نشر',
            ];
            log::create($log);
            order::create($order);
            // $oldbank->save();
            $request->session()->flash('add', 'done!');
            return redirect('publisher');
        } catch (\Throwable $th) {
            $request->session()->flash('null', 'null');
            return redirect('publisher');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publisher = publisher::where('id',$id)->get();
                $store = store::where('id',Auth::user()->store_id)->get();
        $client = supplier::all();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('publisher.edit',compact('publisher','store','client','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = publisher::find($id);

        $oldorder=order::where('invoice_number',$olddata->order_id)->get();
        if ($olddata->amount_all_plus > $request->amount_all_plus) {
            $old = $olddata->amount_all_plus;
            $new = $request->amount_all_plus;
            $newamount = intval($old) - intval($new);
            $oldorder[0]->total=$oldorder[0]->total-$newamount;
            $oldorder[0]->save();
        }else{
            $old = $olddata->amount_all_plus;
            $new = $request->amount_all_plus;
            $newamount =  intval($new) - intval($old);
            $oldorder[0]->total=$oldorder[0]->total+$newamount;
            $oldorder[0]->save();
        }
        $log = [
            'name'=>' تم تحديث فاتورة نشر برقم '.$id.' من اسم ' .$olddata->name.' الي '. $request->name,
            'user'=>Auth::user()->name,
            'type'=>' تحديث فاتورة  نشر',
        ];
        $olddata->name=$request->name;
        $olddata->number_makina=$request->number_makina;
        $olddata->volum_almaza=$request->volum_almaza;
        $olddata->volum_publish=$request->volum_publish;
        $olddata->volum_amount=$request->volum_amount;
        $olddata->number_smears=$request->number_smears;
        $olddata->number_tables=$request->number_tables;
        $olddata->copy_number_tables=$request->number_tables;
        $olddata->height=$request->height;
        $olddata->width=$request->width;
        $olddata->volum=$request->volum;
        $olddata->safy=$request->safy;
        $olddata->price=$request->price;
        $olddata->amount=$request->amount;
        $olddata->price_mears=$request->price_mears;
        $olddata->amount_mears=$request->amount_mears;
        $olddata->amount_all=$request->amount_all;
        $olddata->price_charge=$request->price_charge;
        $olddata->amount_all_plus=$request->amount_all_plus;
        $olddata->safym2=$request->safym2;
        $olddata->amount_with_safym2=$request->amount_with_safym2;
        $olddata->tip=$request->tip;
        $olddata->qty_publish=$request->qty_publish;
        $olddata->date=$olddata->date;
        $olddata->month=$olddata->month;
        $olddata->name_client=$request->name_client;
        $olddata->store_id=$olddata->store_id;
        $olddata->important_id=$olddata->important_id;
        $olddata->order_id=$olddata->order_id;


        $olddata->save();
        log::create($log);

        $request->session()->flash('edit', 'done!');
        return redirect("publisher");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $destroy = publisher::findOrFail($id);
        $exp = exporter::where('publisher_id',$destroy->id)->get();

        exporter::where('publisher_id',$destroy->id)->delete();

        $oldorder=order::where('invoice_number',$destroy->order_id)->get();
        $newamount =  $destroy->amount_all_plus;
        // return $newamount;
        $log = [
            'name'=>' تم حذف فاتورة نشر برقم '.$id.' وتحديث السعر  ' ,
            'user'=>Auth::user()->name,
            'type'=>' حذف فاتورة  نشر',
        ];
        $oldorder[0]->total=$oldorder[0]->total-$newamount;
        // return $newamount;
        $oldorder[0]->save();
        log::create($log);
        $destroy->delete();
        return redirect('publisher');
    }
}
