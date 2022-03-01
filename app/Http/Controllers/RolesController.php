<?php

namespace App\Http\Controllers;

use App\roles;
use App\store;
use App\User;
use App\userroles;
use App\log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request,$id)
    {
        if ($request->roles_id==Null) {
            userroles::where('user_id',$id)->delete();
        }else{
            for ($i=0; $i < count($request->roles_id); $i++) {
                $input[$i] = [
                    'user_id'=>$request->user_id,
                    'roles_id'=>$request->roles_id[$i]
                ];
                userroles::create($input[$i]);
            }
            $log = [
                'name'=>' تم التعديل في صلاحيات المستخدم رقم ' . $request->user_id . " صاحب الاسم " . User::find($request->user_id)->name,
                'user'=>Auth::user()->name,
                'type'=>'تعديل صلاحيات'
            ];
            log::create($log);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $userRoles = userroles::where('user_id',$data->id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('roles.index',compact('data','userRoles','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        userroles::where('user_id',$id)->delete();
        $this->store($request,$id);
        $request->session()->flash('add', 'done!');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(roles $roles)
    {
        //
    }
}
