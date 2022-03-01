<?php

namespace App\Http\Controllers;

use App\bank;
use App\expenses;
use App\log;
use App\prushes;
use App\shorka;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expences = expenses::get();
        $prushes = prushes::get();
        $bank = bank::get();
        $shorka = shorka::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('expenses.index',compact('expences','prushes','bank','roles','shorka'));
    }

    /**
     * create the specified resource from storage.
     *
     * @param  \App\expences  $expences
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prushes = prushes::get();
        $bank = bank::get();
        $shorka = shorka::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('expenses.create',compact('bank','prushes','shorka','roles'));
    }

    /**
     * Pay the specified resource from storage.
     *
     * @param  \App\expences  $expences
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prushes_name = prushes::find($request->prushes_id)->name;
        $bank = bank::find(Auth::user()->bank_id);
        $log = [
            'name'=>' تم دفع مصروف باسم ' . $prushes_name . ' بواسطة ' . Auth::user()->name . ' بقيمة ' . $request->mony . ' من خزنة ' . $bank->name ,
            'user'=>Auth::user()->name,
            'type'=>'دفع مصروف ',
        ];
        $mony = $request->mony;
        $bank->amount = $bank->amount - $mony;
        $bank->save();
        log::create($log);
        expenses::create($request->all());
        request()->session()->flash('add', 'done!');
        return redirect('expenses');
    }
    /*
     * Display the specified resource.
     *
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data = expenses::where('prushes_id',$id)->get();
        $prushes = prushes::get();
        $bank = bank::get();
        $shorka = shorka::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('expenses.details',compact('data','prushes','bank','roles','shorka'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = expenses::where('id',$id)->get();
        $bank = bank::get();
        $shorka = shorka::get();
        $prushes = prushes::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('expenses.edit',compact('data','bank','prushes','shorka','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata = expenses::find($id);
        $bank = bank::find(Auth::user()->bank_id);
        $prushes_name = prushes::find($request->prushes_id)->name;
        if ($request->mony > $olddata->mony) {
            $bank_mony = $request->mony - $olddata->mony;
            $bank->amount = $bank->amount - $bank_mony;
            $log = [
                'name'=>' تم تعديل مصروف باسم ' . $prushes_name .' بواسطة ' . Auth::user()->name . ' وتغيير قيمته من ' . $olddata->mony . ' الي ' . $request->mony . ' وخصم ' .$bank_mony . ' من خزنة ' . $bank->name,
                'user'=>Auth::user()->name,
                'type'=>'تعديل مصروف ',
            ];
            log::create($log);
        }elseif($request->mony < $olddata->mony){
            $bank_mony = $olddata->mony - $request->mony;
            $bank->amount = $bank->amount + $bank_mony;
            $log = [
                'name'=>' تم تعديل مصروف باسم ' . $prushes_name .' بواسطة ' . Auth::user()->name . ' وتغيير قيمته من ' . $olddata->mony . ' الي ' . $request->mony . ' واضافة ' . $bank_mony . ' لخزنة ' . $bank->name,
                'user'=>Auth::user()->name,
                'type'=>'تعديل مصروف ',
            ];
            log::create($log);
        }
        $bank->save();
        $olddata->name = $request->name;
        $olddata->bank_id = $request->bank_id;
        $olddata->prushes_id = $request->prushes_id;
        $olddata->prushes_type = $request->prushes_type;
        $olddata->date = $olddata->date;
        $olddata->mony = $request->mony;
        $olddata->save();

        request()->session()->flash('edit', 'done!');
        return redirect('expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $olddata = expenses::find($id);
        $oldbank = bank::find($olddata->bank_id);
        $log = [
            'name'=>' تم حذف مصروف مدفوع باسم ' . $olddata->name . ' بواسطة ' . Auth::user()->name . ' وارجاع مبلغ ' . $olddata->mony . ' الي خزنة ' . $oldbank->name,
            'user'=>Auth::user()->name,
            'type'=>'حذف مصروف مدفوع',
        ];
        log::create($log);
        $oldbank->amount = $oldbank->amount + $olddata->mony;
        $oldbank->save();
        $olddata->delete();

        return redirect()->back();
    }
}
