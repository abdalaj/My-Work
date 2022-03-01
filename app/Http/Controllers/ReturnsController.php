<?php

namespace App\Http\Controllers;

use App\BankTransaction;
use App\Events\ReturnCreated;
use App\Events\ReturnProductCreated;
use App\Order;
use App\OrderDetail;
use App\ReturnDetail;
use App\ReturnProduct;
use App\ProductStore;
use App\ProductUnit;
use App\Setting;
use App\TresuryTranaction;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReturnsController extends Controller {

	public function index($type='sales') {
        $returns = ReturnProduct::where('return_type',$type)->latest()->get();
		return view('returns.index', compact('returns','type'));
	}

    public function getSales(){
        return $this->index('sales');
    }

    public function getPurchases(){
        return $this->index('purchase');
    }

    public function createSales(){
        return $this->create('sales');
    }

    public function createSales2(){
        return $this->create('sales');
    }
    public function createPurchase(){
        return $this->create('purchase');
    }

	public function create($type) {
		$return  = new order;
		return view('returns.create', compact('return','type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	    try {
            DB::beginTransaction();
            $inputs = $request->except('_token');
            $inputs['order']['is_cash'] = $request->has('is_cash');
            $inputs['order']['discount_type'] = isset($inputs['order']['discount_type'])?2:1;
            $inputs['order']['sales_value_egp'] = currency($inputs['order']['sales_value'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
            $order = null;
            if($inputs['order']['order_id']){
                $order = Order::find($inputs['order']['order_id']);
            }
            $client = $inputs['order']['client_id'];
            foreach ($inputs['product'] as $pid=>$prod){
                $totalReturn = ReturnDetail::join('returns',function($qry)use($client){
                    $qry->on('returns.id','=','return_id');
                    $qry->where('client_id',$client);
                    $qry->whereNull('deleted_at');
                })->where('product_id',$pid)->sum('qty');
                $totalOrder = OrderDetail::join('orders',function($qry)use($client){
                    $qry->on('orders.id','=','order_id');
                    $qry->where('client_id',$client);
                })->where('product_id',$pid)->sum(DB::raw('qty'));
                //dd($totalReturn,$totalOrder,$prod['qty']);
                $totalReturn+=$prod['qty'];
                if($totalReturn > $totalOrder){
                    throw new \Exception('المرتجعات أكبر من المبيعات لهذا الصنف  '.$prod['product_name']);
                }
                if($order){
                    $details = OrderDetail::where('order_id',$order->id)
                        ->where('product_id',$pid)
                        ->first();
                    if($details->unit_id==$prod['unit_id']){
                        $details->return_qty += $prod['qty'];
                        $details->save();
                    }
                }
            }

            $return = ReturnProduct::create($inputs['order']);
            if($return->return_type=='sales'){
                $logNote = "فاتورة مرتجع مبيعات رقم ".$return->id." للعميل ".$return->client->name." بقيمة ".$return->return_value;
            }else{
                $logNote = "فاتورة مرتجع مشتريات رقم ".$return->id." من المورد ".$return->client->name." بقيمة ".$return->return_value;
            }
            activity()
                ->performedOn($return)
                ->log($logNote);
            if(isset($inputs['product'])){
                foreach ($inputs['product'] as $key=>$value){
                    //$inputs['product'][$key]['cost'] = currency($inputs['product'][$key]['cost'],"EGP",$return->currency, false);
                    if($inputs['product'][$key]['cost'] > $inputs['product'][$key]['price']){
                        $inputs['product'][$key]['cost'] = $inputs['product'][$key]['price'];
                    }
                    $inputs['product'][$key]['cost_egp'] = currency($value['cost'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
                    $inputs['product'][$key]['price_egp'] = currency($value['price'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
                }
            }
            $return->details()->attach($inputs['product']);

            event(new ReturnCreated($return));
            if($order){
                $this->setOrderProfit($order,$inputs['order']['return_value']);
            }
            DB::commit();
            if($return->return_type=='sales'){
                $route = route('ordersReturn.index');
            }else{
                $route = route('purchasesReturn.index');
            }
            $request->session()->flash('alert-success', 'تم إضافة المرتجع بنجاح');
            //return redirect(route('returns.getPrint',$return->id));
            return redirect($route);
		} catch (\Exception $e) {
			DB::rollback();
            $request->session()->flash('alert-danger', ' حدث خطأ اثناء اضافة المرتجع '.$e->getMessage());
			//dd($e->getMessage());
		}
        return back();
	}

    public function insert(Request $request){
        $order_details_data =  DB::table('order_detailes')
        ->where('id', '=', $request['id'])
        ->first();

        $orders_data =  DB::table('orders')
        ->where('invoice_number', '=', $request['id1'])
        ->first();
       // dd($order_details_data);


       $data1=array(
        'client_id'=>$orders_data->client_id,
        'return_type'=>'sales',
        'return_value'=>$order_details_data->total,
        'sales_value_egp'=>$order_details_data->total,
        'is_cash'=>'0',
        'return_date'=>now(),
        'created_at'=>now(),
        'updated_at'=>now(),
        'sale_id'=>$orders_data->sale_id,
        'discount'=>$orders_data->discount,
        'discount_type'=>$orders_data->discount_type,
        'manager_id'=>$orders_data->manager_id,
        'order_id'=>$request['id'],


    );
        DB::table('returns')->insert($data1);



        $data=array(
        'return_id'=>'0',
        'store_id'=>$order_details_data->store_id,
        'store_name'=>$order_details_data->store_name,
        'product_id'=>$order_details_data->product_id,
        'unit_id'=>$order_details_data->unit_id,
        'unit_name'=>$order_details_data->unit_name,
        'product_name'=>$order_details_data->product_name,
        'qty'=>$order_details_data->qty,
        'price'=>$order_details_data->price,
        'cost'=>$order_details_data->cost,
        'created_at'=>now(),
        'updated_at'=>now(),
        'cost_egp'=>$order_details_data->cost_egp,
        'price_egp'=>$order_details_data->price_egp);
        DB::table('return_detailes')->insert($data);
        DB::table('order_detailes')
            ->where('id','=', $request['id']);

        return redirect()->back()->with('message', 'تم إضافة تابع بنجاح');
        }





	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function show(ReturnProduct $return) {
        return view("returns.show", compact('return'));
    }

    public function getPrint($id) {
        $return = ReturnProduct::find($id);

        return view("returns.print_invoice", compact('return'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ReturnProduct $return) {
	    $type = $return->return_type;
	    //dd($return->details);
		return view('returns.edit', compact('return','type'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ReturnProduct $return) {
		try {
            DB::beginTransaction();
            $inputs = $request->except('_token');
            $productStores = $this->rollback($return);
            $inputs['order']['is_cash'] = $request->has('is_cash');
            $inputs['order']['sales_value_egp'] = currency($inputs['order']['sales_value'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
            $order = null;
            if($inputs['order']['order_id']){
                $order = Order::find($inputs['order']['order_id']);
            }
            $inputs['order']['discount_type'] = isset($inputs['order']['discount_type'])?2:1;
            if(isset($inputs['product'])){
                foreach ($inputs['product'] as $key=>$value){
                    //$inputs['product'][$key]['cost'] = currency($inputs['product'][$key]['cost'],"EGP",$return->currency, false);
                    if($inputs['product'][$key]['cost'] > $inputs['product'][$key]['price']){
                        $inputs['product'][$key]['cost'] = $inputs['product'][$key]['price'];
                    }
                    $inputs['product'][$key]['cost_egp'] = currency($value['cost'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
                    $inputs['product'][$key]['price_egp'] = currency($value['price'],currency()->getUserCurrency(),currency()->config('default'), $format = false);
                    if($order){
                        $details = OrderDetail::where('order_id',$order->id)
                            ->where('product_id',$key)
                            ->first();
                        if($details->unit_id==$value['unit_id']){
                            $details->return_qty += $value['qty'];
                            $details->save();
                        }
                    }

                }
            }
            //dd($inputs['product']);
            $return->update($inputs['order']);
            if($return->return_type=='sales'){
                $logNote = "تعديل فاتورة مرتجع مبيعات رقم ".$return->id." للعميل ".$return->client->name." بقيمة ".$return->return_value;
            }else{
                $logNote = "تعديل فاتورة مرتجع مشتريات رقم ".$return->id." من المورد ".$return->client->name." بقيمة ".$return->return_value;
            }
            activity()
                ->performedOn($return)
                ->log($logNote);
            $return->details()->sync($inputs['product']);
            event(new ReturnCreated($return,$productStores));
            if($order){
                $this->setOrderProfit($order,$inputs['order']['return_value']);
            }
            DB::commit();
            if($return->return_type=='sales'){
                $route = route('ordersReturn.index');
            }else{
                $route = route('purchasesReturn.index');
            }
            return redirect($route);
		} catch (\Exception $e) {
           // \Log::error($e->getMessage());
			DB::rollback();
			dd($e->getMessage());
		}
		return back();
	}

	public function rollback($return){
        $return->client->transactions()
                ->where('record_id',$return->id)
                ->where('transaction_type',$return->return_type)
                ->delete();
        //TresuryTranaction::where('record_id',$return->id)->delete();
        $order = null;
        if($return->order_id){
            $order = Order::find($return->order_id);
        }

        $details = $return->details;
        $productStores = array();
        foreach ($details as $item){
            if($item->is_service==1)continue;
            $productStore = ProductStore::where('product_id', $item->id)
                                        ->where('store_id', $item->pivot->store_id)
                                        ->first();
            $returnQty  = $item->pivot->qty;

            $prodstorUnit = $productStore->unit_id;
            $produtUnits =  ProductUnit::where('product_id', $item->id)->get();
            $returnUnit = $produtUnits->where('unit_id', $item->pivot->unit_id)->first();
            $storUnit  = $produtUnits->where('unit_id', $prodstorUnit)->first();
            /*if ($prodstorUnit != $item->pivot->unit_id) {
                if ($storUnit->pieces_num > $returnUnit->pieces_num) {
                    $returnQty = $returnQty/$storUnit->pieces_num;
                } else {
                    $returnQty = $returnQty*$returnUnit->pieces_num;
                }
            }*/
            if ($prodstorUnit != $item->pivot->unit_id) {
                if ($storUnit->pieces_num < $returnUnit->pieces_num) {
                    $a = $returnUnit->pieces_num/$storUnit->pieces_num;
                    $returnQty = $returnQty*$a;
                } else {
                    $a = $returnUnit->pieces_num/$storUnit->pieces_num;
                    if($a<1){
                        $returnQty = $returnQty*$a;
                    }else{
                        $returnQty = $returnQty/$a;
                    }
                }
            }
            if($order){
                $details = OrderDetail::where('order_id',$return->order_id)
                    ->where('product_id',$item->id)
                    ->first();
                if($details->unit_id==$item->pivot->unit_id){
                    $details->return_qty -= $returnQty;
                    $details->save();
                }
            }
            if($order){
                $this->setOrderProfit($order,$return->return_value);
            }
            if($return->return_type=='sales'){
                $productStore->sale_count += $returnQty;
            }else{
                $productCost = $item->last_cost;
                if(Setting::findByKey('productCost')=='avg') {
                    $oldCost = $storUnit->cost_price;
                    $oldQty = ($productStore->qty - $productStore->sale_count) ?: 1;
                    $newQty = $returnQty;
                    $newCost = $item->pivot->price;
                    $newAvg = (($oldCost * $oldQty) + ($newQty * $newCost)) / ($oldQty + $newQty);
                    $productCost = $newAvg;
                }
                $productCost = round($productCost,2);
                $storUnit->cost_price = $productCost;
                $storUnit->save();
                $item->last_cost = $productCost;
                $item->avg_cost = $productCost;
                $item->save();
                $productStore->qty += $returnQty;
            }
            $productStore->save();
            $productStores[$item->id.$item->pivot->store_id] = $productStore;
        }
        return $productStores;
    }
    public function setOrderProfit($order,$return_value){
        $order->total = $order->fgrand_order_total;
        $order->total_return += $return_value;
        $order->discount_value = $order->dicount_value;
        $total = $order->total - $order->discount_value;
        $total = $total>0?$total:0;
        if($total==0) {
            $order->discount = 0;
            $order->discount_value = 0;
        }
        if($order->paid>=$total){
            $order->paid = $total;
        }
        $order->due = $total - $order->paid;
        $order->profit = $order->order_profit;
        $order->save();
    }
    public function destroy(ReturnProduct $return)
    {
        $this->rollback($return);
        if($return->delete()){
            return "done";
        }
        return "failed";
    }

    public function search(Request $request){
        $invoice_num = $request['search'];
        $details1 =  DB::table('orders')->select('id')
        ->where('invoice_number', '=', $invoice_num)

        ->first();

        $details =  DB::table('order_detailes')
        ->where('order_id', '=',$details1->id)
        ->get();


        return view('returns.search', compact('details','invoice_num'));
    }


}
