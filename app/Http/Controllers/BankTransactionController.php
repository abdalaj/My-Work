<?php

namespace App\Http\Controllers;

use App\bank;
use App\bankTransaction;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = bankTransaction::orderBy('id','desc')->get();
        $banks = bank::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.banktransaction',compact('data','banks','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(bankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(bankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(bankTransaction $bankTransaction)
    {
        //
    }
}
