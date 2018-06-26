<?php

namespace App\Http\Controllers\HRM;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JobPosition;
use App\JobPositionStep;
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
        if($request->status=='true'){
        //    dd($request->all());
            $valid_data=$request->validate([
            'name'=>'required|unique:job_positions',
            'grade'=>'required',
            'base'=>'required',
            'step1'=>'required',
            'step2'=>'required',
            'step3'=>'required',
            'step4'=>'required',
            'step5'=>'required',
            'step6'=>'required',
            'step7'=>'required',
            'step8'=>'required',
            'step9'=>'required',
            'step10'=>'required',
        ]);       
        $job_position=new JobPosition;         
        $job_position->name=$request->name;
        $job_position->grade=$request->grade;
        $job_position->steps_and_grade="1";
        $job_position->maker=Auth::user()->username;
        $job_position->save();  
        $job_id=$job_position->id;              
        for($i =0;$i<=10;$i++)
        {            
         $job_position_step=new JobPositionStep;
         $job_position_step->job_position_id=$job_id;
         $job_position_step->step=$i;
         $job_position_step->maker=Auth::user()->username;
         switch ($i) {
            case 0:
            $job_position_step->amount=$request->base;
                break;
            case 1:
            $job_position_step->amount=$request->step1;
                break;
            case 2:
            $job_position_step->amount=$request->step2;
                 break;            
            case 3:
            $job_position_step->amount=$request->step3;
                break;
            case 4:
            $job_position_step->amount=$request->step4;
                break;
            case 5:
            $job_position_step->amount=$request->step5;
                break;
            case 6:
            $job_position_step->amount=$request->step6;
                break;
            case 7:
            $job_position_step->amount=$request->step7;
                break;
            case 8:
            $job_position_step->amount=$request->step8;
                break;
            case 9:
            $job_position_step->amount=$request->step9;
                break;
            case 10:
            $job_position_step->amount=$request->step10;
                break; 
                    
        }        

        $job_position_step->save();
       
        }         
        }
        else{                  
            $valid_data=$request->validate([
            'name'=>'required|unique:job_positions',
            'salary'=>'required',            
        ]);
        $job_position=new JobPosition;             
        $job_position->name=$request->name;
        $job_position->grade="";
        $job_position->steps_and_grade="0";
        $job_position->maker=Auth::user()->username;
        $job_position->save();  
        $job_id=$job_position->id;              
        for($i =0;$i<=10;$i++)
        {            
         $job_position_step=new JobPositionStep;
         $job_position_step->job_position_id=$job_id;         
         $job_position_step->step=$i;
         $job_position_step->maker=Auth::user()->username;
         switch ($i) {
            case 0:
            $job_position_step->amount=$request->salary;
                break;
            case 1:
            $job_position_step->amount="";
                break;
            case 2:
            $job_position_step->amount="";
                 break;            
            case 3:
            $job_position_step->amount="";
                break;
            case 4:
            $job_position_step->amount="";
                break;
            case 5:
            $job_position_step->amount="";
                break;
            case 6:
            $job_position_step->amount="";
                break;
            case 7:
            $job_position_step->amount="";
                break;
            case 8:
            $job_position_step->amount="";
                break;
            case 9:
           $job_position_step->amount="";
                break;
            case 10:
           $job_position_step->amount="";
                break; 
                                   
        }      
         

        $job_position_step->save();
       
        }        

        }
       
        
        
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
       $job_step=JobPositionStep::where('job_position_id',$id);
       //dd($edit->job_position_steps[0]);
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
          if($request->status=='true'){   
                        
               $valid_data=$request->validate([                  
            'name'=>'required|unique:job_positions,name,'.$id,
            'grade'=>'required',
            'base'=>'required',
            'step1'=>'required',
            'step2'=>'required',
            'step3'=>'required',
            'step4'=>'required',
            'step5'=>'required',
            'step6'=>'required',
            'step7'=>'required',
            'step8'=>'required',
            'step9'=>'required',
            'step10'=>'required',
        ]);   
           
               
         $update->name=$request->name;        
         $update->grade=$request->grade;          
         $update->steps_and_grade="1";    
        // dd($request->all());     
         for($i=0;$i<=10;$i++)
        {            
         $job_position_step=JobPositionStep::find($update->job_position_steps[$i]->id);
        // dd( $job_position_step);
         $job_position_step->job_position_id=$id;
         $job_position_step->step=$i;
         $job_position_step->maker=Auth::user()->username;
         switch ($i) {
            case 0:
            $job_position_step->amount=$request->base;
                break;
            case 1:
            $job_position_step->amount=$request->step1;
                break;
            case 2:
            $job_position_step->amount=$request->step2;
                 break;            
            case 3:
            $job_position_step->amount=$request->step3;
                break;
            case 4:
            $job_position_step->amount=$request->step4;
                break;
            case 5:
            $job_position_step->amount=$request->step5;
                break;
            case 6:
            $job_position_step->amount=$request->step6;
                break;
            case 7:
            $job_position_step->amount=$request->step7;
                break;
            case 8:
            $job_position_step->amount=$request->step8;
                break;
            case 9:
            $job_position_step->amount=$request->step9;
                break;
            case 10:
            $job_position_step->amount=$request->step10;
                break;                           
        } 
    }
         

        $job_position_step->save();       
        }
        
        else{                   
            // dd($request->all());   
             $valid_data=$request->validate([                 
            'name'=>'required|unique:job_positions,name,'.$id,            
            'salary'=>'required',            
        ]);       
                   // dd($valid_data);
         $update->name=$request->name;        
         $update->grade="";
         $update->steps_and_grade="0";                
         for($i=0;$i<=10;$i++)
        {            

         $job_position_step=JobPositionStep::find($update->job_position_steps[$i]->id);        
         $job_position_step->job_position_id=$id;
         $job_position_step->step=$i;         
         $job_position_step->maker=Auth::user()->username;
                //dd($request->all());
         switch ($i) {           
            case 0:
            $job_position_step->amount=$request->salary;
                break;
            case 1:
            $job_position_step->amount="";
                break;
            case 2:
            $job_position_step->amount="";
                 break;            
            case 3:
            $job_position_step->amount="";
                break;
            case 4:
            $job_position_step->amount="";
                break;
            case 5:
            $job_position_step->amount="";
                break;
            case 6:
            $job_position_step->amount="";
                break;
            case 7:
            $job_position_step->amount="";
                break;
            case 8:
            $job_position_step->amount="";
                break;
            case 9:
            $job_position_step->amount="";
                break;
            case 10:
            $job_position_step->amount="";
                break;                           
        } 
        $job_position_step->save();  
    }
         

       
     
        }
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
        $job_positions =JobPosition::where('name','LIKE',"$name%")->paginate(2);          
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
