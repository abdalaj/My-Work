<?php

namespace App\Http\Controllers;

use App\imgHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImgHomeController extends Controller
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
        $data=imghome::orderByDesc('id')->get();
        return view('homeimg.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeimg.create');
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

            'img1'=>'required',
            'img2'=>'required',
            'img3'=>'required',
            'img4'=>'required',
            'img5'=>'required',
            'img6'=>'required',
            'img7'=>'required',
            'img8'=>'required',
            'img9'=>'required',
            'img10'=>'required',
            'img11'=>'required'
        ],[

            'img1.required'=>'من فضلك ادخل الصوره الاولي',
            'img2.required'=>'من فضلك ادخل الصوره الثانيه ',
            'img3.required'=>'من فضلك ادخل الصوره الثالثه',
            'img4.required'=>'من فضلك ادخل الصوره الرابعه',
            'img5.required'=>'من فضلك ادخل الصوره الخامسه',
            'img6.required'=>'من فضلك ادخل الصوره السادسه',
            'img7.required'=>'من فضلك ادخل الصوره السابعه',
            'img8.required'=>'من فضلك ادخل الصوره الثامنه',
            'img9.required'=>'من فضلك ادخل الصوره التاسعه',
            'img10.required'=>'من فضلك ادخل الصوره العاشره',
            'img11.required'=>'من فضلك ادخل الصوره الحادية عشر',
        ]
    );
        $input=[];

        $img1=$request->file('img1');
        if ($img1) {
            $filename1=$img1->getClientOriginalExtension();
            $filename1="myimage".uniqid().".".$filename1;
            $img1->move('images/imghome/',$filename1);
            $input['img1']=$filename1;
        }
        $img2=$request->file('img2');
        if ($img2) {
            $filename2=$img2->getClientOriginalExtension();
            $filename2="myimage".uniqid().".".$filename2;
            $img2->move('images/imghome/',$filename2);
            $input['img2']=$filename2;
        }
        $img3=$request->file('img3');
        if ($img3) {
            $filename3=$img3->getClientOriginalExtension();
            $filename3="myimage".uniqid().".".$filename3;
            $img3->move('images/imghome/',$filename3);
            $input['img3']=$filename3;
        }
        $img4=$request->file('img4');
        if ($img4) {
            $filename4=$img4->getClientOriginalExtension();
            $filename4="myimage".uniqid().".".$filename4;
            $img4->move('images/imghome/',$filename4);
            $input['img4']=$filename4;
        }
        $img5=$request->file('img5');
        if ($img5) {
            $filename5=$img5->getClientOriginalExtension();
            $filename5="myimage".uniqid().".".$filename5;
            $img5->move('images/imghome/',$filename5);
            $input['img5']=$filename5;
        }
        $img6=$request->file('img6');
        if ($img6) {
            $filename6=$img6->getClientOriginalExtension();
            $filename6="myimage".uniqid().".".$filename6;
            $img6->move('images/imghome/',$filename6);
            $input['img6']=$filename6;
        }
        $img7=$request->file('img7');
        if ($img7) {
            $filename7=$img7->getClientOriginalExtension();
            $filename7="myimage".uniqid().".".$filename7;
            $img7->move('images/imghome/',$filename7);
            $input['img7']=$filename7;
        }
        $img8=$request->file('img8');
        if ($img8) {
            $filename8=$img8->getClientOriginalExtension();
            $filename8="myimage".uniqid().".".$filename8;
            $img8->move('images/imghome/',$filename8);
            $input['img8']=$filename8;
        }
        $img9=$request->file('img9');
        if ($img9) {
            $filename9=$img9->getClientOriginalExtension();
            $filename9="myimage".uniqid().".".$filename9;
            $img9->move('images/imghome/',$filename9);
            $input['img9']=$filename9;
        }
        $img10=$request->file('img10');
        if ($img10) {
            $filename10=$img10->getClientOriginalExtension();
            $filename10="myimage".uniqid().".".$filename10;
            $img10->move('images/imghome/',$filename10);
            $input['img10']=$filename10;
        }
        $img11=$request->file('img11');
        if ($img11) {
            $filename11=$img11->getClientOriginalExtension();
            $filename11="myimage".uniqid().".".$filename11;
            $img11->move('images/imghome/',$filename11);
            $input['img11']=$filename11;
        }
        imghome::create($input);
        return redirect('homeimg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\imghome  $imghome
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = imghome::where('id',$id)->get();
        return view('homeimg/details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\imghome  $imghome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = imghome::where('id',$id)->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\imghome  $imghome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\imghome  $imghome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = imghome::findOrFail($id);
        //base_path();
        File::delete(base_path("images/imghome/{$data->img1}"));
        File::delete(base_path("images/imghome/{$data->img2}"));
        File::delete(base_path("images/imghome/{$data->img3}"));
        File::delete(base_path("images/imghome/{$data->img4}"));
        File::delete(base_path("images/imghome/{$data->img5}"));
        File::delete(base_path("images/imghome/{$data->img6}"));
        File::delete(base_path("images/imghome/{$data->img7}"));
        File::delete(base_path("images/imghome/{$data->img8}"));
        File::delete(base_path("images/imghome/{$data->img9}"));
        File::delete(base_path("images/imghome/{$data->img10}"));
        File::delete(base_path("images/imghome/{$data->img11}"));


        imghome::findOrFail($id)->delete();
        return redirect('homeimg');

    }
}
