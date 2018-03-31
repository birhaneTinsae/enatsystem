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
    $acting=ActingEmployee::paginate(10);
       return view('hr\acting-employee\actingemployee',['employees'=> $acting]);
         
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
        $new_acting_employee=new ActingEmployee;
        $emp=Employee::find($request->new_employee);
//dd($diff_in_days);
     //dd($request->all());
        $user=User::find($emp->user_id);
        $branch=Branch::find($request->acting_branch_id);
        $job=JobPosition::find($request->acting_job_id);
        $act_br_name=$branch->branch_name;
        $new_acting_employee->user_id=$emp->user_id;
        $new_acting_employee->employee_id=$emp->id;
        $new_acting_employee->job_position_id=$emp->job_position_id;
        $new_acting_employee->branch_id=$user->branch_id;
        $new_acting_employee->acting_job_position_name=$job->name;
        $new_acting_employee->acting_branch_name=$branch->branch_name;        
         $result = DB::table('acting_employees')
          ->where('user_id', '=',$request->new_employee)
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
         $sdate = $request->start_date;
        if(empty($request['end_date'])){
            $new_acting_employee->end_date=$currentdate;
            $new_acting_employee->remark="1";
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
         $new_acting_employee->remark="0";
         $edate = $currentdate;        
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
        $ActemployeeDTA=[];
        $actemployee=ActingEmployee::find($id);
        $user=User::find($actemployee->user_id);
        $emp=Employee::find($actemployee->employee_id);
        $br=Branch::find($actemployee->branch_id);
        $ActemployeeDTA['employee_name']=$user->name;
        $ActemployeeDTA['job_position']=$emp->job_position->name;
        $ActemployeeDTA['home_branch']=$br->branch_name;
        $ActemployeeDTA['acting_job_position_name']=$actemployee->acting_job_position_name;
        $ActemployeeDTA['acting_branch_name']=$actemployee->acting_branch_name;
        $ActemployeeDTA['start_date']=$actemployee->start_date;
        $ActemployeeDTA['end_date']=$actemployee->end_date;
        $ActemployeeDTA['status']=$actemployee->status;
        $ActemployeeDTA['emp_id']=$id;
        return json_encode( $ActemployeeDTA); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $acting_emp = ActingEmployee::find($id);
        return view('hr\acting-employee\edit')->withActingEmployee($acting_emp); */
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
    $id=$request->empid; 
//dd($request->all());
 $currentdate = date('Y-m-d');
        $acting_employee=ActingEmployee::find($id);
        $emp=Employee::find($acting_employee->employee_id);
        $user=User::find($emp->user_id);
        //dd($request->all());
        $result = DB::table('acting_employees')
          ->where('user_id', '=',$request->new_employee)
          ->where('status', '=','1')->get();
          $check=count($result);
          if($check>=1){
            $request->session()->flash('delete_status','
            Employee Selected is already in Acting Position');
            return redirect('/actingemployee');
          }
            if($request->enddate==='No'){
            $acting_employee->end_date=$currentdate;
            $acting_employee->remark="1";
            $end_date = Carbon::parse($currentdate);
             $start_date = Carbon::parse($request->start_date);
               $diff_in_months = $end_date->diffInMonths($start_date);
                $new_acting_employee->duration=$diff_in_months;                 
         }
         else{

            //dd($request->end_date);
           
        $start_date = Carbon::parse($request->start_date);
         $end_date = Carbon::parse($request->end_date);         
         $diff_in_months = $end_date->diffInMonths($start_date);
         $acting_employee->end_date=$request->end_date;
         $acting_employee->remark="0";
         $edate = $currentdate;        
         $acting_employee->duration=$diff_in_months;            
         }

        $acting_employee->user_id=$emp->user_id;
        $acting_employee->employee_id=$acting_employee->employee_id;
        $acting_employee->job_position_id=$acting_employee->job_position_id;
        $acting_employee->branch_id=$user->branch_id;       
        $acting_employee->acting_job_position_name=$request->acting_job_position_name;            
        $acting_employee->acting_branch_name=$request->acting_branch_name;
        // $acting_employee->start_date=$request->start_date;
        // $acting_employee->end_date=$request->end_date;
        $acting_employee->status=$request->status;        
        $acting_employee->maker=Auth::User()->username;
        $sdate = $request->start_date;
        $edate = $request->end_date;
        // $start_date = Carbon::parse($request->start_date);
        // $end_date = Carbon::parse($request->end_date);
        // $diff_in_months = $end_date->diffInMonths($start_date);
        // $acting_employee->duration= $diff_in_months;                 
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
$userss= DB::table('acting_employees')            
             ->join('branches', 'branches.id', '=', 'acting_employees.branch_id')    
             ->join('users', 'users.id', '=', 'acting_employees.user_id')       
            ->join('job_positions', 'job_positions.id', '=', 'acting_employees.job_position_id')  
            ->where('users.name', 'like', '%'.$name.'%')                     
            ->select('acting_employees.*', 'users.name as full_name','branches.branch_name','job_positions.name as job_name')
            ->get();
 $data = [];
 $count=0;
foreach($userss as $user){
    $data[$count]=$user->id;
    $count++;
}
$acting=ActingEmployee::whereIn('id', $data)->paginate(2);
    return view('hr\acting-employee\actingemployee',['employees'=> $acting]);
    }

}

