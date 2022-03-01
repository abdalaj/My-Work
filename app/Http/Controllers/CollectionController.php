<?php

namespace App\Http\Controllers;

use App\exporter;
use App\important;
use App\publisher;
use App\supplier;
use App\userroles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $collection = important::with(['publisher'=>function($q){
            $q->with(['exporter'])->get();
        }])->get();
        $supplier = supplier::get();
        $important = important::get()->count();
        $publisher = publisher::get()->count();
        $exporter = exporter::get()->count();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('collection.index',compact('collection','supplier','important','publisher','exporter','roles'));
    }
    public function show($id)
    {
        $exporter = exporter::with(['publisher'])->where('publisher_id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('collection.exporter',compact('exporter','roles'));
    }
    public function edit($id)
    {
        $publisher = publisher::with(['important'])->where('important_id',$id)->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('collection.publisher',compact('publisher','roles'));
    }
}
