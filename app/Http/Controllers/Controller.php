<?php

namespace App\Http\Controllers;

use App\CalanderPayment;
use App\Person;
use App\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // $this->middleware('expiredate');
        Artisan::call('migrate');
        $settings = Setting::get()->pluck('value','key')->toArray();


                $today = date('Y-m-d');
        //        if (Cache::has('notifications')) {
        //            $notifications = Cache::get('notifications');
        //        }else{
        $records = Person::where('remember_review_balance',1)
            ->whereRaw("DATE(remember_date) <= '{$today}'")
            ->get();


            //dd($records);
        $instalments = CalanderPayment::query();
        $instalments->where('is_paid',0);
        $instalments->whereRaw(" date = '{$today}'");
        $instalments = $instalments->latest()->get();
        $notifications = (string) view('layouts.partial.notifications',['records'=>$records,'instalments'=>$instalments]);
        view()->share([
            'settings'=> $settings,
            'notifications'=>$notifications
        ]);

    }

    public function setLang($language='en'){
        Session::put('locale',$language );
        //App::setLocale($language);
        return \Redirect::back();
    }


}
