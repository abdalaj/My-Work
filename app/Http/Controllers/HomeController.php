<?php

namespace App\Http\Controllers;

use App\expenses;
use App\expire;
use App\exporter;
use App\important;
use App\order;
use App\publisher;
use App\purchases;
use App\userroles;
use Illuminate\Http\Request;
use Ifsnop\Mysqldump as IMysqldump;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //exporter
        $exporterToDay = exporter::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(amount) as exporterToDay'))
                    ->get();
        $todayexporter = $exporterToDay->first();
        $todayexporter = $todayexporter->exporterToDay??0;

        $purchasesToDay = purchases::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(price*qty) as purchasesToDay'))
                    ->get();
        $todaypurchases = $purchasesToDay->first();
        $todaypurchases = $todaypurchases->purchasesToDay??0;

        $importantToDay = important::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(amount) as importantToDay'))
                    ->get();
        $todayimportant = $importantToDay->first();
        $todayimportant = $todayimportant->importantToDay??0;

        $expensesToDay = expenses::where('created_at','>=',date('Y-m-d'))
                    ->select(DB::raw('sum(mony) as expensesToDay'))
                    ->get();
        $todayexpenses = $expensesToDay->first();
        $todayexpenses = $todayexpenses->expensesToDay??0;

        $expireToDay = expire::where('created_at','>=',date('Y-m-d'))
        ->select(DB::raw('sum(price) as expireToDay'))
        ->get();
        $todayexpire = $expireToDay->first();
        $todayexpire = $todayexpire->expireToDay??0;

        $returnToDayToimportant = important::where('updated_at','>=',date('Y-m-d'))
        ->where('is_return',1)
        ->select(DB::raw('sum(amount) as returnToDayToimportant'))
        ->get();

        $returnToDayTopurchases = purchases::where('updated_at','>=',date('Y-m-d'))
        ->where('is_return',1)
        ->select(DB::raw('sum(price*qty) as returnToDayTopurchases'))
        ->get();

        $returnToDayToexporter = exporter::where('updated_at','>=',date('Y-m-d'))
        ->where('is_return',1)
        ->select(DB::raw('sum(amount) as returnToDayToexporter'))
        ->get();

        // return $returnToDayToimportant[0]->returnToDayToimportant + $returnToDayTopurchases[0]->returnToDayTopurchases + $returnToDayToexporter[0]->returnToDayToexporter;

        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('home',compact('roles','exporterToDay','purchasesToDay','expensesToDay','expireToDay','importantToDay','returnToDayToimportant','returnToDayTopurchases','returnToDayToexporter'));
    }

    /**
     * Backup the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //===============================================================
    //===================== DataBase Operation ======================
    //===============================================================
    public function backup(Request $request)
    {
        // File::put('backup'.Date('Y-m-d h:m:s').'.sql','');
        // return Date('Y-m-d');
        if (is_dir('D://BackUp')) {
            try {
                $dump = new IMysqldump\mysqldump('mysql:host=localhost;dbname='.env('DB_DATABASE'), 'root', '');
                $dump->start('D://BackUp/backup'. Date('Y-m-d___H-i-s').'.sql');
            } catch (\Exception $e) {
                echo 'mysqldump-php error: ' . $e->getMessage();
            }
        }else{
            mkdir('D://BackUp');
            try {
                $dump = new IMysqldump\mysqldump('mysql:host=localhost;dbname='.env('DB_DATABASE'), 'root', '');
                $dump->start('D://BackUp/backup'. Date('Y-m-d___H-i-s').'.sql');
            } catch (\Exception $e) {
                echo 'mysqldump-php error: ' . $e->getMessage();
            }
        }
        $request->session()->flash('backup', 'done!');
        return redirect()->back();
    }
    public function restall(Request $request)
    {
        try {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
            request()->session()->flash('restall', 'done!');
        } catch (\Throwable $th) {
        }
        return redirect('/');
    }
    public function deleteall(Request $request)
    {
        try {
            foreach(DB::select('SHOW TABLES') as $table) {
                Schema::dropIfExists($table->Tables_in_konoz);
            }
            $request->session()->flash('restall','done!');
            return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');

        }
    }
    public function clearcash(Request $request)
    {
        try {

            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('config:clear');
            Artisan::call('storage:link');
            request()->session()->flash('clearcash', 'done!');
            return redirect(route('home'));
        } catch (\Throwable $th) {
            request()->session()->flash('clearcash', 'done!');
            return redirect('home');

        }
    }
}
