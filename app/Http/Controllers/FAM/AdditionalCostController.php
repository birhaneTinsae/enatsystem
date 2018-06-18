<?php

namespace App\Http\Controllers\FAM;
use App\PPEDepreciation;
use App\AdditionalCost;
use App\Asset;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdditionalCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $asset=Asset::findOrFail($id);
        return view('fixed_asset.asset.additional.new',['asset'=>$asset]);
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

      
        $additional_cost=new AdditionalCost;
       
        $asset_id=Asset::where('asset_name',$request->asset_name)->pluck('id')->first();
        $asset=Asset::find($asset_id);        
     if($asset->disposed=="1"){
 $request->session()->flash('delete_status',$request->asset_name." is Disposed Asset Additional Cost Can not be added.");
            return redirect('/asset/'.$asset_id);
     }
     else{ 
          if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be less than  date of acquisition .");
            return redirect('/asset/'.$asset_id);
         }  
        $effective_year=date('Y',strtotime($request->effective_date));
        $calc_depreciation=PPEDepreciation::where('asset_id',$asset_id)        
        ->where('calculation_type',"Final")
        ->whereYear('selected_depreciation_date',$effective_year)
        ->value('selected_depreciation_date'); 
          
        if(!empty($calc_depreciation)){
             $year=date('Y',strtotime($calc_depreciation));
             $effective_year=date('Y',strtotime($request->effective_date));
            if($year==$effective_year){
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  Additional cost can not be added.");
            return redirect('/asset/'.$asset_id);
            }           
        }                 
       
        $additional_cost->added_cost=$request->additional_value;
        $additional_cost->book_value=$request->Current_Value;
        $additional_cost->effective_date=$request->effective_date;
        $additional_cost->remarks=$request->remarks;
        $additional_cost->asset_id=$asset_id;       
        if($additional_cost->save()){
            // $calc_depreciation=new PPEDepreciation;            
            //         $calc_depreciation->asset_id=$asset_id;           
            //         $calc_depreciation->from_date= $asset->purchase_date;
            //         $calc_depreciation->upto_date=$request->effective_date;                   
            //         $calc_depreciation->depreciation_value=$depreciation;                   
            //         $calc_depreciation->remark="";
            //         $calc_depreciation->book_value_before_dep=$asset->book_value;
            //         $calc_depreciation->book_value_after_dep=$asset->book_value-$depreciation;
            //         $calc_depreciation->maker=Auth::User()->username;  
            //         $calc_depreciation->save();
             DB::connection('sqlsrv2')->table('assets')
            ->where('id',$asset_id)
            ->update(['book_value'=>$asset->book_value+$request->additional_value]);
            $request->session()->flash('status',"Additional Cost for asset ".$request->asset_name." successfully added.");
            return redirect('/asset/'.$asset_id);
        }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalCost $additionalCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $edit=AdditionalCost::find($id);     
        $asset=Asset::find($edit->asset_id);
        $asset_name=$asset->asset_name;        
         return view('fixed_asset.asset.additional.edit',['result'=>$edit,'asset_name'=>$asset_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
         $update=AdditionalCost::find($id);     
        $asset=Asset::find($update->asset_id);
       
          $effective_year=date('Y',strtotime($update->effective_date));          
           $calc_depreciation=PPEDepreciation::where('asset_id',$update->asset_id)
        ->where('calculation_type',"Final")
        ->whereYear('selected_depreciation_date',$effective_year)
        ->value('selected_depreciation_date');           
         if(!empty($calc_depreciation)){
              $year=date('Y',strtotime($calc_depreciation));
             $effective_year=date('Y',strtotime($update->effective_date));            
            if($year==$effective_year){                
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  Record can not be updated.");
            return redirect('/asset/'.$update->asset_id);
            }           
        }         
              if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be less than  date of acquisition .");
            return redirect('/asset/'.$asset_id);
         }
        $update->asset_id=$update->asset_id;
        $update->added_cost=$request->additional_value;
        $update->book_value= $update->book_value;
        $update->effective_date=$request->effective_date;
        $update->remarks=$request->remark;
       if($update->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$update->asset_id)
            ->update(['book_value'=>($asset->book_value-$request->prev_value )+$request->additional_value]);
            $request->session()->flash('status'," record successfully update.");
            return redirect('/asset/'.$update->asset_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $delete = AdditionalCost::find( $id );   
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
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$asset->id)
            ->update(['book_value'=>$asset->book_value-$delete->added_cost]);
            $request->session()->flash('delete_status'," record successfully Closed.");
            return redirect('/asset/'.$asset->id);
        }
    }
}
