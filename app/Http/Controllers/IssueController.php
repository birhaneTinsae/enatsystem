<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Employee;
use App\System;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $issues=Issue::where('branch_id',Auth::user()->employee->branch->id)->get();
       return view('issue.issue',['issues'=>$issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees=Employee::where('branch_id',Auth::user()->employee->branch->id)->pluck('name','id');
        $systems=System::all();
        return view('issue.new',['employees'=>$employees,'systems'=>$systems]);
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
        $valid_date=$request->validate([

        ]);
        $new_issue=new Issue;
        $new_issue->employee_id=$request->employee;
        $new_issue->from_date=$request->from_date;
        $new_issue->to_date=$request->to_date;
        $new_issue->reason=$request->reason;
        $new_issue->branch_id=Auth::user()->employee->branch->id;
        $new_issue->system_id=$request->request_system;
        $new_issue->status='active';
        $new_issue->type=$request->request_type;
        if($new_issue->save()){
            $request->session()->flash('status','Issue successfully added');
            return redirect('/issue');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
