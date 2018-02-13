<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Branch;
use App\Http\Controllers\Controller;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'=>'required',
            'phone_no'=>'required',
            'branch'=>'required',
            'username'=>'required|max:20|min:6|unique:users'
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
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_no' => $data['phone_no'],
            'branch_id' => $data['branch'],
            'password' => bcrypt($data['password']),
            'username'=>$data['username'],
        ]);

        $user->roles()->attach($data['role']);

        return $user;
    }
    public function showRegistrationForm(){
        $roles=Role::orderBy('name')->pluck('name','id');
        $branches=Branch::orderBy('branch_code')->pluck('branch_name','id');
        return view('auth.register',['roles'=>$roles,'branches'=>$branches]);
    }
}
