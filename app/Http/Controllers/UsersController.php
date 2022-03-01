<?php

namespace App\Http\Controllers;

use App\bank;
use App\log;
use App\store;
use App\User;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $bank = bank::get();
        $store = Store::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('users.index',compact('data','bank','store','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = bank::get();
        $store = store::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('users.create',compact('bank','store','roles'));
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=[
            'name' => $request['name'],
            'email' => $request['email'],
            'bank_id' => $request['bank_id'],
            'store_id' => $request['store_id'],
            'reminder' => $request['password'],
            'password' => Hash::make($request['password']),
        ];
        User::create($input);
        $log = [
            'name'=>' تم انشاء مستخدم جديد باسم '.$request->name,
            'user'=>Auth::user()->name,
            'type'=>' انشاء مستخدم',
        ];
        log::create($log);
        $request->session()->flash('add', 'done!');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    // public function show(user $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = User::where('id',$id)->get();
        $bank = bank::get();
        $store = store::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('users.edit',compact('data','bank','store','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $olddata = User::find($id);
        $log = [
            'name'=>' تم التعديل في مستخدم باسم '.$olddata->name,
            'user'=>Auth::user()->name,
            'type'=>' تعديل مستخدم',
        ];
        log::create($log);
        $olddata->name = $request->name;
        $olddata->email = $request->email;
        $olddata->password = Hash::make($request->password);
        $olddata->reminder = $request->password;
        $olddata->bank_id = $request->bank_id;
        $olddata->store_id = $request->store_id;

        $olddata->save();
        $request->session()->flash('edit', 'done!');
        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $log = [
            'name'=>' تم حذف مستخدم باسم '.User::findOrFail($id)->name,
            'user'=>Auth::user()->name,
            'type'=>' حذف مستخدم',
        ];
        log::create($log);
        User::findOrFail($id)->delete();
        return redirect('users');
    }

}
