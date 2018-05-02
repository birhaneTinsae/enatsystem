<?php

namespace App\Http\Controllers\HRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPosition;
use App\Employee;
use App\User;
use App\Branch;
class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $employees=Employee::paginate(10);
        return view('hr.hr',['employees'=> $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $job_positions=JobPosition::orderBy('name')->pluck('name','id');
        $branches=Branch::orderBy('name')->pluck('name','id');
        return view('hr.new',['job_positions'=>$job_positions,'branches'=>$branches]);
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
        
        $valid_data=$request->validate([
            'new_employee'=>'required',
            'job_position'=>'required',
            'sex'=>'required',
            'phone_no'=>'required',
            'enat_id'=>'required',
            'join_date'=>'required|date',   
            'salary'=>'required'       
        ]);

        

        $new_employee=new Employee;
        
        $new_employee->name=$request->new_employee;
        $new_employee->job_position_id=$request->job_position;
        $new_employee->employed_date=$request->join_date;
        $new_employee->email=$request->email;
        $new_employee->salary=$request->salary;
        $new_employee->phone_no=$request->phone_no;
        $new_employee->enat_id=$request->enat_id;
        $new_employee->sex=$request->sex;
        $new_employee->branch_id=$request->branch;
       
        if($new_employee->save()){
            $request->session()->flash('status','Employee record successfully created');
            return redirect('/hr');
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
      //  $employee_dto=[];
        

       $employee=Employee::find($id);


        // $employee_dto['employee_name']=$employee->name;
        // $employee_dto['phone_no']=$employee->phone_no;
        // $employee_dto['email']=$employee->usemail;
        // $employee_dto['job_position']=$employee->job_position->name;
        // $employee_dto['employed_date']=$employee->employed_date;

         return view('hr.detail',['employee'=>$employee]); //json_encode( $employee);
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
        $job_positions=JobPosition::orderBy('name')->pluck('name','id');
        $employee=Employee::findOrFail($id);
        $branches=Branch::orderBy('name')->pluck('name','id');
        return view('hr.update',['employee'=>$employee,'job_positions'=>$job_positions,'branches'=>$branches]);
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
        
        $valid_data=$request->validate([
            'new_employee'=>'required',
            'job_position'=>'required',
            'sex'=>'required',
            'phone_no'=>'required',
            'enat_id'=>'required',
            'join_date'=>'required|date',   
            'salary'=>'required'       
        ]);

        

        $update_employee=Employee::find($id);
        
        $update_employee->name=$request->new_employee;
        $update_employee->job_position_id=$request->job_position;
        $update_employee->employed_date=$request->join_date;
        $update_employee->email=$request->email;
        $update_employee->salary=$request->salary;
        $update_employee->phone_no=$request->phone_no;
        $update_employee->enat_id=$request->enat_id;
        $update_employee->sex=$request->sex;
        $update_employee->branch_id=$request->branch;
       
        if($update_employee->save()){
            $request->session()->flash('status','Employee record successfully updated');
            return redirect('/hr');
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
    public function employees(){
        $users=Employee::all();
        return json_encode($users);
    }
}
