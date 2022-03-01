<?php

namespace App\Http\Controllers;

use App\bank;
use App\bankTransaction;
use App\log;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = bank::where('id',Auth::user()->bank_id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('bank.index',compact('data','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('bank.create',compact('roles'));
    }

    /**
     * bank a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=[
            'name'=>$request->name,
            'amount'=>$request->amount
        ];
        bank::create($input);
        $log = [
            'name'=>' تم انشاء خزنه '.$request->name,
            'user'=>Auth::user()->name,
            'type'=>' انشاء خزنه',
        ];
        log::create($log);
        $request->session()->flash('add', 'done!');
        return redirect('bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = bank::where('id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('bank.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $olddata = bank::find($id);
        $log = [
            'name'=>' تم تعديل خزنه '.$olddata->name,
            'user'=>Auth::user()->name,
            'type'=>' تعديل خزنه',
        ];
        log::create($log);
        $olddata->name=$request->name;
        $olddata->amount=$request->amount;
        $olddata->save();

        $request->session()->flash('edit', 'done!');
        return redirect('bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = [
            'name'=>' تم حذف خزنه '.bank::find($id)->name,
            'user'=>Auth::user()->name,
            'type'=>' حذف خزنه',
        ];
        log::create($log);
        bank::find($id)->delete();

        return redirect('bank');
    }

    /**
     * getmony the specified resource from storage.
     *
     * @param  \App\bank  $supplier
     * @return \Illuminate\Http\Response
     */
    public function banktransaction($id,Request $request)
    {
        // return $request->all();
        $oldbank = bank::find($id);
        $oldbank->amount = $request->amount_after;
        $bankTransaction = [
            'name'=>$request->name,
            'mony'=>$request->mony,
            'whoadd'=>$request->whoadd,
            'type'=>$request->type,
            'amount_after'=>$request->amount_after,
            'bank_id'=>$request->bank_id,
        ];
        $transaction_type = $request->type;
        if ($transaction_type == 1) {

            $log = [
                'name' => ' تم السحب من خزنه رقم ' . $id . ' باسم ' . bank::findOrFail($id)->name . ' مبلغ قدره ' . $request->mony . ' بواسطة ' . Auth::user()->name,
                'user' => Auth::user()->name,
                'type' => 'سحب من خزنه',
            ];

        }elseif($transaction_type == 2){

            $log = [
                'name' => ' تم الايداع في خزنه رقم ' . $id . ' باسم ' . bank::findOrFail($id)->name . ' مبلغ قدره ' . $request->mony . ' بواسطة ' . Auth::user()->name,
                'user' => Auth::user()->name,
                'type' => 'الايداع في خزنه',
            ];
        }
        $oldbank->save();
        log::create($log);
        bankTransaction::create($bankTransaction);
        request()->session()->flash('add', 'done!');

        return redirect()->back();
    }
}
