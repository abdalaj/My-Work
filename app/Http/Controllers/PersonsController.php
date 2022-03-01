<?php
namespace App\Http\Controllers;
use App\Bank;
use App\BankTransaction;
use App\CalanderPayment;
use App\Expense;
use App\Order;
use App\Person;
use App\PersonSupport;
use App\SaleMeta;
use App\Setting;
use App\Transaction;
use App\TresuryTranaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PersonsController extends Controller
{

    public function index($type='client')
    {
        if (!request()->ajax()) {
            if(request('isdebt'))
                return view('persons.debt',compact('type'));
            else
                return view('persons.index',compact('type'));
        }else{
            $persons = Person::query()
                        ->where('type', $type)
                        ->with('region');

            $datatable = DataTables::of($persons)
                ->addColumn('balnce_text',function($person) {
                    return $person->balnce_text;
                });
            if(request('isdebt')) {
                $persons = $persons->whereHas('transactions', function ($query) {
                    return $query->selectRaw('model_id, SUM(value) AS sum')
                        ->groupBy('model_id')
                        ->having('sum', '>', 0);
                });

                $datatable->addColumn('last_order',function($person) {
                    return $person->last_order;
                })->addColumn('last_transaction',function($person) {
                    return $person->last_transaction;
                })->addColumn('last_transaction_value',function($person) {
                    return $person->last_transaction_value;
                });
            }
            $datatable->addColumn('region',function($person) {
                    return optional($person->region)->name;
                })
                ->addColumn('mobileData',function($person) {
                    $mobile = $person->mobile;
                    $mobile .= $person->mobile2?'<br/>'.$person->mobile2:'';
                    return $mobile;
                })
                ->addColumn('remember_review_balance',function($person) {
                    return $person->remember_review_balance?'ذكرنى بالدعم':'';
                })
                ->addColumn('whoadd',function($person) {
                    return $person->whoadd?$person->whoadd:'لا يوجد';
                })
                ->addColumn('actions',function($person) use($type){
                    $btn = '<a data-toggle="modal" data-target="#myModal" href="'.route('persons.edit',$person).'" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            '.trans('front.edit').'
                        </a>
                        <a class="btn btn-xs btn-danger remove-record" data-url="'.route('persons.destroy',$person).'" data-id="'.$person->id.'">
                            <i class="fa fa-trash"></i>
                            '.trans('front.delete').'
                        </a>
                        <a href="'.route('persons.show',$person).'" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil fa-eye" aria-hidden="true"></i>
                            '.trans('front.show').'
                        </a>
                        <a data-toggle="modal" data-target="#myModal" href="'.route('persons.addPayment',$person).'" class="btn btn-success btn-xs">
                            <i class="fa fa-money fa-fw" aria-hidden="true"></i>
                            '.($type=='client'?trans('front.Pay'):'سند صرف نقدى').'
                        </a>';
                    return $btn;
               });
            $datatable->rawColumns(['actions','mobileData']);
            return $datatable->make(true);;
        }
        if(request('isdebt')){

            $persons = Person::query()->whereHas('transactions', function($query){
                return $query->selectRaw('model_id, SUM(value) AS sum')
                    ->groupBy('model_id')
                    ->having('sum', '>', 0);
            })
            ->where('type',$type)
            ->get();

            return view('persons.debt',compact('persons','type'));
        }else{
            $persons = Person::latest()->where('type',$type)->get();
            return view('persons.index',compact('persons','type'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type='client')
    {
        $person = new Person;

        return view('persons.create',compact('person','type'));
    }

    public function clientIndex(){
        return $this->index('client');
    }

    public function supplierIndex(){
        return $this->index('supplier');
    }

    public function clientCreate(){
        return $this->create('client');
    }

    public function supplierCreate(){
        return $this->create('supplier');
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
            DB::beginTransaction();
            $inputs = $request->except('_token');
            if ($inputs['mobile']) {
                $search = Person::where('mobile', $inputs['mobile'])->first();
                if ($search) {
                    throw new \Exception('خطأ رقم الموبيل مسجل مع شخص أخر وهو ' . $search->name);
                }
            }
            $inputs['remember_review_balance'] = $request->has('remember_review_balance');
            $inputs['is_client_supplier'] = $request->has('is_client_supplier');
            $inputs['whoadd'] = $request->whoadd;
            if($inputs['dept']==1){
                $inputs['start_balance'] =  $inputs["type"]== "client"?-$request->start_balance:$request->start_balance;
            }else{
                $inputs['start_balance'] = $inputs["type"]== "client"?$request->start_balance:-$request->start_balance;
            }
            $person = Person::create($inputs);
            if($inputs['comment']){
                PersonSupport::create([
                    'user_id' => auth()->user()->id,
                    'person_id' => $person->id,
                    'comment' => $inputs['comment']
                ]);
            }
            //dd($person);
            if($request->start_balance){
                $person->transactions()
                    ->create([
                        'value'=>$inputs['start_balance'] ,
                        'note'=>'رصيد أول المدة'
                    ]);
            }
            if($person->type=='client'){
                $route = route('client.index');
                $inputs['type'] = 'supplier';
                //       $inputs['dept'] = 1;
                $this->addClientSupplier($inputs);
            }elseif($person->type=='supplier'){
                $route = route('supplier.index');
                $inputs['type'] = 'client';
                //     $inputs['dept'] = 2;
                $this->addClientSupplier($inputs);
            }
            DB::commit();
            if(request()->reqType=='ajax'){
                $persons = Person::where('type',$person->type)->latest()->take(1)->get();
                return redirect()->back();
            }
            return redirect($route)->with('alert-success', trans('front.Successfully added'));

        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('alert-danger',$e->getMessage());
            //dd($e->getMessage());
        }

    }

    public function addClientSupplier($inputs){
        if($inputs['is_client_supplier']){

            Person::firstOrCreate(['name'=>$inputs['name'],'type'=>$inputs['type']],$inputs);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $from = request()->fromdate;
        $to = request()->todate;
        $person = Person::findOrFail($id);
        $transactions = $person->transactions();
        $orders = $person->orders();

        $sales_returns = $person->returns()->where('return_type','sales');
        $purchase_returns = $person->returns()->where('return_type','purchase');
        if($from){
            $transactions->whereRaw("DATE(created_at) >= '{$from}'");
            $orders->whereRaw("DATE(created_at) >= '{$from}'");
            $sales_returns->whereRaw("DATE(created_at) >= '{$from}'");
            $purchase_returns->whereRaw("DATE(created_at) >= '{$from}'");
        }
        if($to){
            $transactions->whereRaw("DATE(created_at) <= '{$to}'");
            $orders->whereRaw("DATE(created_at) <= '{$to}'");
            $sales_returns->whereRaw("DATE(created_at) <= '{$to}'");
            $purchase_returns->whereRaw("DATE(created_at) <= '{$to}'");
        }
        $transactions = $transactions->get();
        $orders = $orders->get();
        $sales_returns = $sales_returns->get();
        $purchase_returns = $purchase_returns->get();
        return view('persons.show',compact('person','sales_returns','purchase_returns','orders','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('persons.edit',compact('person'));
    }

    /*public function addPayment(Request $request,Person $person)
    {

        if($request->isMethod('post')){

            $is_client_paid =  $request->has('is_client_paid');

            $value = $request->value;
            if($is_client_paid){
                $value = -$value;
                TresuryTranaction::create([
                    'note'=>" دفع  للعميل {$person->name} مبلغ نقدى من الخزينة ",
                    'value'=>-$value,
                    'type'=>'withdraw',
                    'record_id' => null
                ]);
            }
            $person->transactions()
                ->create([
                    'value'=>-$value,
                    'note'=>$request->note,
                    'created_at'=>$request->created_at
                ]);
            if($request->discount){
                $person->transactions()
                    ->create([
                        'value'=>-$request->discount,
                        'note'=>"خصم اضافى عند التحصيل",
                        'created_at'=>$request->created_at
                    ]);
            }
            return back()->with('alert-success', trans('front.Successfully added'));
        }
        return view('persons.payment',compact('person'));
    }*/

    public function addPayment(Request $request,Person $person)
    {

        if($request->isMethod('post')){
            try {
                DB::beginTransaction();
                $value = $request->value;
                $calanderId = $request->calanderId;
                if ($calanderId) {
                    $calander = CalanderPayment::where('id', $calanderId)->first();
                    if ($value == $calander->value) {
                        $calander->update(['is_paid' => 1]);
                    } elseif ($value < $calander->value) {
                        $remain = $calander->value - $value;
                        $calander->update(['is_paid' => 1, 'value' => $value]);
                        $next = CalanderPayment::where('is_paid', 0)->first();
                        $next->value += $remain;
                        $next->save();
                    } elseif ($value > $calander->value) {
                        $remain = $value - $calander->value;
                        $calander->update(['is_paid' => 1, 'value' => $value]);
                        $next = CalanderPayment::where('is_paid', 0)->first();
                        $next->value -= $remain;
                        $next->save();
                    }
                }
                $bankId = $request->bank_id;
                if ($bankId) {
                    $trans["bank_id"] = $bankId;
                    $bank = Bank::find($bankId);
                    $trans["op_date"] = date('Y-m-d');
                    $trans["total"] = $bank->balance;
                    $grand = currency($value, currency()->getUserCurrency(), $bank->currency, $format = false);
                    if ($person->type == 'client') {
                        $note = 'تحصيل من العميل ' . $person->name . ' | ' . $request->note;
                        $trans["due"] = $bank->balance + $grand;
                        $bank->balance += $grand;
                        $trans["type"] = "2";
                    } else {
                        $note = 'دفع إلى المورد  ' . $person->name . ' | ' . $request->note;
                        $trans["due"] = $bank->balance - $grand;
                        $bank->balance -= $grand;
                        $trans["type"] = "1";
                    }

                    $trans["note"] = $note;
                    $trans["value"] = $grand;
                    $bank->save();

                    $person->transaction()->create($trans);
                    //BankTransaction::create($trans);
                    activity()
                        ->performedOn($person)
                        ->log($note." ".$value);
                }
                if ($value) {
                    $person->transactions()
                        ->create([
                            'sale_id' => $request->sale_id,
                            'value' => -$value,
                            'note' => $request->note,
                            'created_at' => $request->created_at
                        ]);
                    if(Setting::findByKey('subtract_payment_from_invoice')==1) {
                        $listOrders = Order::query();
                        $listOrders->where('due', '>', 0);
                        $listOrders->where('client_id', '=', $person->id);
                        if ($person->type == 'client') {
                            $listOrders->where('invoice_type', 'sales');
                        } elseif ($person->type == 'supplier') {
                            $listOrders->where('invoice_type', 'purchase');
                        }
                        if ($request->sale_id) {
                            $listOrders->where('sale_id', $request->sale_id);
                        }
                        $listOrders = $listOrders->where('due', '>', 0)->get();
                        //dd($listOrders);
                        $remaining = $value;
                        foreach ($listOrders as $ord) {
                            if ($remaining == 0) break;
                            if ($ord->due > $remaining) {
                                $ord->due -= $remaining;
                                $ord->paid += $remaining;
                                $remaining = 0;
                            } elseif ($ord->due <= $remaining) {
                                $remaining = $remaining - $ord->due;
                                $ord->paid += $ord->due;
                                $ord->due = 0;
                            }
                            $ord->save();
                        }
                    }
                }
                if ($request->discount) {
                    /*$expense['note'] = ' خصم عند التحصيل '.$person->name;
                    $expense['value'] = $request->discount;
                    Expense::create($expense);*/
                    if ($request->discount) {
                        $note = "خصم اضافى عند التحصيل";
                        if ((bool)$request->taswia) {
                            $note = " تسوية | " . $request->note;
                        }
                        $person->transactions()
                            ->create([
                                'value' => -$request->discount,
                                'note' => $note,
                                'created_at' => $request->created_at,
                                'taswia' => $request->has('taswia') ?: 0
                            ]);
                    }
                }
                DB::commit();
                return back()->with('alert-success', 'تمت العملية بنجاح');
            }catch (\Exception $e){
                DB::rollBack();
                dd($e->getMessage());
                return back()->with('alert-danger', 'حدث خطأ اثناء عملية التحصيل');
            }
        }
        return view('persons.payment',compact('person'));
    }
    public function support(Request $request,Person $person)
    {
        if ($request->isMethod('post')) {
            try {
                DB::beginTransaction();
                if($request->comment) {
                    PersonSupport::create([
                        'user_id' => auth()->user()->id,
                        'person_id' => $person->id,
                        'comment' => $request->comment
                    ]);
                }
                $remember = $request->has('remember_review_balance');
                $person->update(['remember_review_balance'=>$remember,'remember_date'=>$request->remember_date]);
                DB::commit();
                return back()->with('alert-success', 'تمت العملية بنجاح');
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e->getMessage());
                return back()->with('alert-danger', 'حدث خطأ اثناء عملية الاضافة');
            }
        }
        return view('persons.support',compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $inputs = $request->except('_token');
        if ($inputs['dept'] == 1) {
            $inputs['start_balance'] = $inputs["type"] == "client" ? -$request->start_balance : $request->start_balance;
        } else {
            $inputs['start_balance'] = $inputs["type"] == "client" ? $request->start_balance : -$request->start_balance;
        }
        $inputs['remember_review_balance'] = $request->has('remember_review_balance');
        $inputs['is_client_supplier'] = $request->has('is_client_supplier');
        $inputs['whoadd'] = $request->whoadd;
        //dd($inputs);
        $person->update($inputs);
        if ($inputs['start_balance']) {
            //$transaction = $person->transactions()->where('note','رصيد أول المدة')->first();
            $person->transactions()->updateOrCreate(['note' => 'رصيد أول المدة'], ['value' => $inputs['start_balance']]);
        }
        if ($inputs['is_client_supplier']){

            if ($person->type == 'client') {
                $route = route('client.index');
                $inputs['type'] = 'supplier';
                $inputs['dept'] = 1;
                $this->addClientSupplier($inputs);
            } elseif ($person->type == 'supplier') {
                $route = route('supplier.index');
                $inputs['type'] = 'client';
                $inputs['dept'] = 2;
                $this->addClientSupplier($inputs);
            }
        }
        if($person->type=='client'){
            $route = route('client.index');
        }elseif($person->type=='supplier'){
            $route = route('supplier.index');
        }
        return redirect($route)->with('alert-success', trans('front.Modified successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        if($person->delete()){
            return "done";
        }
        return "failed";
    }
    public function deleteTransaction($id)
    {
        try{
            DB::beginTransaction();
            $trans = Transaction::find($id);
            if($trans->note!='رصيد أول المدة'){
                if(Setting::findByKey('subtract_payment_from_invoice')==1) {
                    $listOrders = Order::query();
                    $listOrders->where('paid', '>', 0);
                    $listOrders->where('client_id', '=', $trans->model_id);
                    $listOrders = $listOrders->get();
                    $remaining = abs($trans->value);
                    foreach ($listOrders as $ord) {
                        if ($remaining == 0) break;
                        if ($ord->paid > $remaining) {
                            $ord->due += $remaining;
                            $ord->paid -= $remaining;
                            $remaining = 0;
                        } elseif ($ord->paid <= $remaining) {
                            $remaining = $remaining - $ord->paid;
                            $ord->due += $ord->paid;
                            $ord->paid = 0;
                        }
                        $ord->save();
                    }
                }
            }
            $trans->delete();
            DB::commit();
            return "transaction deleted";
        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
    public function getClientSupplier(Request $req)
    {
        $persons = Person::
            where('is_client_supplier',1)
            ->groupBy('name')
            ->get();
        $client = [];
        $supplier = [];
        if($req->name){
            $client = Person::where('name',$req->name)
                        ->where('type','client')
                        ->first();
            $supplier = Person::where('name',$req->name)
                        ->where('type','supplier')
                        ->first();
        }
        return view('persons.client_supplier',compact('persons','client','supplier'));
    }

    public function getCalander(Request $req)
    {
        $calanders = CalanderPayment::query();
        if($req->filter1){
            if($req->filter1 == 'delayed'){
                $calanders->where('is_paid',0)->where('date','<',date('Y-m-d'));
            }
            if($req->filter1 == 'paid'){
                $calanders->where('is_paid',1);
            }
            if($req->filter1 == 'notpaid'){
                $calanders->where('is_paid',0);
            }
        }
        $from = request()->fromdate;
        $to = request()->todate;
        if($from){
            $calanders->whereRaw("DATE(date) >= '{$from}'");
        }
        if($to) {
            $calanders->whereRaw("DATE(date) <= '{$to}'");
        }
        $calanders = $calanders->get();
        //dd($calanders);
        return view('persons.calanders',compact('calanders'));
    }

    public function payments(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        $list = Person::join('transactions',function($qry){
            $qry->on('model_id','=','persons.id');
            $qry->where('model_type',Person::class);
            $qry->where('note','<>','رصيد أول المدة');
        })->with(array('transactions.sale'=>function($query){
            //$query->select('name salePerson');
        }))->select(['persons.*','transactions.value','transactions.sale_id','transactions.created_at as date'])
        ->where('type','client');
        //dd($fromdate);
        if($fromdate){
            $list->whereRaw("DATE(transactions.created_at) >= '{$fromdate}'");
        }
        if($todate){
            $list->whereRaw("DATE(transactions.created_at) <= '{$todate}'");
        }
        $list->orderBy('transactions.created_at','DESC');
        $list= $list->get();
        //dd($list);
        return view('payments.report',compact('list'));
    }
    public function deleteInstalment($id)
    {
        $item = CalanderPayment::find($id);
        if($item->delete()){
            return "done";
        }
        return "failed";
    }
    public function getPersonInvoices(){
        $personid = request('id');
        $person = Person::find($personid);
        $orders = Order::where('client_id',$personid)->get();
        $options = "";
        foreach ($orders as $ord){
            $options .= '<option sale_id="'.$ord->sale_id.'" value="'.$ord->id.'"> فاتورة رقم ('.$ord->invoice_number.') بتاريخ '.$ord->invoice_date.'</option>';
        }
        return json_encode([
           'list'=>$options,
            'balance'=>$person->total_due,
            'priceType'=>$person->priceType,
        ]);

    }

    public function getDetails(Request $request)
    {
        $person = Person::find($request->p_id);
        return json_encode([
            'total_due'=>$person->total_due,
            'priceType'=>$person->priceType,
            'points'=>$person->total_points,
            'last_transaction'=>$person->last_transaction,
        ]);
    }
    public function getPersonList(Request $request)
    {
        $q = $request->input('term', '');
        $clients = Person::where('type',request('type'))
            ->where(function($qry)use($q){
                $qry->where('name', 'LIKE', '%'.$q.'%')
                    ->orwhere('mobile', 'LIKE', '%'.$q.'%')
                    ->orwhere('mobile2', 'LIKE', '%'.$q.'%');
            })
            ->latest()
            ->take(10)
            ->get(['id', 'name as text']);

        return ['results' => $clients];
    }
}
