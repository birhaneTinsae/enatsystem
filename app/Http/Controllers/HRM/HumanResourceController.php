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
        // $user=User::with('employee')->get();
        // $user=User::with('employee')->paginate(10);
        // return view('hr\hr',['employees'=> $user]);
       
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
        return view('hr.new',['job_positions'=>$job_positions]);
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
            'user_id'=>'required|unique:employees',
            'job_position'=>'required',
            'join_date'=>'required|date',
           // 'branch_id'=>'required',
        ]);

        //$user=User::find($request->user_id);

        $new_employee=new Employee;
        
        $new_employee->user_id=$request->user_id;
        $new_employee->job_position_id=$request->job_position;
        $new_employee->employed_date=$request->join_date;
        //$new_employee->branch_id=$user->branch_id;
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
        $employee_dto=[];
        

       $employee=Employee::find($id);


        $employee_dto['employee_name']=$employee->user->name;
        $employee_dto['phone_no']=$employee->user->phone_no;
        $employee_dto['email']=$employee->user->email;
        $employee_dto['job_position']=$employee->job_position->name;
        $employee_dto['employed_date']=$employee->employed_date;

        return json_encode( $employee_dto);
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
    public function users(){
        $users=User::all();
        return json_encode($users);
    }
}
