<?php

namespace App\Http\Controllers\FAM;
use Illuminate\Support\Facades\DB;
use App\Transfer;
use App\Asset;
use App\User;
use App\Employee;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $asset=Asset::findOrFail($id);
        $custudian=new Employee;
        $custudian->setconnection('sqlsrv');
        $custudian=Employee::all();
        $branches=new Branch;
        $branches->setconnection('sqlsrv');
        $branches=Branch::all();
        $count=0;
        $custudian_name=array();
        foreach($custudian as $cust){
            $custudian_name[$count]=DB::table('users')->where('id', $cust->user_id)->value('name');
            $count++;
        }
        $curr_custudian=Employee::find($asset->custudian);        
        $curr_custudian_id=User::find($curr_custudian->user_id);       
        $curr_custudian_name=$curr_custudian->full_name;

        $curr_cost_center=Branch::find($asset->branch_id);        
              
        $curr_cost_center_name=$curr_cost_center->branch_name;
         //dd($curr_custudian_name);
        //dd($custudian_name);
        return view('fixed_asset.asset.transfer.new',['branches'=>$branches,'asset'=>$asset,'curr_custudian_name'=>$curr_custudian_name,
        'emp_name'=>$custudian_name,'Employee'=>$custudian,'Counter'=>$count,'current_cost_center'=>$curr_cost_center_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // dd($request->all());
       $new_rec=new Transfer;
       $new_rec->asset_id=$request->asset_id;
       $new_rec->effective_date=$request->effective_date;
        $new_rec->remarks=$request->remarks;
         $new_rec->from_employee=$request->current_Custudian_id;
         $new_rec->to_employee=$request->new_custudian;
         $new_rec->from_cost_center=$request->current_cost_center_id;
         $new_rec->to_cost_center=$request->new_cost_center;

        if($new_rec->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['custudian'=>$request->new_custudian]);

             DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['branch_id'=>$request->new_cost_center]);
            $request->session()->flash('status',"Asset ".$request->asset_name." Transfered to another Custudian.");
            return redirect('/asset');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $edit=Transfer::find($id);
        $asset=Asset::find($edit->asset_id);
        $curr_custudian=Employee::find($edit->from_employee);
        $new_custudian=Employee::find($edit->to_employee);
        $curr_cost_center=Branch::find($edit->from_cost_center);
         $new_cost_center=Branch::find($edit->to_cost_center);
              //dd($curr_custudian);
          return view('fixed_asset.asset.transfer.edit',['transfer'=>$edit,'asset'=>$asset,'curr_custudian'
          =>$curr_custudian,'new_custudian'=>$new_custudian,'curr_cost_center'=>$curr_cost_center,
          'new_cost_center'=>$new_cost_center]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
