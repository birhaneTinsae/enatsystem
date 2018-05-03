<?php
namespace App\Http\Controllers\HRM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Employee;
use App\JobPosition;
use App\ActingEmployee;
use Auth;
use Carbon\Carbon;
use App\Branch;
use Illuminate\Support\Facades\DB;
class ActingEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $results=ActingEmployee::paginate(10);    
       $count=0;
       $fjob_name=array();
       $tjob_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
      foreach($results as $result){
        $fjob_name[$count]= DB::table('job_positions')->where('id', $result->job_position_id)->value('name');
        $tjob_name[$count]= DB::table('job_positions')->where('id', $result->acting_job_position_id)->value('name');
        $fbranch_name[$count]= DB::table('branches')->where('id', $result->branch_id)->value('branch_name');
        $tbranch_name[$count]= DB::table('branches')->where('id', $result->acting_branch_id)->value('branch_name');
        $count++;
      }
         //dd($fjob_name);
      return view('hr\acting-employee\actingemployee',['Result'=> $results,
       'FromJob'=>$fjob_name,'ToJob'=>$tjob_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
         
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
        return view('hr\acting-employee\new',['job_positions'=>$job_positions]);
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
         $valid_data=$request->validate([                     
            'employee'=>'required',
            'acting_job_id'=>'required',
            'acting_branch_id'=>'required',
            'start_date'=>'required',             
            'status'=>'required',                      
        ]);  
        //dd($request->all());
        $new_acting_employee=new ActingEmployee;
        $emp=Employee::find($request->employee);      
        $branch=Branch::find($request->acting_branch_id);
        $job=JobPosition::find($request->acting_job_id);      
        $new_acting_employee->employee_id=$emp->id;
        $new_acting_employee->job_position_id=$emp->job_position_id;
        $new_acting_employee->branch_id=$emp->branch_id;
        $new_acting_employee->acting_job_position_id=$request->acting_job_id;
        $new_acting_employee->acting_branch_id=$request->acting_branch_id;
        $new_acting_employee->in_place_of=$request->in_place_of_employee;
        $new_acting_employee->replaced_by=$request->replaced_by;
        $new_acting_employee->remark=$request->remark;             
         $result = DB::table('acting_employees')
          ->where('employee_id', '=',$emp->id)
          ->where('status', '=','1')->get();
          $check=count($result);
          if($check>=1){
            $request->session()->flash('delete_status','
            Employee Selected is already in Acting Position');
            return redirect('/actingemployee');
          }
         $currentdate = date('Y-m-d');
         $new_acting_employee->start_date=$request->start_date;        
         $new_acting_employee->status=$request->status;        
         $new_acting_employee->maker=Auth::User()->username;        
        if(empty($request['end_date'])){
            $new_acting_employee->end_date=$currentdate;
            $new_acting_employee->notification="1";
            $end_date = Carbon::parse($currentdate);
            $start_date = Carbon::parse($request->start_date);
            $diff_in_months = $end_date->diffInMonths($start_date);
            $new_acting_employee->duration=$diff_in_months;                 
         }
         else{
         $start_date = Carbon::parse($request->start_date);
         $end_date = Carbon::parse($request->end_date);
         $diff_in_months = $end_date->diffInMonths($start_date);
         $new_acting_employee->end_date=$request->end_date;
         $new_acting_employee->notification="0";                
         $new_acting_employee->duration=$diff_in_months;            
         }
              
        if($new_acting_employee->save()){
            $request->session()->flash('status','Acting Employee record successfully created');
            return redirect('/actingemployee');
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
        $show=ActingEmployee::find($id);      
        $emp=Employee::find($show->employee_id);
        $emp_name=$emp->full_name;
        $emp_id=$emp->id;
        $from_job=JobPosition::find($show->job_position_id);
        $from_jobname=$from_job->name;
        $to_job=JobPosition::find($show->acting_job_position_id);
        $to_jobname=$to_job->name;
        $from_branch=Branch::find($show->branch_id);
        $from_branchname=$from_branch->branch_name;
        $to_branch=Branch::find($show->acting_branch_id);
        $to_branchname=$to_branch->branch_name;
        if($show->status==1){
            $status="Active";
        }
        else{
             $status="Terminated";
        }
         return view('hr\acting-employee\detail'
         ,['result'=>$show,'emp_name'=>$emp_name,'emp_id'=>$emp_id,'from_job'=>$from_jobname,'to_job'=>$to_jobname
         ,'from_branch'=>$from_branchname,'to_branch'=>$to_branchname,'status'=>$status])->with('Transferpromotion',$show);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit=ActingEmployee::find($id);
       $emp=Employee::find($edit->employee_id);
       $emp_name=$emp->full_name;       
       $replaced_by=Employee::find($edit->replaced_by);
       //
       if($replaced_by===NULL){
         $replaced_by_name="";
       }
       else{         
        $replaced_by_name=$replaced_by->full_name;
       }
      
       $inplace_of=Employee::find($edit->in_place_of);
        if($inplace_of===NULL){
         $inplace_of_name="";
       }
       else{
        $inplace_of_name=$inplace_of->full_name;
       }
      
       $emp_enat_id=$emp->enat_id;
       $from_job=JobPosition::find($edit->job_position_id);
       $from_jobname=$from_job->name;
       $to_job=JobPosition::find($edit->acting_job_position_id);
       $to_jobname=$to_job->name;
       $from_branch=Branch::find($edit->branch_id);
       $from_branchname=$from_branch->branch_name;
       $to_branch=Branch::find($edit->acting_branch_id);
       $to_branchname=$to_branch->branch_name;   
       $job_positions=JobPosition::orderBy('name')->pluck('name','id');     
         return view('hr\acting-employee\edit'
         ,['ActingEmployee'=>$edit,'emp_name'=>$emp_name,'from_job'=>$from_jobname,'to_job'=>$to_jobname
         ,'from_branch'=>$from_branchname,'to_branch'=>$to_branchname,'enat_id'=>$emp_enat_id
         ,'job_positions'=>$job_positions,'replaced_by'=>$replaced_by_name,'inplace_of'=>$inplace_of_name]);  
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
        $currentdate = date('Y-m-d');
        $acting_employee=ActingEmployee::find($id);       
        $emp=Employee::find($request->employee);                
        $result = DB::table('acting_employees')
          ->where('employee_id', '=',$request->new_employee)
          ->where('status', '=','1')->get();
          $check=count($result);        
            if($request->yesno==='No'){             
              $acting_employee->end_date=$currentdate;             
              $acting_employee->notification="1";
              $end_date = Carbon::parse($currentdate);
              $start_date = Carbon::parse($request->start_date);
              $diff_in_months = $end_date->diffInMonths($start_date);
              $acting_employee->duration=$diff_in_months;                 
         }
         else{                
         $start_date = Carbon::parse($request->start_date);
         $end_date = Carbon::parse($request->end_date);         
         $diff_in_months = $end_date->diffInMonths($start_date);
         $acting_employee->end_date=$request->end_date;         
         $acting_employee->notification="0";                 
         $acting_employee->duration=$diff_in_months;            
         }        
        $acting_employee->employee_id=$request->employee;
        $acting_employee->job_position_id=$emp->job_position_id;
        $acting_employee->branch_id=$emp->branch_id;       
        $acting_employee->acting_job_position_id=$request->acting_job_id;            
        $acting_employee->acting_branch_id=$request->acting_branch_id;
        $acting_employee->start_date=$request->start_date; 
        $acting_employee->in_place_of=$request->in_place_of_employee;
        $acting_employee->replaced_by=$request->replaced_by;      
        $acting_employee->status=$request->status;        
        $acting_employee->maker=Auth::User()->username;                             
        if($acting_employee->save()){
            $request->session()->flash('status',' record successfully Updated');
            return redirect('/actingemployee'); 
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
      //  $emp=Employee::all();
       $emp= DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.user_id')           
            ->select('employees.*', 'users.name')
            ->get();
             return json_encode($emp);
    }
    public function email(){
         $emp= DB::table('acting_employees')            
             ->join('branches', 'branches.id', '=', 'acting_employees.branch_id')    
             ->join('users', 'users.id', '=', 'acting_employees.user_id')       
              ->join('job_positions', 'job_positions.id', '=', 'acting_employees.job_position_id')  
               ->where('duration','>=',5)
                ->where('status', '=','1')         
              ->select('acting_employees.*', 'users.name as full_name','branches.branch_name','job_positions.name as job_name')
            ->get();

            
            return json_encode($emp); 
    }
    
  public function search(Request $request){
        $name=$request->queryemp;          
        $employees =DB::table('employees')->where('full_name','LIKE','%'.$name.'%')->get();         
        $emp_id = [];
        $count=0;
        foreach($employees as $employee){
        $emp_id[$count]=$employee->id;
        $count++;
    }
        $results=ActingEmployee::whereIn('employee_id', $emp_id)->paginate(2);
        $count2=0;
       $fjob_name=array();
       $tjob_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
      foreach($results as $result){
    $fjob_name[$count2]= DB::table('job_positions')->where('id', $result->job_position_id)->value('name');
    $tjob_name[$count2]= DB::table('job_positions')->where('id', $result->acting_job_position_id)->value('name');
    $fbranch_name[$count2]= DB::table('branches')->where('id', $result->branch_id)->value('branch_name');
    $tbranch_name[$count2]= DB::table('branches')->where('id', $result->acting_branch_id)->value('branch_name');
    $count2++;
      }      
        return view('hr\acting-employee\actingemployee',['Result'=> $results,
       'FromJob'=>$fjob_name,'ToJob'=>$tjob_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
    }

}
