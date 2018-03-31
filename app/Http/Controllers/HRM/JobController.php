<?php

namespace App\Http\Controllers\HRM;

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
        //
        $valid_data=$request->validate([
            'name'=>'required|unique:job_positions',
            'operation_class'=>'required',
        ]);
        $job_position=new JobPosition;
        $job_position->name=$request->job_position_name;
        $job_position->operation_class=$request->job_position_operation_class;
        $job_position->grade=$request->grade;
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
        //
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
         $update->operation_class=$request->operation_class;
         $update->grade=$request->grade;
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
}
