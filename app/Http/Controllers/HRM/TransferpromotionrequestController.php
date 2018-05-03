<?php


namespace App\Http\Controllers\HRM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Branch;
use App\JobPosition;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Transferpromotionrequest;
class TransferpromotionrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $results=Transferpromotionrequest::paginate(10);
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
         
      return view('hr\TransferPromotionrequest\request',['Result'=> $results,
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
      return view('hr\Transferpromotionrequest\new',['job_positions'=>$job_positions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            
        $employee=Employee::find($request->employee);       
        $newrecord=new Transferpromotionrequest;
        $newrecord->employee_id=$request->employee;
        $newrecord->from_job_position=$employee->job_position_id;        
        $newrecord->to_job_position=$request->job_position_id;
        $newrecord->from_branch=$employee->branch_id;
        $newrecord->to_branch=$request->branch_id;
        $newrecord->salary=$employee->salary;       
        $newrecord->date=$request->start_date;
        $newrecord->reason=$request->reason;
        $newrecord->remark=$request->remark;
        $newrecord->maker=Auth::user()->username;    
            if($newrecord->save()){
            $request->session()->flash('status','New record successfully added');
            return redirect('/transferpromotionrequest');
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
        $show=Transferpromotionrequest::find($id);      
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
        $job_positions=JobPosition::orderBy('name')->pluck('name','id');
       //dd($to_branch);
         return view('hr\Transferpromotionrequest\detail'
         ,['transferpromotion'=>$show,'emp_name'=>$emp_name,'from_job'=>$from_jobname,'to_job'=>$to_jobname
         ,'from_branch'=>$from_branchname,'to_branch'=>$to_branchname,'emp_id'=>$emp_id,'job_positions'=>$job_positions])->with('Transferpromotion',$show);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit=Transferpromotionrequest::find($id);
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
       //dd($to_branch);
         return view('hr\Transferpromotionrequest\edit'
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
          $update=Transferpromotionrequest::find($id);
          $employee=Employee::find($request->employee);
          $update->employee_id=$request->employee;
          $update->from_job_position=$employee->job_position_id;
          $update->from_branch=$employee->branch_id;
          $update->to_job_position=$request->job_id;
          $update->to_branch=$request->branch_name;
          $update->reason=$request->reason;
          $update->date=$request->date;
          $update->reason=$request->reason;
          $update->remark=$request->remark;
          $update->maker=Auth::user()->username;
          $update->save();
          if($update->save()){
            $request->session()->flash('status',' record successfully updated');
            return redirect('/transferpromotionrequest');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $delete=Transferpromotionrequest::find($id);
       $delete->delete();
         \Session::flash('delete_status',' Record  closed.');
         return redirect('/transferpromotionrequest');
         
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
$results=Transferpromotionrequest::whereIn('employee_id', $emp_id)->paginate(2);
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
       return view('hr\TransferPromotionrequest\request',['Result'=> $results,
       'FromJob'=>$fjob_name,'ToJob'=>$tjob_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
        }
}
