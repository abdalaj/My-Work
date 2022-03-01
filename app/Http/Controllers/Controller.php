<?php

namespace App\Http\Controllers;

use App\userroles;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        Artisan::call('migrate');
        $today = date('Y-m-d');
        $this->middleware('auth');
        // $this->middleware('expiredate');
        \Session::put('locale','ar' );
    }

    public function setLang($language='ar'){
        \Session::put('locale',$language );
        return \Redirect::back();
    }

}
