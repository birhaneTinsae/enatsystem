<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $first_login=Auth::user()->first_login;
       if($first_login){
        //  $user=User::findOrFail(Auth::id);
        //  $
         return redirect('/password-reset');
       }
        

        return view('home');
    }
}
