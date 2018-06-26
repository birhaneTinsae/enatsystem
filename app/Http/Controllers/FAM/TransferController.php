<?php

namespace App\Http\Controllers\FAM;
use Illuminate\Support\Facades\DB;
use App\Transfer;
use App\PPEDepreciation;
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
            $custudian_name[$count]=DB::table('employees')->where('id', $cust->user_id)->value('full_name');
            $count++;
        }
        $curr_custudian=Employee::find($asset->custudian);       
         if($curr_custudian==""){
            $curr_custudian_name="";
        }
        else{
             $curr_custudian_name=$curr_custudian->full_name;
        }            
       

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
        $valid_data=$request->validate([                      
            'effective_date'=>'required',            
            'new_cost_center'=>'required',          
        ]);       
        $asset=Asset::find($request->asset_id);
     if($asset->disposed=="1"){
 $request->session()->flash('delete_status',$request->asset_name." is Disposed Asset Can not be Transfered");
            return redirect('/asset/'.$request->asset_id);
     }
     else{    
        if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be greater than current date of acquisition .");
            return redirect('/asset/'.$request->asset_id);
         }   
        
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
            return redirect('/asset/'.$request->asset_id);
    }
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
        $curr_cost_center=Branch::find($edit->from_cost_center);
         $new_cost_center=Branch::find($edit->to_cost_center);
              //dd($edit->from_employee);
        if ($edit->from_employee==""){
            $curr_custudian="";
            $curr_custudian_name="";
        }
        else{
            $curr_custudian=Employee::find($edit->from_employee);
            $curr_custudian_name=$curr_custudian->full_name;

        }
       
          if ($edit->to_employee==""){
            $new_custudian="";
             $new_custudian_name="";
        }
        else{
           $new_custudian=Employee::find($edit->to_employee);
            $new_custudian_name= $new_custudian->full_name;
        }
       
        
          return view('fixed_asset.asset.transfer.edit',['transfer'=>$edit,'asset'=>$asset,'curr_custudian'
          =>$curr_custudian_name,'new_custudian'=>$new_custudian_name,'curr_cost_center'=>$curr_cost_center,
          'new_cost_center'=>$new_cost_center]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
             $valid_data=$request->validate([                                           
            'new_cost_center'=>'required',
            'effective_date'=>'required',                
        ]);  
    $update=Transfer::Find($id);
    $update->effective_date=$request->effective_date;
    $update->from_employee=$request->current_Custudian_id;
    $update->to_employee=$request->new_custudian;
    $update->asset_id=$request->asset_id;
    $update->remarks=$request->remarks;
    $update->from_cost_center=$request->current_cost_center_id;
    $update->to_cost_center=$request->new_cost_center;
     if($update->save()){
            $request->session()->flash('status', "Record successfully updated.");
            return redirect('/asset/'.$request->asset_id);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $delete = Transfer::find( $id );   
      $asset=Asset::find($delete->asset_id );  
       $effective_year=date('Y',strtotime($delete->effective_date));  
         $calc_depreciation=PPEDepreciation::where('asset_id',$asset->id)
        ->where('calculation_type',"Final")
        ->whereYear('selected_depreciation_date',$effective_year)
        ->value('selected_depreciation_date');                  
         if(!empty($calc_depreciation)){
             $year=date('Y',strtotime($calc_depreciation));
             $effective_year=date('Y',strtotime($delete->effective_date));            
            if($year==$effective_year){                
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  Record can not be Closed.");
            return redirect('/asset/'.$delete->asset_id);
            }           
        }  
        //dd($asset->book_value);             
       if( $delete ->delete()){            
            $request->session()->flash('delete_status'," record successfully Closed.");
            return redirect('/asset/'.$asset->id);
        }
    }
}
