<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class PhoneBookController extends Controller
{
    //
    public function index(){
        $users=User::orderBy('branch_id', 'asc')->get();
        $counter=1;
        return view('phone-book.phone-book',['users'=>$users,'counter'=>$counter]);
    }
    public function search($query){
       
        if($query==='all'){
            $users=User::all();
        }else{
            $users=User::where('name','like',"%{$query}%")->get();
        }
       
        
        $response=array();
        $counter=1;
        foreach($users as $user){
            $response[$counter]['count']=$counter;
            $response[$counter]['name']=$user->name;
            $response[$counter]['branch']=$user->branch->name;
            $response[$counter]['phone_no']=$user->phone_no;
            $counter++;
        }
        return json_encode(array_values($response));
    }
}
