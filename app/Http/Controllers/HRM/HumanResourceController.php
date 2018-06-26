<?php

namespace App\Http\Controllers\HRM;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPosition;
use App\Employee;
use App\Branch;
use App\User;
use Auth;
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

       // dd($employees);
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
        //dd($request->all());
    //   $tin_no_length=strlen ($request->tin_no);
    //   $loop_length=10-$tin_no_length;      
    //   $tin_no=$request->tin_no;
    //   for($i=0;$i<$loop_length;$i++){
    //     $tin_no="0".$tin_no;
    //   }
        $valid_data=$request->validate([                     
            'enat_id'=>'required|unique:employees',
            'Phone_no'=>'required|unique:employees',
            
            'email'=>'nullable|unique:employees',             
            'govt_pension_no'=>'nullable|min:10|unique:employees',
            'private_pension_no'=>'nullable|min:10|unique:employees',
            'tin_no'=>'nullable|min:10|unique:employees',  
            'job_position_id'=>'required',
            'job_position_step'=>'required',
            'branch_id'=>'required',
            'marital_status'=>'required',
            'gender'=>'required',
            'category'=>'required',
            'operation_location'=>'required',
            'employement_date'=>'required|date',          
        ]);  
 //dd($request->all());
        $new_employee=new Employee;
       
        $new_employee->enat_id=$request->enat_id;
        $new_employee->full_name=$request->full_name;
        $new_employee->gender=$request->gender;
        $new_employee->birth_date=$request->birth_date;
        $new_employee->job_position_id=$request->job_position_id;
        $new_employee->branch_id=$request->branch_id;
        $new_employee->Job_Position_Step=$request->job_position_step;
        $new_employee->employement_date=$request->employement_date;
        $new_employee->phone_no=$request->Phone_no;
        $new_employee->email=$request->email;
        $new_employee->city=$request->city;
        $new_employee->woreda=$request->woreda;
        $new_employee->category=$request->category;
        $new_employee->house_no=$request->houseno;

        $new_employee->operation_location=$request->operation_location;
        $new_employee->private_pension_no=$request->private_pension_no;
        $new_employee->govt_pension_no=$request->gov_pension_no;
        $new_employee->marital_status=$request->marital_status;
        $new_employee->tin_no=$request->tin_no;
             
        $new_employee->maker=Auth::User()->username;
      //  dd($new_employee->save());
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
    
    }

    public function detail($id)
    {
        $employee_dto=[];    
       $employee=Employee::find($id);
        return view('hr\detail')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $job_positions=JobPosition::orderBy('name')->pluck('name','id');       
         $employee=Employee::findOrFail($id);        
         $job_id=$employee->job_position_id;
         $job=JobPosition::find($job_id);

         if($job==NULL){
        $job_name="";
         }
         else{
             $job_name=$job->name;            
         }
         
         
         $branch_id=$employee->branch_id;
         $branch=Branch::find($branch_id);
         $branch_name=$branch->branch_name;       
        return view('hr.update',['job_name'=>$job_name,'branch_name'=>$branch_name,
        'job_positions'=>$job_positions])->with('employee',$employee);
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
        $update_employee=Employee::find($id);  
        $valid_data=$request->validate([                     
            'enat_id'=>'required|unique:employees,enat_id,'.$id,
            'Phone_no'=>'required|unique:employees,phone_no,'.$id,            
            'email'=>'nullable|unique:employees,email,'.$id,             
            'govt_pension_no'=>'nullable|min:10|unique:employees,govt_pension_no,'.$id,
            'private_pension_no'=>'nullable|min:10|unique:employees,private_pension_no,'.$id,
            'tin_no'=>'nullable|min:10|unique:employees,tin_no,'.$id,  
            'job_position_id'=>'required',
            'job_position_step'=>'required',
            'branch_id'=>'required',
            'marital_status'=>'required',
            'gender'=>'required',
            'category'=>'required',
            'operation_location'=>'required',
            'employement_date'=>'required|date',          
        ]);  

       // dd($request->all());
                    
        $update_employee->enat_id=$request->enat_id;
        $update_employee->full_name=$request->full_name;
        $update_employee->gender=$request->gender;
        $update_employee->birth_date=$request->birth_date;
        $update_employee->job_position_id=$request->job_position_id;
        $update_employee->branch_id=$request->branch_id;
        $update_employee->Job_Position_Step=$request->job_position_step;
        $update_employee->employement_date=$request->employement_date;
        $update_employee->phone_no=$request->Phone_no;
        $update_employee->email=$request->email;
        $update_employee->city=$request->city;
        $update_employee->woreda=$request->woreda;
        $update_employee->category=$request->category;
        $update_employee->house_no=$request->houseno;

        $update_employee->operation_location=$request->operation_location;
        $update_employee->private_pension_no=$request->private_pension_no;
        $update_employee->govt_pension_no=$request->gov_pension_no;
        $update_employee->marital_status=$request->marital_status;
        $update_employee->tin_no=$request->tin_no;
               
        $update_employee->maker=Auth::User()->username;
      
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
    public function users(){
        $users=User::all();
        return json_encode($users);
    }
       public function search(Request $request)
    {
         $name=$request->queryemp;          
        $employees =DB::table('employees')->where('full_name','LIKE',"$name%")->paginate(10);          
       //dd($employees);
        return view('hr.hr',['employees'=> $employees]);
       
    }
}
