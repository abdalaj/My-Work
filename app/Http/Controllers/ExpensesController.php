<?php
namespace App\Http\Controllers;
use App\Bank;
use App\BankTransaction;
use App\Expense;
use App\ExpensesType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{

    public function index()
    {
        $type_id = request('type');
        if($type_id){
            if($type_id=='all'){
                $expenses = Expense::latest()->get();
                $title = 'كل المصروفات';
            }else{
                $type = ExpensesType::find($type_id);
                $title = $type->name;
                $expenses = Expense::where('expenses_type_id',request('type'))->latest()->get();
            }
            return view('expenses.list',compact('expenses','title'));
        }
        $expenses = Expense::join('expenses_type',function($qry){
            $qry->on('expenses_type.id','=','expenses_type_id');
        })->select(DB::raw('expenses_type.id,expenses_type.name,sum(value) as total'))
            ->groupBy('expenses_type.id')
            ->get();
        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $expense = new Expense;
        $employee_id = $request->employee_id;
        return view('expenses.create',compact('expense','employee_id'));
    }

    /**
     * Expense a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $expense = Expense::create($inputs);
        $bankId = $request->bank_id;
        activity()
            ->performedOn($expense)
            ->log("إضافة مصروف بقيمة ".$expense->value);
        if ($bankId) {
            $trans["bank_id"] = $bankId;
            $bank = Bank::find($bankId);
            $trans["op_date"] = date('Y-m-d');
            $trans["total"] = $bank->balance;
            $grand = currency($inputs['value'], currency()->getUserCurrency(), $bank->currency, $format = false);
            $note = 'المصروفات  | ' . $request->note;
            $trans["due"] = $bank->balance - $grand;
            $bank->balance -= $grand;
            $trans["type"] = "1";
            $trans["note"] = $note;
            $trans["value"] = $grand;
            $bank->save();
            $expense->transaction()->create($trans);
        }
        return redirect(route('expenses.index'))->with('alert-success', trans('front.Successfully added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $employee_id = $expense->employee_id;
        return view('expenses.edit',compact('expense','employee_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $inputs = $request->except('_token');
        if($inputs['employee_id']){
            $inputs['partner_id'] = null;
        }
        $expense->update($inputs);
        $bankId = $request->bank_id;
        if ($bankId) {
            $oldtrans = $expense->transaction;
            if($oldtrans){
                $oldtrans->bank->balance += $oldtrans->getOriginal('value');
                $oldtrans->bank->save();
            }
            $trans["bank_id"] = $bankId;
            $bank = Bank::find($bankId);
            $trans["op_date"] = date('Y-m-d');
            $trans["total"] = $bank->balance;
            $grand = currency($inputs['value'], currency()->getUserCurrency(), $bank->currency, $format = false);
            $note = 'المصروفات  | ' . $request->note;
            $trans["due"] = $bank->balance - $grand;
            $bank->balance -= $grand;
            $trans["type"] = "1";
            $trans["note"] = $note;
            $trans["value"] = $grand;
            $bank->save();
            $expense->transaction()->update($trans);
        }
        return redirect(route('expenses.index'))->with('alert-success', trans('front.Modified successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        if($expense->delete()){
            return "done";
        }
        return "failed";
    }


}
