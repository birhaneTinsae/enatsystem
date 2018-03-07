<?php

namespace App\Http\Controllers\Branch;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches=Branch::all();
       return view('branch\branch',['branches'=>$branches]);
    }
 
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('branch\new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $branch=new Branch;

        $branch->name = $request->branch_name;
        $branch->code = $request->branch_code;

        if($branch->save()){
            $request->session()->flash('status',"Branch ".$request->branch_name." successfully added.");
            return redirect('/branch');
        }

        
       
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
    public function employees($id){
       $employees= Branch::find($id)->users;
       $employees_detail=[];
       $counter=0;

       foreach($employees as $employee){
          $employees_detail[$counter]=$employee;         
          $counter++;
       }
       return json_encode( $employees_detail);
    }
}
