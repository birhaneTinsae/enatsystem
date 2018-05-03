<?php

namespace App\Http\Controllers\HRM;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transferpromotion;
use App\Employee;
use App\User;
use App\Branch;
use App\JobPosition;
use Auth;
class TransferpromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results=Transferpromotion::paginate(10);
       // dd($results);
    $count=0;
       $fjob_name=array();
       $tjob_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
      foreach($results as $result){
        $fjob_name[$count]= DB::table('job_positions')->where('id', $result->from_job_position)->value('name');
    $tjob_name[$count]= DB::table('job_positions')->where('id', $result->to_job_position)->value('name');
    $fbranch_name[$count]= DB::table('branches')->where('id', $result->from_branch)->value('branch_name');
    $tbranch_name[$count]= DB::table('branches')->where('id', $result->to_branch)->value('branch_name');
   $count++;
      }
      //dd($fjob_name);
       
       return view('hr\Transferpromotion\transfer-promotion',['Result'=> $results,
       'FromJob'=>$fjob_name,'ToJob'=>$tjob_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_positions=JobPosition::orderBy('name')->pluck('name','id');
          return view('hr\Transferpromotion\new',['job_positions'=>$job_positions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
         $valid_data=$request->validate([                     
            'employee'=>'required',
            'job_id'=>'required',
            'branch_id'=>'required',
            'job_position_step'=>'required',             
            'reason'=>'required',                      
        ]);  
        $employee=Employee::find($request->employee);
        $newrecord=new Transferpromotion;
        $newrecord->employee_id=$request->employee;
        $newrecord->from_job_position=$employee->job_position_id;        
        $newrecord->to_job_position=$request->job_id;
        $newrecord->from_branch=$employee->branch_id;
        $newrecord->to_branch=$request->branch_id;
        $newrecord->prev_job_position_step=$employee->Job_Position_Step;
        $newrecord->new_job_position_step=$request->job_position_step;
        $newrecord->date=$request->start_date;
        $newrecord->reason=$request->reason;
        $newrecord->remark=$request->remark;
        $newrecord->maker=Auth::user()->username;
        //Update Employee  Table      
            DB::table('employees')
            ->where('id', $request->employee)
            ->update(['job_position_id' => $request->job_id]);

            DB::table('employees')
            ->where('id', $request->employee)
            ->update(['branch_id' => $request->branch_id]);

             DB::table('employees')
            ->where('id', $request->employee)
            ->update(['Job_Position_Step' => $request->job_position_step]);
            if($newrecord->save()){
            $request->session()->flash('status','New record successfully added');
            return redirect('/transfer');
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
        $show=Transferpromotion::find($id);      
        $emp=Employee::find($show->employee_id);
        $emp_name=$emp->full_name;
        $emp_id=$emp->id;
        $from_job=JobPosition::find($show->from_job_position);
        $from_jobname=$from_job->name;
        $to_job=JobPosition::find($show->to_job_position);
        $to_jobname=$to_job->name;
        $from_branch=Branch::find($show->from_branch);
        $from_branchname=$from_branch->branch_name;
        $to_branch=Branch::find($show->to_branch);
        $to_branchname=$to_branch->branch_name;       
         return view('hr\Transferpromotion\detail'
         ,['transferpromotion'=>$show,'emp_name'=>$emp_name,'from_job'=>$from_jobname,'to_job'=>$to_jobname
         ,'from_branch'=>$from_branchname,'to_branch'=>$to_branchname,'emp_id'=>$emp_id])->with('Transferpromotion',$show);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit=Transferpromotion::find($id);
       $emp=Employee::find($edit->employee_id);
       $emp_name=$emp->full_name;
       $from_job=JobPosition::find($edit->from_job_position);
       $from_jobname=$from_job->name;
        $to_job=JobPosition::find($edit->to_job_position);
        $to_jobname=$to_job->name;
        $from_branch=Branch::find($edit->from_branch);
        $from_branchname=$from_branch->branch_name;
        $to_branch=Branch::find($edit->to_branch);
        $to_branchname=$to_branch->branch_name;  
         $job_positions=JobPosition::orderBy('name')->pluck('name','id');   
         return view('hr\Transferpromotion\edit'
         ,['transferpromotion'=>$edit,'emp_name'=>$emp_name,'from_job'=>$from_jobname,'to_job'=>$to_jobname
         ,'from_branch'=>$from_branchname,'to_branch'=>$to_branchname,'job_positions'=>$job_positions]);        
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
          dd($request->all());
          $update=Transferpromotion::find($id);
          $update->employee_id=$request->emp_id;
          $update->to_job_position=$request->job_id;
          $update->to_branch=$request->branch_name;
          $update->new_salary=$request->newsalary;
          $update->date=$request->start_date;
          $update->reason=$request->reason;
          $update->remark=$request->remark;
          $update->maker=Auth::user()->username;       
          if($update->save()){
            $request->session()->flash('status',' record successfully updated');
            return redirect('/transfer');
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
        $delete=Transferpromotion::find($id);
        $delete->delete();
         \Session::flash('delete_status',' Record  closed.');
         return redirect('/transfer');
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
$results=Transferpromotion::whereIn('employee_id', $emp_id)->paginate(2);
 $count2=0;
       $fjob_name=array();
       $tjob_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
      foreach($results as $result){
        $fjob_name[$count2]= DB::table('job_positions')->where('id', $result->from_job_position)->value('name');
    $tjob_name[$count2]= DB::table('job_positions')->where('id', $result->to_job_position)->value('name');
    $fbranch_name[$count2]= DB::table('branches')->where('id', $result->from_branch)->value('branch_name');
    $tbranch_name[$count2]= DB::table('branches')->where('id', $result->to_branch)->value('branch_name');
   $count2++;
      }       
       return view('hr\Transferpromotion\transfer-promotion',['Result'=> $results,
       'FromJob'=>$fjob_name,'ToJob'=>$tjob_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
        }
       
}
