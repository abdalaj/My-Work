<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankTransaction;
use App\Category;
use App\Expense;
use App\Imports\ClientsImport;
use App\Imports\ProductsImport;
use App\Imports\SuppliersImport;
use App\Order;
use App\OrderDetail;
use App\Partner;
use App\Person;
use App\Product;
use App\ProductStore;
use App\ProductUnit;
use App\ReturnDetail;
use App\ReturnProduct;
use App\Role;
use App\Setting;
use App\Store;
use App\Transaction;
use App\TresuryTranaction;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUniqId(){
        $mac = $this->getUniqueMachineID();
        if (file_exists('macAdd.php')) {
            $data = file_get_contents('macAdd.php');
            //dd($data,$mac);
            if ($mac != $data) {
                die('Not Allowed');
            }
        } else {
            file_put_contents( 'macAdd.php', $mac);
        }
    }
    function getUniqueMachineID($salt = "") {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $temp = "diskpartscript.txt";
            if(!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
            $output = shell_exec("diskpart /s ".$temp);
            $lines = explode("\n",$output);
            $result = array_filter($lines,function($line) {
                return stripos($line,"ID:")!==false;
            });
            if(count($result)>0) {
                $d = array_values($result);
                $result = array_shift($d);
                $result = explode(":",$result);
                $result = trim(end($result));
            } else $result = $output;
        } else {
            $result = shell_exec("blkid -o value -s UUID");
            if(stripos($result,"blkid")!==false) {
                $result = $_SERVER['HTTP_HOST'];
            }
        }
        return md5($salt.md5($result));
    }
    public function index()
    {


        //activity()->log('Look, I logged something');

        /*z $products = OrderDetail::with('product.productUnit')->get();
         foreach ($products as $p){
             $available = $p->product->productUnit()->pluck('units.id')->toArray();
             if(!in_array($p->unit_id,$available)){
                 $unit = $p->product->productUnit()->first();
                 $p->unit_name =$unit->name;
                 $p->unit_id = $unit->id;
                 $p->save();
             }
         }
         die('done');*/
        /*$list = Order::where('invoice_type','sales')
            ->get();
        if($list){
            foreach ($list as $order){
                $order->profit =  $order->order_profit;
                $order->save();
            }
        }
        die('here');*/

        /*$ordersdeleted = DB::table('orders')
            ->whereNotNull('is_deleted')
            ->pluck('id')->all();
        Transaction::whereIn('record_id',$ordersdeleted)
            ->whereIn('transaction_type',['sales','purchase'])
            ->delete();
        dd($ordersdeleted);*/
        //$this->checkUniqId();
        //dd(strtotime('2020-03-15'));
        //DB::table('persons')->truncate();
        //DB::table('transactions')->truncate();
        //Artisan::call('storage:link');

        /*DB::table('persons')->truncate();
        DB::table('transactions')->truncate();
        DB::table('product_store')->update(['qty'=>0,'sale_count'=>0]);
        DB::table('product_unit')->update(['cost_price'=>0,'sale_price'=>0,'gomla_price'=>0,'gomla_gomla_price'=>0]);
        $categ = Category::whereNotIN('id',[1,2,3,4,5,7,9,15])->get();
        foreach ($categ as $c){
            $c->products()->delete();
            $c->delete();
        }
        die('done');*/

        //old store
       /* DB::table('persons')->truncate();
        DB::table('transactions')->truncate();
        DB::table('product_store')->update(['qty'=>0,'sale_count'=>0]);
        $categ = Category::whereNotIN('id',[1,2,3,4,5,8,10,11,12,13,15,26])->get();
        foreach ($categ as $c){
            $c->products()->delete();
            $c->delete();
        }
        die('done');*/

        $expenses = Expense::where('created_at','>=',date('Y-m-d'))->sum('value');
        $ordersList = Order::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('invoice_type,sum(total-discount_value) as grandTotal'))
                    ->groupBy('invoice_type')
                    ->get();
        $todayOrders = $ordersList->where('invoice_type','sales')->first();
        $todayOrders = $todayOrders->grandTotal??0;
        $totdayPurchases = $ordersList->where('invoice_type','purchase')->first();
        $totdayPurchases = $totdayPurchases->grandTotal??0;
        $returnsList = ReturnProduct::where('created_at','>=',date('Y-m-d'))->get();
        $orderReturn = $returnsList->where('return_type','sales');
        $orderReturn = $orderReturn->sum('return_value')??0;
        $purchaseReturn = $returnsList->where('return_type','purchase');
        $purchaseReturn = $purchaseReturn->sum('return_value')??0;
        $data = User::orderByDesc('id')->get();
        $prod=count(Product::all());
        return view('home',compact('todayOrders','expenses', 'totdayPurchases','purchaseReturn','orderReturn','prod'));
    }
    public function summery(){
        $bestSeller = ProductStore::query()->join('products',function($qry){
            $qry->on('product_id','=','products.id');
            $qry->where('is_raw_material',0);
        })
            ->where('sale_count','>',0)
            ->take(7)
            ->orderBy('sale_count','DESC')
            ->groupBy('product_id')
            ->get();

        $gard = ProductUnit::query()->has('product')
            ->select(DB::raw('sum((select sum(qty-sale_count) from product_store
where product_unit.unit_id=product_store.unit_id and
product_store.product_id=product_unit.product_id) * product_unit.cost_price)
 as totalCost'))->first();

        $peopleIds = Person::query()
            ->where('type', 'client')
            ->where('is_client_supplier',0)
            ->pluck('id')
            ->toArray();

        $clientdue = Transaction::query()
            ->where('model_type', Person::class)
            ->whereIn('model_id', $peopleIds)
            ->sum('value');

        $peopleIds = Person::query()
            ->where('type', 'client')
            ->where('is_client_supplier',1)
            ->pluck('id')
            ->toArray();
        //dd($peopleIds);
        $clientsupplierdue = Transaction::query()
            ->where('model_type', Person::class)
            ->whereIn('model_id', $peopleIds)
            ->sum('value');
        //dd($clientsupplierdue);
        $peopleIds = Person::query()
            ->where('type', 'supplier')
            ->where('is_client_supplier',0)
            ->pluck('id')
            ->toArray();

        $supplierdue = Transaction::query()
            ->where('model_type', Person::class)
            ->whereIn('model_id', $peopleIds)
            ->sum('value');

        $peopleIds = Person::query()
            ->where('type', 'supplier')
            ->where('is_client_supplier',1)
            ->pluck('id')
            ->toArray();

        $supplierclientdue = Transaction::query()
            ->where('model_type', Person::class)
            ->whereIn('model_id', $peopleIds)
            ->sum('value');
        //dd($supplierclientdue);

        if($clientsupplierdue > $supplierclientdue){
            $diff = $clientsupplierdue - $supplierclientdue;
            $clientdue += $diff;
        }else{
            $diff = $supplierclientdue - $clientsupplierdue ;
            $supplierdue += $diff;
        }
        $discounts = Order::where('discount','>',0)->get();
        $discountSum = 0;
        foreach ($discounts->where('invoice_type','sales') as $ord){
            if($ord->discount_type==2){
                $discountSum += ($ord->total * ($ord->discount/100));
            }else{
                $discountSum += $ord->discount;
            }
        }
        $discountSum2 = 0;
        foreach ($discounts->where('invoice_type','purchase') as $ord){
            if($ord->discount_type==2){
                $discountSum2 += ($ord->total * ($ord->discount/100));
            }else{
                $discountSum2 += $ord->discount;
            }
        }
        $totalOrders = Order::where('invoice_type','sales')
            ->where('invoice_type','sales')
            ->selectRaw('currency,sum(total) as total')
            ->groupBy('currency')
            ->get()->toArray();
        $totalPurchases = Order::where('invoice_type','purchase')->sum('total');
        $totalPurchases -= $discountSum2;
        //$deposite = TresuryTranaction::where('type','deposite')->sum('value');
        //$withdraw = TresuryTranaction::where('type','withdraw')->sum('value');
        $treasury = $this->getCashMoney();
        //dd($treasury);
        return view('summery',compact('discountSum','treasury','totalOrders','totalPurchases','supplierdue','clientdue','gard','bestSeller'));

    }

    public function closeYear() {
        try {
            $this->cloneDB();
            DB::beginTransaction();
            $balance = array();
            foreach (Person::get() as $person){
                if($person->getTotalDue())
                    $balance[$person->id] = $person->getTotalDue();
            }
            DB::statement("UPDATE product_store SET qty = qty - sale_count,sale_count = 0;");
            DB::table('orders')->truncate();
            DB::table('order_detailes')->truncate();
            DB::table('returns')->truncate();
            DB::table('return_detailes')->truncate();
            DB::table('expenses')->truncate();
            DB::table('tresury_tranactions')->truncate();
            DB::table('bank_transactions')->truncate();
            DB::table('movements')->truncate();
            DB::table('transactions')->truncate();
            $perIds = array_keys($balance);
            $persons = Person::whereIn('id',$perIds)->get();
            foreach ($persons as $person){
                $person->transactions()
                    ->create([
                        'value'=>$balance[$person->id],
                        'note'=>'رصيد سابق'
                    ]);
            }
            DB::commit();
            /*$orginal = "database.sqlite";
            $copy = 'database.sqlite';
            $path = storage_path($orginal);
            \File::copy($path,base_path('public/'.$copy));
            $path = public_path($copy);*/
            //return response()->download($path, date('Y-m-d').'_'.$copy);
            //response()->download($path, date('Y-m-d').'_'.$copy);
            //request()->session()->flash('alert-success', trans('front.Successfully added'));
        } catch (\Exception $e) {
            DB::rollback();
            request()->session()->flash('alert-danger', trans('app.Some Error was ocuured during opertion!').$e->getMessage());
        }
        return route('home');

    }
    public function cloneDB(){
        $orginal = "database.sqlite";
        $path = storage_path($orginal);
        $copy = date('Y-m-d').'_cloneDB_database.sqlite';
        \File::copy($path,base_path('public/'.$copy));
    }
    public function backup() {
        $orginal = "database.sql";
        $copy = 'database.sql';

        if(session('mydbcon') == 'sqlite2'){
            $orginal = "database2.sqlite";
            $copy = 'db2.sqlite';
        }
        //$copy = date('Y-m-d').$copy;
        $path = storage_path($orginal);
        \File::copy($path,base_path('public/'.$copy));
        $path = public_path($copy);
        return response()->download($path, date('Y-m-d').'_'.$copy);
    }


    public function cleanDB() {
        $this->cloneDB();
        $users = \App\User::get();
        $settings = Setting::get();
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
        \DB::table('users')->truncate();
        \DB::table('settings')->truncate();
        //$roles = Role::get()->pluck('id')->toArray();
        foreach ($users as $user){
            if(optional($user->roles()->first())->id) {
                \App\User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'remember_token' => str_random(10)
                ]);
            }
        }
        foreach ($settings as $set){
            Setting::create([
                'name'=>$set->name,
                'key'=>$set->key,
                'value'=>$set->value,
            ]);
        }
        request()->session()->flash('alert-success', 'تم مسح كل البيانات بنجاح ');
        return route('home');// redirect(route('home',request('clientId')));
    }

    public function migrate() {
        Artisan::call('migrate');
        request()->session()->flash('alert-success', 'تم دمج الدتابيز بنجاح');
        return redirect(route('home'));
    }

    public function clearCache() {
        $ordersdeleted = DB::table('orders')
            ->whereNotNull('deleted_at')
            ->pluck('id')
            ->all();
        Transaction::whereIn('record_id',$ordersdeleted)
            ->whereIn('transaction_type',['sales','purchase'])
            ->delete();
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('storage:link');
        request()->session()->flash('alert-success', 'تم مسح الكاش بنجاح ');
        return redirect(route('home'));
    }

    public function restore(Request $request) {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            if(session('mydbcon') == 'sqlite2'){
                $file->storeAs('', 'database2.sqlite');
            } else {
                $file->storeAs('', 'database.sqlite', ['disk' => 'local']);
            }
            $request->session()->flash('alert-success', 'تم إسترجاع نسخة البيانات بنجاح');
            \DB::reconnect();
            Artisan::call('migrate');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            return redirect(route('home'));
        }
        return view('restore');
    }

    public function developer() {
        return view('developer');
    }

    public function dailyreport(Request $req)
    {
        $from = $req->fromdate;
        $to = $req->todate;
        $transactions = BankTransaction::query();
        $orders = Order::query();
        $orders->where('invoice_type','sales');
        $purchase = Order::query();
        $purchase->where('invoice_type','<>','sales');
        $salesReturns = ReturnProduct::query();
        $salesReturns->where('return_type','sales');
        $purchaseReturns = ReturnProduct::query();
        $purchaseReturns->where('return_type','<>','sales');
        if($from) {
            $orders->whereRaw("DATE(invoice_date) >= '{$from}'");
            $purchase->whereRaw("DATE(invoice_date) >= '{$from}'");
            $salesReturns->whereRaw("DATE(return_date) >= '{$from}'");
            $purchaseReturns->whereRaw("DATE(return_date) >= '{$from}'");
            $transactions->whereRaw("DATE(op_date) >= '{$from}'");
        }
        if($to) {
            $orders->whereRaw("DATE(invoice_date) <= '{$to}'");
            $purchase->whereRaw("DATE(invoice_date) <= '{$to}'");
            $salesReturns->whereRaw("DATE(return_date) <= '{$to}'");
            $purchaseReturns->whereRaw("DATE(return_date) <= '{$to}'");
            $transactions->whereRaw("DATE(op_date) <= '{$to}'");
        }
        $salesOrders = clone $orders;
        $purchaseOrders = clone $purchase;
        $salesOrders = $salesOrders->get();
        $purchaseOrders = $purchaseOrders->get();
        $sumDiscount = $salesOrders->sum(function($item) {
            return $item->dicount_value;
        });
        $sumOrdersDiscount = $sumDiscount?:0;
        $sumDiscount = $purchaseOrders->sum(function($item) {
            return $item->dicount_value;
        });
        $sumPurchaseDiscount = $sumDiscount?:0;

        $orders->selectRaw('sum(total-discount_value) as grandTotal,sum(due) as totalDue,sum(paid) as totalPaid,count(id) as OrdersCount');
        //$orders->where('due','>=',0);
        $purchase->selectRaw('sum(total-discount_value) as grandTotal,sum(due) as totalDue,sum(paid) as totalPaid,count(id) as OrdersCount');
        $purchase = $purchase->first();
        $orders = $orders->first();
        $transactions->selectRaw('sum(value) as totalSum,transactionable_type,type');
        $transactions->groupBy(['transactionable_type','type']);
        $transactions = $transactions->get();
        //dd($transactions);
        $clientPayments = $transactions->where('transactionable_type',Person::class)
            ->where('type',2)->first();
        $supplierPayments = $transactions->where('transactionable_type',Person::class)
            ->where('type',1)->first();
        $expenses = $transactions->where('transactionable_type',Expense::class)
            ->where('type',1)->first();
        $supplierOrders = $transactions->where('transactionable_type',Order::class)
            ->where('type',1)->first();
        $clientOrders = $transactions->where('transactionable_type',Order::class)
            ->where('type',2)->first();
        $withdraw = $transactions->where('transactionable_type',Bank::class)
            ->where('type',1)->first();
        $desposite = $transactions->where('transactionable_type',Bank::class)
            ->where('type',2)->first();
        $clientPayments = $clientPayments->totalSum??0;
        $supplierPayments = $supplierPayments->totalSum??0;
        $expenses = $expenses->totalSum??0;
        $supplierOrders = $supplierOrders->totalSum??0;
        $clientOrders = $clientOrders->totalSum??0;
        $desposite = $desposite->totalSum??0;
        $withdraw = $withdraw->totalSum??0;
        return view('day_report',compact('purchase'),['transactions'=>$transactions,
                                        'orders'=>$orders,
                                        'clientPayments'=>$clientPayments,
                                        'supplierPayments'=>$supplierPayments,
                                        'expenses'=>$expenses,
                                        'supplierOrders'=>$supplierOrders,
                                        'clientOrders'=>$clientOrders,
                                        'withdraw'=>$withdraw,
                                        'desposite'=>$desposite,
                                        'balance'=>$this->getCashMoney(),
                                        'purchase'=>$purchase,
                                        'salesReturns'=>$salesReturns,
                                        'purchaseReturns'=>$purchaseReturns
                                        ]);
    }


    public function getCashMoney() {
        $banks =Bank::selectRaw('sum(balance) as totalBalance')->first();
        $money = $banks->totalBalance??0;
        return $money;
    }

    public function profit(Request $req){
        $from = $req->fromdate;
        $to = $req->todate;
        $Transationdiscount = Transaction::query()->where('note','=','خصم اضافى عند التحصيل');
        $totalProfit = Order::where('invoice_type','sales');
        $discounts = Order::where(function($q){
            $q->orwhere('commision','<>',0);
        });
        $returnDiscounts = ReturnProduct::where('discount','>',0);
        $generalExpenses = Expense::whereNull('partner_id');
        $returns = ReturnDetail::join('returns','returns.id','=','return_id')
                        ->where('return_type','sales')
                        ->whereNull('deleted_at')
                        ->select(DB::raw('sum(qty*price - qty*cost) as totalRetutn'));
                        //->groupBy('currency');
        if($from){
            $totalProfit->whereRaw("DATE(orders.invoice_date) >= '{$from}'");
            $returns->whereRaw("DATE(returns.created_at) >= '{$from}'");
            $generalExpenses->whereRaw("DATE(created_at) >= '{$from}'");
            $discounts->whereRaw("DATE(created_at) >= '{$from}'");
            $returnDiscounts->whereRaw("DATE(created_at) >= '{$from}'");
            $Transationdiscount->whereRaw("DATE(created_at) >= '{$from}'");

        }
        if($to){
            $totalProfit->whereRaw("DATE(orders.invoice_date) <= '{$to}'");
            $returns->whereRaw("DATE(returns.created_at) <= '{$to}'");
            $generalExpenses->whereRaw("DATE(created_at) <= '{$to}'");
            $discounts->whereRaw("DATE(created_at) <= '{$to}'");
            $returnDiscounts->whereRaw("DATE(created_at) <= '{$to}'");
            $Transationdiscount->whereRaw("DATE(created_at) <= '{$to}'");
        }
        $totalProfit = $totalProfit->sum('profit');
        $discountSum = abs($Transationdiscount->sum('value'));
        foreach ($discounts->get() as $ord){
            $discountSum += $ord->commision_egp;
        }
        $totalRetrunDiscount = 0;
        foreach ($returnDiscounts->get() as $ret){
            if($ret->discount_type==0){
                $totalRetrunDiscount += $ret->discount;
            }else{
                $totalRetrunDiscount += ($ret->total * ($ret->discount/100));
            }
        }
        $returns = $returns->first();
        $returns = $returns->totalRetutn;
        $generalExpenses = $generalExpenses->sum('value');
        $totalProfit = round($totalProfit,2);
        //$totalProfit -= ($discountSum+$totalRetrunDiscount+$returns);
        $totalProfit -= ($discountSum+$totalRetrunDiscount);
        $grandProfit = $totalProfit - $generalExpenses;
        $partners = Partner::get();
        return view('reports.profit',compact('totalProfit', 'grandProfit','partners','generalExpenses'));
    }
   
    public function sync(Request $req)
    {
        $url = Setting::findByKey('onlineurl');
        if($url) {
            try {
                if ($req->isMethod('post')) {
                    $state = false;
                    if ($file = $req->file('file')) {
                        $state = $file->storeAs('', 'database.sql', ['disk' => 'local']);
                    }
                    return $state;
                } else {
                    $client = new \GuzzleHttp\Client();
                    $apiUrl = $url . "/sync";
                    $response = $client->post(url($apiUrl), [
                        'multipart' => [
                            [
                                'name' => 'file',
                                'contents' => file_get_contents(storage_path("database.sql")),
                                'filename' => 'database.sql'
                            ]
                        ],
                    ]);
                    $result = $response->getBody()->getContents();
                    if ($result) {
                        return back()->with('alert-success', 'Data was successfully synchronized');
                    } else {
                        return back()->with('alert-error', 'Error Occurred During Sync');
                    }
                }
            } catch (\Exception $e) {
                return back()->with('alert-error', 'Error Occurred');
                dd($e->getMessage());
            }
        }

    }
    public function closeshift(Request $request){
        $usertresury =  auth()->user()->treasury;
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $inputs = $request->except('_token');
                $usertresury->balance -= $inputs['value'];
                $usertresury->save();
                $withdraw = $inputs;
                $withdraw['type'] = 1;
                $withdraw['transactionable_type'] = Bank::class;
                $withdraw['transactionable_id'] = $usertresury->id;
                $withdraw['bank_id'] = $usertresury->id;
                BankTransaction::create($withdraw);
                if($inputs['bank_id']) {
                    $bank = Bank::find($inputs['bank_id']);
                    $balance = $bank->balance;
                    $bank->balance += $inputs['value'];
                    $bank->save();
                    $inputs['note'] = "ترحيل الوردية من " . $usertresury->name;
                    $inputs['type'] = 2;
                    $inputs['transactionable_type'] = Bank::class;
                    $inputs['transactionable_id'] = $bank->id;
                    $inputs['total'] = $balance;
                    $inputs['due'] = $bank->balance;
                    BankTransaction::create($inputs);
                }
                DB::commit();
            }catch (\Exception $e){
                DB::rollBack();
                dd($e->getMessage());
                return back()->with('alert-error', 'Error Occurred');
            }
            return back()->with('alert-success', 'Shift was Closed Succssfuly');
        }
        $cash = $usertresury->balance;
        $banks = Bank::where('id','<>',$usertresury->id)->get();
        return view('closeshift',compact('cash','banks'));
    }

    public function importProduct()
    {
        DB::table('products')->truncate();
        DB::table('persons')->truncate();
        Person::create(["name"=>"عميل كاش",'type'=>'client','priceType'=>'one']);
        Person::create(["name"=>"مورد كاش",'type'=>'supplier','priceType'=>'one']);
        $file = public_path('products.xls');
        Excel::import(new ProductsImport(), $file);

        $file = public_path('clients.xls');
        Excel::import(new ClientsImport(), $file);

        $file = public_path('suppliers.xls');
        Excel::import(new SuppliersImport(), $file);

        return redirect('/')->with('success', 'All good!');
    }
}
