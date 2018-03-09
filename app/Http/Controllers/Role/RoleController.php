<?php

namespace App\Http\Controllers\Role;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $roles=Role::paginate(10);
        return view('role.role',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('role.new');
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
       
        $role_permission=array();
        $counter=1;
/**
 * First loops via all the selected models and views. e.g Employee,SMSNotification.
 * and then foreach the selected models and view loops for the permission like Create,update,view
 * 
 */
//Loops for models
        foreach($request->models as $model){
            //loops for the permission for the selected model
             //since the permission is an array containing all the permission for all the model this loop only iterate once per a model
            foreach($request->permissions as $permission){
               
                foreach($permission as $per){
                    $key=sprintf("%s-%s",$per,$model);
                    $role_permission[$key]=true;
                }
                break;
            }
        }
       
        $role=new Role;
        $role->name=$request->role_name;
        $role->slug=$request->role_slug;
        $role->permissions=json_encode($role_permission);
        if($role->save()){
            $request->session()->flash('status','Role ${$request->role_name} successfully added.');
            return redirect('/role');
        }
        return json_encode($role_permission);
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
        $role=Role::findOrfail($id);

        $permissions_array=json_decode($role->permissions,true);
       // dd($permissions_array);
        $models=[];
        $counter=0;
        foreach ( $permissions_array as $model=>$permission){
            $models[$counter++]=explode("-",$model)[1];
        }
        return view('role.update',['role'=>$role,'models'=>$models,'permissions_array'=>$permissions_array]);
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
}
