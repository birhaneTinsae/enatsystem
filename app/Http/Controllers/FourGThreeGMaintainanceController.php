<?php

namespace App\Http\Controllers;

use App\Model\FourGThreeGMaintainance;
use Illuminate\Http\Request;
use App\Branch;
use App\Employee;

class FourGThreeGMaintainanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $networks=FourGThreeGMaintainance::paginate();
        return view('network.4g.4g',['networks'=>$networks]);
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
        $employees=Employee::all();
        return view('network.4g.new',['branches'=>$branches,"employees"=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maintainance=new FourGThreeGMaintainance;
        $maintainance->branch_id =$request->branch;
        $maintainance->employee_id =$request->employee;
        $maintainance->connection_type =$request->connection_type;
        $maintainance->service_type =$request->service_type;
        $maintainance->service_no =$request->service_no;
        $maintainance->imei_no =$request->device_imei;
        $maintainance->serial_no=$request->device_no;
        $maintainance->sim_card_iccid_no =$request->sim_card_no;
        $maintainance->remarks =$request->remark;
        

        if($maintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/fourG-threeG-maintainance');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FourGThreeGMaintainance  $fourGThreeGMaintainance
     * @return \Illuminate\Http\Response
     */
    public function show(FourGThreeGMaintainance $fourGThreeGMaintainance)
    {
        //
        return view('network.4g.show',['network'=>$fourGThreeGMaintainance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FourGThreeGMaintainance  $fourGThreeGMaintainance
     * @return \Illuminate\Http\Response
     */
    public function edit(FourGThreeGMaintainance $fourGThreeGMaintainance)
    {
        //
        $branches=Branch::all();
        $employees=Employee::all();
        return view('network.4g.update',['branches'=>$branches,'network'=>$fourGThreeGMaintainance,"employees"=>$employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FourGThreeGMaintainance  $fourGThreeGMaintainance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FourGThreeGMaintainance $fourGThreeGMaintainance)
    {
        //

        $fourGThreeGMaintainance->branch_id =$request->branch;
        $fourGThreeGMaintainance->employee_id =$request->employee;
        $fourGThreeGMaintainance->connection_type =$request->connection_type;
        $fourGThreeGMaintainance->service_type =$request->service_type;
        $fourGThreeGMaintainance->service_no =$request->service_no;
        $fourGThreeGMaintainance->imei_no =$request->device_imei;
        $fourGThreeGMaintainance->serial_no=$request->device_no;
        $fourGThreeGMaintainance->sim_card_iccid_no =$request->sim_card_no;
        $fourGThreeGMaintainance->remarks =$request->remark;
        

        if($fourGThreeGMaintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/fourG-threeG-maintainance');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FourGThreeGMaintainance  $fourGThreeGMaintainance
     * @return \Illuminate\Http\Response
     */
    public function destroy(FourGThreeGMaintainance $fourGThreeGMaintainance)
    {
        //
        
        if($fourGThreeGMaintainance->delete()){
           session()->flash('status','Successfully deleted');
            return \redirect('/fourG-threeG-maintainance');
        }
    }
    public function search(Request $request){
       
        $queries=\collect($request->all())->map(function($status){
            return $status;
       })->reject(function($status){
           return is_null($status);
       });
        $networks=FourGThreeGMaintainance::where($queries->toArray())->paginate();
        return view('network.4g.4g',['networks'=>$networks]);
    }
}
