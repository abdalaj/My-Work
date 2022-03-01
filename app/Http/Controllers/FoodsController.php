<?php

namespace App\Http\Controllers;

use App\foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class foodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('powers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=foods::orderByDesc('id')->where('user_item_id',Auth::user()->id)->get();
        if (Auth::user()->gender == 'admin' && Auth::user()->type == 'الكل') {
            $data=foods::orderByDesc('id')->get();
        }
        return view('foods.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods.create');
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
            'price'=>'required',
            'summry'=>'required',
            'number'=>'required',
            'describ'=>'required',
            'discount'=>'required',
            'saler'=>'required',
            'stauts'=>'required',
            'size'=>'required',
            'address'=>'required',
            'installment'=>'required',
            'securty'=>'required',
            'charge'=>'required',
            'imghome'=>'required',
            'img1'=>'required',
            'img2'=>'required',
            'img3'=>'required',
            'img4'=>'required',
            'img5'=>'required',
            'img6'=>'required',
            'user_item_id'=>'required'
        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',
            'price.required'=>'من فضلك اكتب السعر ',
            'summry.required'=>'اكتب ملخص بسيط جدا عن المنتج',
            'number.required'=>'من فضلك اكتب الكميه المتاحه عندك',
            'describ.required'=>'من فضلك اكتب وصف كامل عن المنتج',
            'discount.required'=>'من فضلك اكتب السعر بعد الخصم',
            'saler.required'=>'من فضلك اكتب اسم متجرك',
            'stauts.required'=>'من فضلك اكتب حالة المنتج',
            'size.required'=>'من فضلك اكتب حجم المنتج',
            'address.required'=>'من فضلك اكتب عنوان متجرك',
            'installment.required'=>'من فضلك اكتب هل التقسيط متاح ولا لا',
            'securty.required'=>'من فضلك اكتب مدة الضمان',
            'charge.required'=>'من فضلك اكتب هل يتوفر الشحن ولا لا',
            'imghome.required'=>'من فضلك ادخل الصورة الرئيسيه',
            'img1.required'=>'من فضلك ادخل الصوره الاولي',
            'img2.required'=>'من فضلك ادخل الصوره الثانيه ',
            'img3.required'=>'من فضلك ادخل الصوره الثالثه',
            'img4.required'=>'من فضلك ادخل الصوره الرابعه',
            'img5.required'=>'من فضلك ادخل الصوره الخامسه',
            'img6.required'=>'من فضلك ادخل الصوره السادسه',
            'user_item_id'=>'من فضلك اكتب رقم الاي دي الخاص بك',
        ]
    );
        $input=[
            'name'=>$request->name,
            'price'=>$request->price,
            'summry'=>$request->summry,
            'number'=>$request->number,
            'describ'=>$request->describ,
            'discount'=>$request->discount,
            'saler'=>$request->saler,
            'stauts'=>$request->stauts,
            'size'=>$request->size,
            'address'=>$request->address,
            'installment'=>$request->installment,
            'securty'=>$request->securty,
            'charge'=>$request->charge,
            'user_item_id'=>$request->user_item_id,
        ];
        $imghome=$request->file('imghome');
        if ($imghome) {
            $filename=$imghome->getClientOriginalExtension();
            $filename="myimage".uniqid().".".$filename;
            $imghome->move('images/foods/',$filename);
            $input['imghome']=$filename;
        }
        $img1=$request->file('img1');
        if ($img1) {
            $filename1=$img1->getClientOriginalExtension();
            $filename1="myimage".uniqid().".".$filename1;
            $img1->move('images/foods/',$filename1);
            $input['img1']=$filename1;
        }
        $img2=$request->file('img2');
        if ($img2) {
            $filename2=$img2->getClientOriginalExtension();
            $filename2="myimage".uniqid().".".$filename2;
            $img2->move('images/foods/',$filename2);
            $input['img2']=$filename2;
        }
        $img3=$request->file('img3');
        if ($img3) {
            $filename3=$img3->getClientOriginalExtension();
            $filename3="myimage".uniqid().".".$filename3;
            $img3->move('images/foods/',$filename3);
            $input['img3']=$filename3;
        }
        $img4=$request->file('img4');
        if ($img4) {
            $filename4=$img4->getClientOriginalExtension();
            $filename4="myimage".uniqid().".".$filename4;
            $img4->move('images/foods/',$filename4);
            $input['img4']=$filename4;
        }
        $img5=$request->file('img5');
        if ($img5) {
            $filename5=$img5->getClientOriginalExtension();
            $filename5="myimage".uniqid().".".$filename5;
            $img5->move('images/foods/',$filename5);
            $input['img5']=$filename5;
        }
        $img6=$request->file('img6');
        if ($img6) {
            $filename6=$img6->getClientOriginalExtension();
            $filename6="myimage".uniqid().".".$filename6;
            $img6->move('images/foods/',$filename6);
            $input['img6']=$filename6;
        }
        foods::create($input);
        return redirect('foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = foods::where('id',$id)->get();
        return view('foods/details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = foods::where('id',$id)->get();
        return view('foods.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'summry'=>'required',
            'number'=>'required',
            'describ'=>'required',
            'discount'=>'required',
            'saler'=>'required',
            'stauts'=>'required',
            'size'=>'required',
            'address'=>'required',
            'installment'=>'required',
            'securty'=>'required',
            'charge'=>'required',
            'imghome'=>'required',
            'img1'=>'required',
            'img2'=>'required',
            'img3'=>'required',
            'img4'=>'required',
            'img5'=>'required',
            'img6'=>'required',
            'user_item_id'=>'required'
        ],[
            'name.required'=>'من فضلك اكتب اسم المنتج',
            'price.required'=>'من فضلك اكتب السعر ',
            'summry.required'=>'اكتب ملخص بسيط جدا عن المنتج',
            'number.required'=>'من فضلك اكتب الكميه المتاحه عندك',
            'describ.required'=>'من فضلك اكتب وصف كامل عن المنتج',
            'discount.required'=>'من فضلك اكتب السعر بعد الخصم',
            'saler.required'=>'من فضلك اكتب اسم متجرك',
            'stauts.required'=>'من فضلك اكتب حالة المنتج',
            'size.required'=>'من فضلك اكتب حجم المنتج',
            'address.required'=>'من فضلك اكتب عنوان متجرك',
            'installment.required'=>'من فضلك اكتب هل التقسيط متاح ولا لا',
            'securty.required'=>'من فضلك اكتب مدة الضمان',
            'charge.required'=>'من فضلك اكتب هل يتوفر الشحن ولا لا',
            'imghome.required'=>'من فضلك ادخل الصورة الرئيسيه',
            'img1.required'=>'من فضلك ادخل الصوره الاولي',
            'img2.required'=>'من فضلك ادخل الصوره الثانيه ',
            'img3.required'=>'من فضلك ادخل الصوره الثالثه',
            'img4.required'=>'من فضلك ادخل الصوره الرابعه',
            'img5.required'=>'من فضلك ادخل الصوره الخامسه',
            'img6.required'=>'من فضلك ادخل الصوره السادسه',
            'user_item_id'=>'من فضلك اكتب رقم الاي دي الخاص بك',
        ]
    );
        $olddata=foods::find($id);
        $olddata->name=$request->name;
        $olddata->price=$request->price;
        $olddata->summry=$request->summry;
        $olddata->number=$request->number;
        $olddata->imghome=$request->imghome;
        $olddata->img1=$request->img1;
        $olddata->img2=$request->img2;
        $olddata->img3=$request->img3;
        $olddata->img4=$request->img4;
        $olddata->img5=$request->img5;
        $olddata->img6=$request->img6;
        $olddata->describ=$request->describ;
        $olddata->discount=$request->discount;
        $olddata->saler=$request->saler;
        $olddata->stauts=$request->stauts;
        $olddata->size=$request->size;
        $olddata->address=$request->address;
        $olddata->installment=$request->installment;
        $olddata->securty=$request->securty;
        $olddata->charge=$request->charge;
        $olddata->user_item_id=$request->user_item_id;
        $olddata->save();
        return redirect("foods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\foods  $foods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = foods::findOrFail($id);
        //base_path();
        File::delete(base_path("images/foods/{$data->imghome}"));
        File::delete(base_path("images/foods/{$data->img1}"));
        File::delete(base_path("images/foods/{$data->img2}"));
        File::delete(base_path("images/foods/{$data->img3}"));
        File::delete(base_path("images/foods/{$data->img4}"));
        File::delete(base_path("images/foods/{$data->img5}"));
        File::delete(base_path("images/foods/{$data->img6}"));

        foods::findOrFail($id)->delete();
        return redirect('foods');

    }
}
