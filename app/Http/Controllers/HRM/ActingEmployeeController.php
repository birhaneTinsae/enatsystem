<?php
namespace App\Http\Controllers\HRM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Employee;
use App\JobPosition;
use App\ActingEmployee;
use Auth;
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
        $home_branch=$emp->branch->branch_name;       
        $employee_name=$emp->User->name;
        $job_position=$emp->Job_position->name;            
        $acting_job_position=DB::table('job_positions')->where('id', '=',$request->acting_job_id)->value('name');
        $acting_branch_name=DB::table('branches')-> where('id', '=',$request->acting_branch_id)->value('branch_name');    
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
        $new_acting_employee->user_id=$request->new_employee;
        $new_acting_employee->employee_name=$employee_name;
        $new_acting_employee->job_position=$job_position;
        $new_acting_employee->home_branch=$home_branch;
        $new_acting_employee->acting_job_position=$acting_job_position;            
        $new_acting_employee->acting_branch_name=$acting_branch_name;
        $new_acting_employee->start_date=$request->start_date;
        $new_acting_employee->end_date=$currentdate;
        $new_acting_employee->status=$request->status;        
        $new_acting_employee->maker=Auth::User()->username;
        $sdate = $request->start_date;
        $edate = $currentdate;
        $ts1 = strtotime($sdate);
        $ts2 = strtotime($edate);
        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);
        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
         $new_acting_employee->duration=$diff;                 
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
        $ActemployeeDTA['employee_name']=$actemployee->employee_name;
        $ActemployeeDTA['job_position']=$actemployee->job_position;
        $ActemployeeDTA['home_branch']=$actemployee->home_branch;
        $ActemployeeDTA['acting_job_position']=$actemployee->acting_job_position;
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
        $user_id=DB::table('acting_employees')->where('id', '=',$id)->value('user_id');
        $emp=Employee::find($user_id);
        $home_branch=$emp->branch->branch_name;       
        $employee_name=$emp->User->name;
        $job_position=$emp->Job_position->name;
       
         $result = DB::table('acting_employees')
          ->where('user_id', '=',$request->new_employee)
          ->where('status', '=','1')->get();
          $check=count($result);
          if($check>=1){
            $request->session()->flash('delete_status','
            Employee Selected is already in Acting Position');
            return redirect('/actingemployee');
          }
        $new_acting_employee=ActingEmployee::find($id);
        $new_acting_employee->user_id=$user_id;
        $new_acting_employee->employee_name=$employee_name;
        $new_acting_employee->job_position=$job_position;
        $new_acting_employee->home_branch=$home_branch;
        $new_acting_employee->acting_job_position=$request->acting_job_position;            
        $new_acting_employee->acting_branch_name=$request->acting_branch_name;
        $new_acting_employee->start_date=$request->start_date;
        $new_acting_employee->end_date=$request->end_date;
        $new_acting_employee->status=$request->status;        
        $new_acting_employee->maker=Auth::User()->username;
        $sdate = $request->start_date;
        $edate = $request->end_date;
        $ts1 = strtotime($sdate);
        $ts2 = strtotime($edate);
        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);
        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $new_acting_employee->duration= $diff;                 
        if($new_acting_employee->save()){
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
}

