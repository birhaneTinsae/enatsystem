<?php

namespace App\Http\Controllers;

use App\Model\TTRegister;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TTRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tts=TTRegister::paginate();
        
        return view('network.ttRegister.tt',['tts'=>$tts]);

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
        return view('network.ttRegister.new',['branches'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $maintainance=new TTRegister;
        $maintainance->branch_id =$request->branch;
        $maintainance->registered_at =now();
        $maintainance->disconnected_at =$request->disconnected_at;
        // $maintainance->reconnected_at =$request->reconnected_at;
        $maintainance->follow_up_no =$request->follow_up_no;
        $maintainance->status =$request->status;
        $maintainance->remarks =$request->remark;
        $maintainance->reported_by=Auth::user()->username;
 

        if($maintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/tt-maintainance');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\TTRegister  $tTRegister
     * @return \Illuminate\Http\Response
     */
    public function show(TTRegister $tTRegister)
    {
       
        $branches=Branch::all();
        return view('network.ttRegister.show',['tt'=>$tTRegister,'branches'=>$branches]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\TTRegister  $tTRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(TTRegister $tTRegister)
    {
        //
        $branches=Branch::all();
        return view('network.ttRegister.update',['tt'=>$tTRegister,'branches'=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\TTRegister  $tTRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TTRegister $tTRegister)
    {
        //
      
        $tTRegister->branch_id =$request->branch;
      
        $tTRegister->reconnected_at =now();
        
        $tTRegister->status =$request->status;
        if($request->status=="completed"){
            $tTRegister->time_taken=$tTRegister->created_at->diffInSeconds(now());
        }

        $tTRegister->remarks =$request->remark;
 

        if($tTRegister->save()){
            $request->session()->flash('status','Successfully updated');
            return \redirect('/tt-maintainance');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\TTRegister  $tTRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(TTRegister $tTRegister)
    {
        //
        if($tTRegister->delete()){
            // session()->flash('status','Successfully updated');
            return \redirect('/tt-maintainance');
        }
    }
    /**
     * 
     */
    public function report(){
        $branches=Branch::all();
        return view('network.ttRegister.report',['branches'=>$branches]);
    }
    /**
     * 
     */
    public function generate_report(Request $request){
   
        $queries=\collect($request->all())->map(function($query){
            return $query;
       })->reject(function($status){
           return is_null($status);
       });

       $filtered=$queries->only(['branch_id','status']);

        switch ($request->report_type) {
            case '1':
                $tts=TTRegister::where( $filtered->toArray())
                ->whereBetween('created_at',[$request->query("from"),$request->query("to")])->paginate();
                return view('network.ttRegister.html',['tts'=>$tts]);
                break;
            case '2':
                $tts=TTRegister::where('status',$request->status)->paginate();
                return view('network.ttRegister.html',['tts'=>$tts]);
                break;
            case '3':
                $tts=TTRegister::where($filtered->toArray()) 
                ->whereBetween('created_at',[$request->from,$request->to])->max('time_taken')->get();

                // $completion_laps=$tts->map(function($item,$key){
                //     return $item->time_taken;
                // });
                // $tts= $completion_laps->max();
                return view('network.ttRegister.html',['tts'=>$tts]);
                break;
            case '4':
                $tts=TTRegister::where($filtered->toArray()) 
                ->whereBetween('created_at',[$request->from,$request->to])->avg('time_taken')->get();

                // $completion_laps=$tts->map(function($item,$key){
                //     return $item->created_at->floatDiff($item->updated_at);
                // });
                return view('network.ttRegister.html',['tts'=>$tts]);
                break;
            default:
                # code...
                break;
        }
    }
    public function search(Request $request){
        
        $tts=TTRegister::where('status',$request->query('status'))->paginate();
        return view('network.ttRegister.tt',['tts'=>$tts]);
    }

    public function date_diff($oldDate,$newDate){
        return null;
    }
}
