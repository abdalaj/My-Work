<?php

namespace App\Http\Controllers;

use App\bank;
use App\log;
use App\order;
use App\prushes;
use App\staff;
use App\staffMony;
use App\supplier;
use App\userroles;
use App\win;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = staff::orderBy('id','DESC')->get();
        $prushes = prushes::orderBy('id','DESC')->get();
        $banks = bank::where('id',Auth::user()->bank_id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('staff.index',compact('data','prushes','banks','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('staff.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        staff::create($request->all());
        $log = [
            'name' => ' تم انشاء موظف جديد باسم ' . $request->name  . ' بواسطة ' . Auth::user()->name,
            'user' => Auth::user()->name,
            'type' => 'انشاء موظف جديد',
        ];
        Log::create($log);
        request()->session()->flash('add', 'done!');

        return redirect('staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data = staff::where('id',$id)->get();
        $win = win::orderBy('id','DESC')->where('staff_id',$id)->where('type',1)->get();
        $lose = win::orderBy('id','DESC')->where('staff_id',$id)->where('type',2)->get();
        $staffMony = staffMony::orderBy('id','DESC')->where('staff_id',$id)->get();

        $prushes = prushes::get();
        $banks = bank::get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();

        return view('staff.details',compact('data','win','lose','staffMony','prushes','banks','roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = staff::where('id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('staff.edit',compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $olddata = staff::find($id);
        $log = [
            'name' => ' تم التعديل في موظف موجود باسم ' . $olddata->name  . ' بواسطة ' . Auth::user()->name . ' وتغيير اسمه الي ' . $request->name,
            'user' => Auth::user()->name,
            'type' => 'تعديل موظف موجود',
        ];
        $olddata->name = $request->name;
        $olddata->salery = $request->salery;
        $olddata->date = $request->date;
        $olddata->days = $request->days;
        $olddata->salery_days = $request->salery_days;
        $olddata->phone = $request->phone;
        $olddata->type = $request->type;
        $olddata->notes = $request->notes;
        Log::create($log);
        $olddata->save();
        request()->session()->flash('edit', 'done!');

        return redirect('staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = staff::find($id);
        $log = [
            'name' => ' تم حذف موظف باسم ' . $destroy->name  . ' بواسطة ' . Auth::user()->name,
            'user' => Auth::user()->name,
            'type' => 'حذف موظف',
        ];
        Log::create($log);
        $destroy->delete();
        return redirect()->back();
    }

    /**
     * Win the specified resource from storage.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function win(Request $request,$id)
    {
        win::create($request->all());
        $type=0;
        if ($request->type==1) {
            $type='مكافأه';
        }
        if ($request->type==2) {
            $type="معاقبة";
        }
        $log = [
            'name' => ' تم ' . $type . ' الموظف رقم ' . $id . ' بمبلغ قدره ' . $request->mony . ' بواسطة ' . Auth::user()->name,
            'user' => Auth::user()->name,
            'type' => $type . ' لموظف ',
        ];
        log::create($log);
        request()->session()->flash('add', 'done!');

        return redirect()->back();
    }
    /**
     * StaffMony the specified resource from storage.
     *
     * @param  \App\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function staffmony(Request $request,$id)
    {
        staffMony::create($request->all());
        $name_prushes = prushes::where('id',$request->prushes_id)->get()[0]->name;
        $log = [
            'name' => ' تم اعطاء ' . $name_prushes . ' للعميل رقم ' . $request->staff_id . ' بمبلغ ' . $request->mony . ' بواسطة ' . Auth::user()->name,
            'user' => Auth::user()->name,
            'type' =>  'المرتبات والسلف',
        ];
        Log::create($log);
        $oldbank = bank::find($request->bank_id);
        $oldbank->amount = $oldbank->amount - $request->mony;
        $oldbank->save();
        request()->session()->flash('add', 'done!');

        return redirect()->back();
    }
}
