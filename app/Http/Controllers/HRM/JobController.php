<?php

namespace App\Http\Controllers\HRM;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JobPosition;
use Auth;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job_positions=JobPosition::all();
        $job_positions=JobPosition::paginate(10);
        return view('hr\job\job',['job_positions'=>$job_positions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hr.job.new');
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
            'name'=>'required|unique:job_positions',
            'operation_class'=>'required',
        ]);
        $job_position=new JobPosition;
        $job_position->name=$request->job_position_name;
        $job_position->grade=$request->grade;
        $job_position->base=$request->base;
        $job_position->step1=$request->step1;
        $job_position->step2=$request->step2;
        $job_position->step3=$request->step3;
        $job_position->step4=$request->step4;
        $job_position->step5=$request->step5;
        $job_position->step6=$request->step6;
        $job_position->step7=$request->step7;
        $job_position->step8=$request->step8;
        $job_position->step9=$request->step9;
        $job_position->step10=$request->step10;

        if($job_position->save()){
            $request->session()->flash('status','Job Position Successfully added');
            return redirect('job');
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
         $job=JobPosition::find($id);
        return view('hr\job\detail')->with('jobs',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit=JobPosition::findOrFail($id);
       return view('hr\job.update')->with('job',$edit);
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
         $update=JobPosition::find($id);
         $update->name=$request->name;        
         $update->grade=$request->grade;
         $update->base=$request->base;
          $update->step1=$request->step1;
           $update->step2=$request->step2;
           $update->step3=$request->step3;
            $update->step4=$request->step4;
             $update->step5=$request->step5;
              $update->step6=$request->step6;              
                $update->step7=$request->step7;
                 $update->step8=$request->step8;
                  $update->step9=$request->step9;
                   $update->step10=$request->step10;

         $update->maker=Auth::user()->username;
        if($update->save()){
            $request->session()->flash('status','Record Successfully Updated');
            return redirect('job');
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
    public function search(Request $request)
    {
         $name=$request->queryjob;          
        $job_positions =DB::table('job_positions')->where('name','LIKE','%'.$name.'%')->paginate(2);          
         return view('hr\job\job',['job_positions'=>$job_positions]);
    }

    //  public function steps($id){
    //    $steps= Branch::find($id)->users;
    //    $employees_detail=[];
    //    $counter=0;

    //    foreach($employees as $employee){
    //       $employees_detail[$counter]=$employee;         
    //       $counter++;
    //    }
    //    return json_encode( $employees_detail);
    // }
}
