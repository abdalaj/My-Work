<?php
use App\userroles;
use Djunehor\DB\BackUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['locale']], function() {

    Route::get('setLang/{language}', 'HomeController@setLang')->name('changeLang');
    Auth::routes();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/expiredate', 'HomeController@expiredate');

    Route::resource('/important', 'ImportantController');
    Route::resource('/exporter', 'ExporterController');
    Route::resource('/publisher', 'PublisherController');
    Route::resource('/supplier', 'SupplierController');
    Route::resource('/bank', 'BankController');
    Route::resource('/currencies', 'CurrenciesController');
    Route::resource('/store', 'StoreController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/collection', 'CollectionController');
    Route::resource('/logs', 'LogController');
    Route::resource('/users', 'UsersController');
    Route::resource('/reports', 'ReportsController');
    Route::resource('/getmony', 'GetmonyController');
    Route::resource('/banktransaction', 'BanktransactionController');
    Route::resource('/staff', 'StaffController');
    Route::resource('/prushes', 'PrushesController');
    Route::resource('/shorka', 'ShorkaController');
    Route::resource('/expenses', 'ExpensesController');
    Route::resource('/roles', 'RolesController');
    Route::resource('/purchases', 'PurchasesController');
    Route::resource('/expire', 'ExpireController');
    Route::resource('/return', 'ReturnedController');

    Route::get('/shorkareport', 'ShorkaController@shorkareport');
    Route::get('/todayreport', 'ReportsController@todayreport');
    Route::post('/getmony/{id}', 'SupplierController@getmony');
    Route::post('/banktransaction/{id}', 'BankController@banktransaction');
    Route::post('/win/{id}', 'StaffController@win');
    Route::post('/staffmony/{id}', 'StaffController@staffmony');

    Route::put('/return/important/{id}', 'ReturnedController@important')->name('returnimportant');
    Route::put('/return/exporter/{id}', 'ReturnedController@exporter')->name('returnexporter');
    Route::put('/return/purchases/{id}', 'ReturnedController@purchases')->name('returnpurchases');

    //===============================================================
    //===================== DataBase Operation ======================
    //===============================================================
    Route::get('/backup','HomeController@backup')->name('backup');
    Route::get('/restall','HomeController@restall')->name('restall');
    Route::get('/deleteall','HomeController@deleteall')->name('deleteall');
    Route::get('/clearcash','HomeController@clearcash')->name('clearcash');
    Route::get('/restore',function(){
        $roles = userroles::where('user_id',Auth::user()->id)->get();
        return view('restore',compact('roles'));
    });
    Route::get('/restoreget',function(){
        try {
            $db = new BackUp( env('DB_HOST'), env('DB_USERNAME'), '', env('DB_DATABASE'), 'utf8', 'en' );
            $db->restore ('D://BackUp/'.request()->file);
            request()->session()->flash('restore', 'done!');
            return redirect('home');
        } catch (\Throwable $th) {
            return redirect('home');
        }
    });
    //===============================================================
    //=================== End DataBase Operation ====================
    //===============================================================
});
// Route::get('/xxx',function(){
//     return Hash::make((DATE('d') * DATE('m') * DATE('Y'))+30);
// });
//#region COMMENTS
// return date("Y-m-d");
    // return explode(" ",DATE(order::where("invoice_type",'توريد')->get()[1]->created_at))[0];
    // foreach(important::get() as $d){
    //     if (explode(" ",$d->date)[0]===date("Y-m-d")) {
    //     }else{
    //     }
    // echo explode(" ",$d->created_at)[0] ."<br>";
    // explode(" ",DATE($d->created_at))[0] ."<br>". Date("Y-m-d");
    // }
    // return explode(" ",DATE(important::get()[0]->created_at))[0] ."<br>". Date("Y-m-d");

    // return session()->all();
    // $data =    important::with(['publisher'=>function($q){
    //     $q->with(['exporter'])->get();
    // }])->get();
    // return config('app.EXPIREDATE');
    // return env('EXPIREDATE');
        // return strtotime(date('Y-m-d'));
        // return (DATE('d-m-Y') > env('EXPIREDATE'));
        // $data =   exporter::with(['publisher'=>function($q){
        //     $q->with(['important'])->get();
        // }])->get();
        // if ($data->count()==0) {
        //     $data =  publisher::with(['important'])->get();
        //     foreach ($data as $key) {
        //         if ( $key->implement==0) {
        //             $data = publisher::with(['important'])->get();
        //         }
        //     }
        // }
        // if ($data->count()==0) {
        //     $data = publisher::with(['important'])->get();
        //     foreach ($data as $key) {
        //         if ($key->count()==0) {
        //             return important::all();
        //         }
        //         return $key;
        //     }
        // }
    //#endregion
    // File::put('backup'.Date('Y-m-d h:m:s').'.sql','');

    // try {
    //     $dump = new IMysqldump\mysqldump('mysql:host=localhost;dbname='.env('DB_DATABASE'), 'root', '');
    //     $dump->start(public_path('backup'.uniqid().'.sql'));
    // } catch (\Exception $e) {
    //     echo 'mysqldump-php error: ' . $e->getMessage();
    // }
    // return $data;
// Route::get('/as', function () {
//     return store::with(['exporter'=>function($q){
//         $q->with(['publisher'=>function($q){
//             $q->with(['important'])->get();
//         }])->get();
//     }])->get();
// });
// Route::get('/activation', function(){
//     $active = [
//         'konoz_currency',
//     ];
//     for ($i=0; $i < count($active); $i++) {
//         session()->put($active[$i],true);
//         echo session()->get($active[$i]);
//     }
// });
Route::get('/expiredate', function(){

        return '<style>
        * {
            padding: 0;
            margin: 0;
        }

        .div1 {
            position: relative;
            width: 100%;
            height: 100vh;
            background: #000;
        }

        .div2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 48px
        }

    </style>
    <div class="div1">
        <center>
            <p class="div2">
                للاسف انتهت النسخه التجريبيه تفضل بالرجوع لشركة فاستر ايجي ميديا - 01552271341
            </p>
        </center>
    </div>
    ';

});
