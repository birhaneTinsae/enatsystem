<?php

namespace App\Http\Controllers\HRM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPosition;
use App\Employee;
use App\User;
class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('employee')->get();
        return view('hr\hr',['employees'=> $user]);
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
        return view('hr\new',['job_positions'=>$job_positions]);
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
        $user=User::find($request->new_employee);

        $new_employee=new Employee;
        
        $new_employee->user_id=$request->new_employee;
        $new_employee->job_id=$request->job_position;
        $new_employee->employed_date=$request->join_date;
        $new_employee->branch_id=$user->branch_id;
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
        $employeeDTA=[];
        $employee=Employee::where('user_id',$id)->firstOrFail();
        
        $job_position=JobPosition::find($employee->job_id);
        $user=User::find($id);
        $employeeDTA['employee_name']=$user->name;
        $employeeDTA['phone_no']=$user->phone_no;
        $employeeDTA['email']=$user->email;
        $employeeDTA['job_position']=$job_position->name;
        $employeeDTA['employed_date']=$employee->employed_date;

        return json_encode( $employeeDTA);
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

        dd($request->all());
        
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
    public function users(){
        $users=User::all();
        return json_encode($users);
    }
}
