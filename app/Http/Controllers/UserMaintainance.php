<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Branch;
use Illuminate\Support\Facades\Hash;
class UserMaintainance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::paginate(10);
        return view('user.users',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);
        $branches=Branch::all();
        return view('user.update',['user'=>$user,'branches'=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->branch_id=$request->branch;
        $user->phone_no=$request->phone_no;
        if(!empty($request->password)){
            $user->password=Hash::make($request->password);
        }
        if($user->save()){
            $request->session()->flash('status','User ${$request->username} successfully updated.');
            return redirect('/user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function show_password_reset_form(){
        return view('auth.passwords.reset');
    }
    public function reset_password(Request $request,$id){
  
        $validatedData = $request->validate([
            'password' => 'required|string|min:6|confirmed|alpha_dash',
            'password_confirmation' => 'required',
        ]);


        $user=User::findOrFail($id);
        $user->password=Hash::make($request->password);
        $user->first_login=false;
        if($user->save()){
            $request->session()->flash('status','Your password has been successfully reseted');
        }
        return redirect('/home');
    }
}
