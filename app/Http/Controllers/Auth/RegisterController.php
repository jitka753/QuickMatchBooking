<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Rules\onlyUcn;
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

    protected $redirectTo = '/events';
    

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
            'name' => 'required|string|max:70',
            'email' => ['required', 'string', 'email' ,'max:70', 'unique:users', new onlyUcn],
            'password' => 'required|string|min:6|confirmed',
            'studentLastName' => 'required|string|max:30',
           'studentMobile' => 'string|max:30',
           // 'studyProgram' => '',
            'studentDescription' => 'required',
            'studentPortfolioLink' => '',
            'status' => '',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'studentLastName' => $data['studentLastName'],
            'studentMobile' => $data['studentMobile'],
            'studyProgram' => $data['studyProgram'],
            'studentDescription' =>$data['studentDescription'],
            'studentPortfolioLink' => $data['studentPortfolioLink'],
            'status' => $data['status'],
        ]);
    }
}
