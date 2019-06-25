<?php

namespace App\Http\Controllers;

use App\Model\MaintainanceInfo;
use App\Branch;
use App\User;
use Illuminate\Http\Request;

class MaintainanceInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maintainanceInfos=MaintainanceInfo::paginate();
        $branches=Branch::all();
        return view('network.maintainanceInfo.maintainance',['maintainanceInfos'=>$maintainanceInfos,'branches'=>$branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches=Branch::all();
        return view('network.maintainanceInfo.new',['branches'=>$branches]);
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
        $maintainance=new MaintainanceInfo;
        $maintainance->branch_id =$request->branch;
        // $maintainance->received_at =$request->received_at;
        $maintainance->item =$request->item;
        $maintainance->problem_type =$request->problem_type;
        $maintainance->action=$request->action;
        // $maintainance->completion_date =$request->final_date;
        $maintainance->status =$request->status;
        $maintainance->remarks =$request->remark;
        $maintainance->received_by ="test user";
        $maintainance->received_at =now();



        if($maintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/maintainance-info');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MaintainanceInfo  $maintainanceInfo
     * @return \Illuminate\Http\Response
     */
    public function show(MaintainanceInfo $maintainanceInfo)
    {
        //
        $branches=Branch::all();
        return view('network.maintainanceInfo.show',["maintainanceInfo"=>$maintainanceInfo,"branches"=>$branches]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\MaintainanceInfo  $maintainanceInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintainanceInfo $maintainanceInfo)
    {
        //
        $branches=Branch::all();
        $users=User::role('support')->get();
        return view('network.maintainanceInfo.update',["maintainanceInfo"=>$maintainanceInfo,"branches"=>$branches,"users"=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MaintainanceInfo  $maintainanceInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintainanceInfo $maintainanceInfo)
    {
   
        $maintainanceInfo->branch_id =$request->branch;
        
        $maintainanceInfo->item =$request->item;
        $maintainanceInfo->problem_type =$request->problem_type;
        $maintainanceInfo->action=$request->action;
        $maintainanceInfo->completion_date =now();
        $maintainanceInfo->assigned_to=$request->assigned_to!=null?$request->assigned_to:null;
        if($request->status){
            $maintainanceInfo->time_taken= $maintainanceInfo->created_at->diffInSeconds(now());
        }
        $maintainanceInfo->status =$request->status;
        $maintainanceInfo->remarks =$request->remark;

        if($maintainanceInfo->save()){
            $request->session()->flash('status','Successfully updated');
            return \redirect('/maintainance-info');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MaintainanceInfo  $maintainanceInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintainanceInfo $maintainanceInfo)
    {
        if($maintainanceInfo->delete()){
        //    session()->flash('status','Successfully deleted');
            return \redirect('/maintainance-info');
        }
    }

    public function report(){
        $branches=Branch::all();
        return view('network.maintainanceInfo.report',["branches"=>$branches]);
    }

    public function generate_report(Request $request){
       
        $queries=\collect($request->all())->map(function($query){
            return $query;
            })->reject(function($query){
                return is_null($query);
        });

        switch ($request->report_type) {
            case '1':
               
                $maintainanceInfos=MaintainanceInfo::where('assigned_to',$request->assigned_to)
                ->whereBetween('created_at',[$request->from,$request->to])->paginate();
                return view('network.maintainanceInfo.html',['maintainanceInfos'=>$maintainanceInfos]); 
                break;
            case '2':
            $maintainanceInfos=MaintainanceInfo::where('status',$request->status)
            ->whereBetween('created_at',[$request->from,$request->to])->paginate();
            return view('network.maintainanceInfo.html',['maintainanceInfos'=>$maintainanceInfos]);
                break;
            case '3':
            $maintainanceInfos=MaintainanceInfo::where('item',$request->item)
            ->whereBetween('created_at',[$request->from,$request->to])->paginate();
            return view('network.maintainanceInfo.html',['maintainanceInfos'=>$maintainanceInfos]);
                break; 
            case '4':
            $maintainanceInfos=MaintainanceInfo::where('problem_type',$request->problem_type)
                ->whereBetween('created_at',[$request->from,$request->to])->paginate();
                return view('network.maintainanceInfo.html',['maintainanceInfos'=>$maintainanceInfos]);
                break;
            case '5':
                $maintainanceInfos=MaintainanceInfo::where('branch',$request->branch)
                ->whereBetween('created_at',[$request->from,$request->to])->paginate();
                return view('network.maintainanceInfo.html',['maintainanceInfos'=>$maintainanceInfos]);
                break;    
            default:
                # code...
                break;
        }
        return ;
    }
    public function search(Request $request){
        $queries=\collect($request->all())->map(function($status){
            return $status;
       })->reject(function($status){
           return is_null($status);
       });
        $maintainanceInfos=MaintainanceInfo::where($queries->toArray())->paginate();

        $branches=Branch::all();
        return view('network.maintainanceInfo.maintainance',['maintainanceInfos'=>$maintainanceInfos,'branches'=>$branches]);
  
    }
}
