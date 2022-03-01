<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('powers');
        $this->middleware('gender');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=user::orderByDesc('id')->get();
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'name_market'=>'required',
            'remind'=>'required',
            'NationalId'=>'required|unique:users',
            'type'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'active'=>'required',

        ],[
            'name.required'=>'من فضلك اكتب اسم البائع',
            'name_market.required'=>'من فضلك اكتب اسم المحل',
            'remind.required'=>'من فضلك اكتب  كلمة السر',
            'address.required'=>'من فضلك اكتب العنوان ',
            'NationalId.required'=>'من فضلك اكتب الرقم القومي',
            'type.required'=>'من فضلك اختر نوع المنتجات ',
            'gender.required'=>'من فضلك اختر الصلاحيات',
            'email.required'=>'من فضلك اكتب البريد الالكتروني',
            'email.unique'=>'البريد موجود من قبل',
            'NationalId.unique'=>'الرقم القومي موجود من قبل',
            'phone.unique'=>'رقم الهاتف مطلوب',
            'active.unique'=>'يرجي اختيار حالة تفعيل الايميل',
        ]
    );

        $input=[
            'name'=>$request->name,
            'email'=>$request->email,
            'name_market'=>$request->name_market,
            'NationalId'=>$request->NationalId,
            'remind'=>$request->remind,
            'password'=> Hash::make($request->password),
            'type'=>$request->type,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'active'=>$request->active,
            'ip'=>$request->ip,
        ];

        user::create($input);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = user::where('id',$id)->get();
        return view('user/details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = user::where('id',$id)->get();
        return view('user.edit',compact('data'));
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
        $request->validate([
                'name'=>'required',
                'email'=>'required',
                'name_market'=>'required',
                'remind'=>'required',
                'NationalId'=>'required',
                'type'=>'required',
                'gender'=>'required',
                'address'=>'required',
            ],[
                'name.required'=>'من فضلك اكتب اسم البائع',
                'name_market.required'=>'من فضلك اكتب اسم المحل',
                'remind.required'=>'من فضلك اكتب  كلمة السر',
                'address.required'=>'من فضلك اكتب العنوان ',
                'NationalId.required'=>'من فضلك اكتب الرقم القومي',
                'type.required'=>'من فضلك اختر نوع المنتجات ',
                'gender.required'=>'من فضلك اختر الصلاحيات',
                'email.required'=>'من فضلك اكتب البريد الالكتروني',
            ]
        );

        $olddata=user::find($id);
        $olddata->name=$request->name;
        $olddata->email=$request->email;
        $olddata->remind=$request->remind;
        $olddata->password=Hash::make($request->password);
        $olddata->gender=$request->gender;
        $olddata->type=$request->type;
        $olddata->name_market=$request->name_market;
        $olddata->NationalId=$request->NationalId;
        $olddata->address=$request->address;
        $olddata->active=$request->active;
        $olddata->phone=$request->phone;
        $olddata->ip=$request->ip;
        $olddata->save();
        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::findOrFail($id)->delete();
        return redirect('users');
    }
}
