<?php

namespace App\Http\Controllers;

use App\exporter;
use App\important;
use App\order;
use App\publisher;
use App\supplier;
use App\userroles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $important = important::where('store_id',Auth::user()->store_id)->where('month',date('m'))->get();
        $publisher = publisher::where('store_id',Auth::user()->store_id)->where('month',date('m'))->get();
        $exporter = exporter::where('store_id',Auth::user()->store_id)->where('month',date('m'))->get();
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.areaChart',compact('exporter','important','publisher','roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $subnum = request()->subnum;

        $important = important::where('name_client',$subnum)->get()->sum('amount');
        $publisher = publisher::where('name_client',$subnum)->get()->sum('amount_all_plus');
        $exporter = exporter::where('name_client',$subnum)->get()->sum('amount');
        $god = exporter::where('name_client',$subnum)->get()->where('is_return',0)->sum('god');

        $imp_1 = important::where('name_client',$subnum)->where('month',1)->get()->sum('amount');
        $imp_2 = important::where('name_client',$subnum)->where('month',2)->get()->sum('amount');
        $imp_3 = important::where('name_client',$subnum)->where('month',3)->get()->sum('amount');
        $imp_4 = important::where('name_client',$subnum)->where('month',4)->get()->sum('amount');
        $imp_5 = important::where('name_client',$subnum)->where('month',5)->get()->sum('amount');
        $imp_6 = important::where('name_client',$subnum)->where('month',6)->get()->sum('amount');
        $imp_7 = important::where('name_client',$subnum)->where('month',7)->get()->sum('amount');
        $imp_8 = important::where('name_client',$subnum)->where('month',8)->get()->sum('amount');
        $imp_9 = important::where('name_client',$subnum)->where('month',9)->get()->sum('amount');
        $imp_10 = important::where('name_client',$subnum)->where('month',10)->get()->sum('amount');
        $imp_11 = important::where('name_client',$subnum)->where('month',11)->get()->sum('amount');
        $imp_12 = important::where('name_client',$subnum)->where('month',12)->get()->sum('amount');

        $pub_1 = publisher::where('name_client',$subnum)->where('month',1)->get()->sum('amount_all_plus');
        $pub_2 = publisher::where('name_client',$subnum)->where('month',2)->get()->sum('amount_all_plus');
        $pub_3 = publisher::where('name_client',$subnum)->where('month',3)->get()->sum('amount_all_plus');
        $pub_4 = publisher::where('name_client',$subnum)->where('month',4)->get()->sum('amount_all_plus');
        $pub_5 = publisher::where('name_client',$subnum)->where('month',5)->get()->sum('amount_all_plus');
        $pub_6 = publisher::where('name_client',$subnum)->where('month',6)->get()->sum('amount_all_plus');
        $pub_7 = publisher::where('name_client',$subnum)->where('month',7)->get()->sum('amount_all_plus');
        $pub_8 = publisher::where('name_client',$subnum)->where('month',8)->get()->sum('amount_all_plus');
        $pub_9 = publisher::where('name_client',$subnum)->where('month',9)->get()->sum('amount_all_plus');
        $pub_10 = publisher::where('name_client',$subnum)->where('month',10)->get()->sum('amount_all_plus');
        $pub_11 = publisher::where('name_client',$subnum)->where('month',11)->get()->sum('amount_all_plus');
        $pub_12 = publisher::where('name_client',$subnum)->where('month',12)->get()->sum('amount_all_plus');

        $exp_1 = exporter::where('name_client',$subnum)->where('month',1)->get()->sum('amount');
        $exp_2 = exporter::where('name_client',$subnum)->where('month',2)->get()->sum('amount');
        $exp_3 = exporter::where('name_client',$subnum)->where('month',3)->get()->sum('amount');
        $exp_4 = exporter::where('name_client',$subnum)->where('month',4)->get()->sum('amount');
        $exp_5 = exporter::where('name_client',$subnum)->where('month',5)->get()->sum('amount');
        $exp_6 = exporter::where('name_client',$subnum)->where('month',6)->get()->sum('amount');
        $exp_7 = exporter::where('name_client',$subnum)->where('month',7)->get()->sum('amount');
        $exp_8 = exporter::where('name_client',$subnum)->where('month',8)->get()->sum('amount');
        $exp_9 = exporter::where('name_client',$subnum)->where('month',9)->get()->sum('amount');
        $exp_10 = exporter::where('name_client',$subnum)->where('month',10)->get()->sum('amount');
        $exp_11 = exporter::where('name_client',$subnum)->where('month',11)->get()->sum('amount');
        $exp_12 = exporter::where('name_client',$subnum)->where('month',12)->get()->sum('amount');

        $god_1 = exporter::where('name_client',$subnum)->where('month',1)->get()->where('is_return',0)->sum('god');
        $god_2 = exporter::where('name_client',$subnum)->where('month',2)->get()->where('is_return',0)->sum('god');
        $god_3 = exporter::where('name_client',$subnum)->where('month',3)->get()->where('is_return',0)->sum('god');
        $god_4 = exporter::where('name_client',$subnum)->where('month',4)->get()->where('is_return',0)->sum('god');
        $god_5 = exporter::where('name_client',$subnum)->where('month',5)->get()->where('is_return',0)->sum('god');
        $god_6 = exporter::where('name_client',$subnum)->where('month',6)->get()->where('is_return',0)->sum('god');
        $god_7 = exporter::where('name_client',$subnum)->where('month',7)->get()->where('is_return',0)->sum('god');
        $god_8 = exporter::where('name_client',$subnum)->where('month',8)->get()->where('is_return',0)->sum('god');
        $god_9 = exporter::where('name_client',$subnum)->where('month',9)->get()->where('is_return',0)->sum('god');
        $god_10 = exporter::where('name_client',$subnum)->where('month',10)->get()->where('is_return',0)->sum('god');
        $god_11 = exporter::where('name_client',$subnum)->where('month',11)->get()->where('is_return',0)->sum('god');
        $god_12 = exporter::where('name_client',$subnum)->where('month',12)->get()->where('is_return',0)->sum('god');

        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.supplier',compact(
            'roles',

            'important',
            'publisher',
            'exporter',
            'god',

            'imp_1',
            'imp_2',
            'imp_3',
            'imp_4',
            'imp_5',
            'imp_6',
            'imp_7',
            'imp_8',
            'imp_9',
            'imp_10',
            'imp_11',
            'imp_12',

            'pub_1',
            'pub_2',
            'pub_3',
            'pub_4',
            'pub_5',
            'pub_6',
            'pub_7',
            'pub_8',
            'pub_9',
            'pub_10',
            'pub_11',
            'pub_12',

            'exp_1',
            'exp_2',
            'exp_3',
            'exp_4',
            'exp_5',
            'exp_6',
            'exp_7',
            'exp_8',
            'exp_9',
            'exp_10',
            'exp_11',
            'exp_12',

            'god_1',
            'god_2',
            'god_3',
            'god_4',
            'god_5',
            'god_6',
            'god_7',
            'god_8',
            'god_9',
            'god_10',
            'god_11',
            'god_12',
        ));
        // $supplier = supplier::where('id',$subnum)->get();

        // $important = important::where('name_client', $subnum)->get();
        // $publisher = publisher::where('name_client', $subnum)->get();
        // $exporter = exporter::where('name_client', $subnum)->get();

        // return view('report.supplier');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $imp_1 = important::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount');
        $imp_2 = important::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount');
        $imp_3 = important::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount');
        $imp_4 = important::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount');
        $imp_5 = important::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount');
        $imp_6 = important::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount');
        $imp_7 = important::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount');
        $imp_8 = important::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount');
        $imp_9 = important::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount');
        $imp_10 = important::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount');
        $imp_11 = important::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount');
        $imp_12 = important::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount');

        $pub_1 = publisher::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount_all_plus');
        $pub_2 = publisher::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount_all_plus');
        $pub_3 = publisher::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount_all_plus');
        $pub_4 = publisher::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount_all_plus');
        $pub_5 = publisher::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount_all_plus');
        $pub_6 = publisher::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount_all_plus');
        $pub_7 = publisher::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount_all_plus');
        $pub_8 = publisher::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount_all_plus');
        $pub_9 = publisher::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount_all_plus');
        $pub_10 = publisher::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount_all_plus');
        $pub_11 = publisher::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount_all_plus');
        $pub_12 = publisher::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount_all_plus');

        $exp_1 = exporter::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount');
        $exp_2 = exporter::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount');
        $exp_3 = exporter::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount');
        $exp_4 = exporter::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount');
        $exp_5 = exporter::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount');
        $exp_6 = exporter::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount');
        $exp_7 = exporter::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount');
        $exp_8 = exporter::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount');
        $exp_9 = exporter::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount');
        $exp_10 = exporter::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount');
        $exp_11 = exporter::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount');
        $exp_12 = exporter::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount');

        $god_1 = exporter::where('store_id',Auth::user()->store_id)->where('month',1)->get()->where('is_return',0)->sum('god');
        $god_2 = exporter::where('store_id',Auth::user()->store_id)->where('month',2)->get()->where('is_return',0)->sum('god');
        $god_3 = exporter::where('store_id',Auth::user()->store_id)->where('month',3)->get()->where('is_return',0)->sum('god');
        $god_4 = exporter::where('store_id',Auth::user()->store_id)->where('month',4)->get()->where('is_return',0)->sum('god');
        $god_5 = exporter::where('store_id',Auth::user()->store_id)->where('month',5)->get()->where('is_return',0)->sum('god');
        $god_6 = exporter::where('store_id',Auth::user()->store_id)->where('month',6)->get()->where('is_return',0)->sum('god');
        $god_7 = exporter::where('store_id',Auth::user()->store_id)->where('month',7)->get()->where('is_return',0)->sum('god');
        $god_8 = exporter::where('store_id',Auth::user()->store_id)->where('month',8)->get()->where('is_return',0)->sum('god');
        $god_9 = exporter::where('store_id',Auth::user()->store_id)->where('month',9)->get()->where('is_return',0)->sum('god');
        $god_10 = exporter::where('store_id',Auth::user()->store_id)->where('month',10)->get()->where('is_return',0)->sum('god');
        $god_11 = exporter::where('store_id',Auth::user()->store_id)->where('month',11)->get()->where('is_return',0)->sum('god');
        $god_12 = exporter::where('store_id',Auth::user()->store_id)->where('month',12)->get()->where('is_return',0)->sum('god');

        $roles = userroles::where('user_id',Auth::user()->id)->get();

        return view('report.graph',compact(
            'roles',
            'imp_1',
            'imp_2',
            'imp_3',
            'imp_4',
            'imp_5',
            'imp_6',
            'imp_7',
            'imp_8',
            'imp_9',
            'imp_10',
            'imp_11',
            'imp_12',

            'pub_1',
            'pub_2',
            'pub_3',
            'pub_4',
            'pub_5',
            'pub_6',
            'pub_7',
            'pub_8',
            'pub_9',
            'pub_10',
            'pub_11',
            'pub_12',

            'exp_1',
            'exp_2',
            'exp_3',
            'exp_4',
            'exp_5',
            'exp_6',
            'exp_7',
            'exp_8',
            'exp_9',
            'exp_10',
            'exp_11',
            'exp_12',

            'god_1',
            'god_2',
            'god_3',
            'god_4',
            'god_5',
            'god_6',
            'god_7',
            'god_8',
            'god_9',
            'god_10',
            'god_11',
            'god_12',
        ));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        $important = important::where('store_id',Auth::user()->store_id)->get()->sum('amount');
        $publisher = publisher::where('store_id',Auth::user()->store_id)->get()->sum('amount_all_plus');
        $exporter = exporter::where('store_id',Auth::user()->store_id)->get()->sum('amount');
        $god = exporter::where('store_id',Auth::user()->store_id)->get()->where('is_return',0)->sum('god');

        $imp_1 = important::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount');
        $imp_2 = important::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount');
        $imp_3 = important::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount');
        $imp_4 = important::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount');
        $imp_5 = important::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount');
        $imp_6 = important::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount');
        $imp_7 = important::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount');
        $imp_8 = important::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount');
        $imp_9 = important::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount');
        $imp_10 = important::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount');
        $imp_11 = important::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount');
        $imp_12 = important::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount');

        $pub_1 = publisher::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount_all_plus');
        $pub_2 = publisher::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount_all_plus');
        $pub_3 = publisher::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount_all_plus');
        $pub_4 = publisher::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount_all_plus');
        $pub_5 = publisher::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount_all_plus');
        $pub_6 = publisher::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount_all_plus');
        $pub_7 = publisher::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount_all_plus');
        $pub_8 = publisher::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount_all_plus');
        $pub_9 = publisher::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount_all_plus');
        $pub_10 = publisher::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount_all_plus');
        $pub_11 = publisher::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount_all_plus');
        $pub_12 = publisher::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount_all_plus');

        $exp_1 = exporter::where('store_id',Auth::user()->store_id)->where('month',1)->get()->sum('amount');
        $exp_2 = exporter::where('store_id',Auth::user()->store_id)->where('month',2)->get()->sum('amount');
        $exp_3 = exporter::where('store_id',Auth::user()->store_id)->where('month',3)->get()->sum('amount');
        $exp_4 = exporter::where('store_id',Auth::user()->store_id)->where('month',4)->get()->sum('amount');
        $exp_5 = exporter::where('store_id',Auth::user()->store_id)->where('month',5)->get()->sum('amount');
        $exp_6 = exporter::where('store_id',Auth::user()->store_id)->where('month',6)->get()->sum('amount');
        $exp_7 = exporter::where('store_id',Auth::user()->store_id)->where('month',7)->get()->sum('amount');
        $exp_8 = exporter::where('store_id',Auth::user()->store_id)->where('month',8)->get()->sum('amount');
        $exp_9 = exporter::where('store_id',Auth::user()->store_id)->where('month',9)->get()->sum('amount');
        $exp_10 = exporter::where('store_id',Auth::user()->store_id)->where('month',10)->get()->sum('amount');
        $exp_11 = exporter::where('store_id',Auth::user()->store_id)->where('month',11)->get()->sum('amount');
        $exp_12 = exporter::where('store_id',Auth::user()->store_id)->where('month',12)->get()->sum('amount');

        $god_1 = exporter::where('store_id',Auth::user()->store_id)->where('month',1)->get()->where('is_return',0)->sum('god');
        $god_2 = exporter::where('store_id',Auth::user()->store_id)->where('month',2)->get()->where('is_return',0)->sum('god');
        $god_3 = exporter::where('store_id',Auth::user()->store_id)->where('month',3)->get()->where('is_return',0)->sum('god');
        $god_4 = exporter::where('store_id',Auth::user()->store_id)->where('month',4)->get()->where('is_return',0)->sum('god');
        $god_5 = exporter::where('store_id',Auth::user()->store_id)->where('month',5)->get()->where('is_return',0)->sum('god');
        $god_6 = exporter::where('store_id',Auth::user()->store_id)->where('month',6)->get()->where('is_return',0)->sum('god');
        $god_7 = exporter::where('store_id',Auth::user()->store_id)->where('month',7)->get()->where('is_return',0)->sum('god');
        $god_8 = exporter::where('store_id',Auth::user()->store_id)->where('month',8)->get()->where('is_return',0)->sum('god');
        $god_9 = exporter::where('store_id',Auth::user()->store_id)->where('month',9)->get()->where('is_return',0)->sum('god');
        $god_10 = exporter::where('store_id',Auth::user()->store_id)->where('month',10)->get()->where('is_return',0)->sum('god');
        $god_11 = exporter::where('store_id',Auth::user()->store_id)->where('month',11)->get()->where('is_return',0)->sum('god');
        $god_12 = exporter::where('store_id',Auth::user()->store_id)->where('month',12)->get()->where('is_return',0)->sum('god');

        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('report.donat',compact(
            'roles',
            'important',
            'publisher',
            'exporter',
            'god',

            'imp_1',
            'imp_2',
            'imp_3',
            'imp_4',
            'imp_5',
            'imp_6',
            'imp_7',
            'imp_8',
            'imp_9',
            'imp_10',
            'imp_11',
            'imp_12',

            'pub_1',
            'pub_2',
            'pub_3',
            'pub_4',
            'pub_5',
            'pub_6',
            'pub_7',
            'pub_8',
            'pub_9',
            'pub_10',
            'pub_11',
            'pub_12',

            'exp_1',
            'exp_2',
            'exp_3',
            'exp_4',
            'exp_5',
            'exp_6',
            'exp_7',
            'exp_8',
            'exp_9',
            'exp_10',
            'exp_11',
            'exp_12',

            'god_1',
            'god_2',
            'god_3',
            'god_4',
            'god_5',
            'god_6',
            'god_7',
            'god_8',
            'god_9',
            'god_10',
            'god_11',
            'god_12',
        ));
    }
    public function todayreport()
    {
         //important
        $importantToDay = important::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(amount) as importantToDay'))
                    ->get();
        $todayImportant = $importantToDay->first();
        $todayImportant = $todayImportant->importantToDay??0;

        //publisher
        $publisherToDay = publisher::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(amount_all_plus) as publisherToDay'))
                    ->get();
        $todaypublisher = $publisherToDay->first();
        $todaypublisher = $todaypublisher->publisherToDay??0;

        //exporter
        $exporterToDay = exporter::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(amount) as exporterToDay'))
                    ->get();
        $todayexporter = $exporterToDay->first();
        $todayexporter = $todayexporter->exporterToDay??0;

        //order
        $ordersToDay = order::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('count(id) as ordersToDay'))
                    ->get();
        $todayOrders = $ordersToDay->first();
        $todayOrders = $todayOrders->ordersToDay??0;

        $roles = userroles::where('user_id',Auth::user()->id)->get();

        return view('report.today',compact(
            'importantToDay',
            'publisherToDay',
            'exporterToDay',
            'ordersToDay',
            'roles'
        ));
    }
}
