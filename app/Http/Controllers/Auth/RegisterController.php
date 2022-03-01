<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name_market' => ['required', 'string', 'max:255'],
            'NationalId' => ['required', 'string', 'max:14','min:14','unique:users'],
        ],[
           'email.unique'=>'الايميل دا مستخدم من قبل',
           'NationalId.max'=>'اقصي طول للرقم القومي هوا 14 رقم',
           'NationalId.min'=>'الرقم القومي غير صحيح ويرجي كتابته كاملا',
           'NationalId.unique'=>'رقم البطاقه دا مستخدم من قبل',
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'name_market' => $data['name_market'],
            'address' => $data['address'],
            'type' => $data['type'],
            'NationalId' => $data['NationalId'],
            'remind' => $data['password'],
            'gender' => "user",
            'active' => 1,
            'ip' => request()->ip(),
            'password' => Hash::make($data['password']),
        ]);
    }
}
