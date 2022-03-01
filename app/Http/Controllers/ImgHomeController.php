<?php

namespace App\Http\Controllers;

use App\imgHome;
use App\social;
use Illuminate\Http\Request;

class ImgHomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=imghome::orderByDesc('id')->get();
        return view('welcome',compact('data'));
    }

}
