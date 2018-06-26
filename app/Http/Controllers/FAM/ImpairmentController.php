<?php

namespace App\Http\Controllers\FAM;

use App\Impairment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asset;
use App\PPEDepreciation;
use Illuminate\Support\Facades\DB;
class ImpairmentController extends Controller
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
        return view('fixed_asset.asset.impairment.new',['asset'=>$asset]);
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

        $impairment=new Impairment;

             $asset_id=Asset::where('asset_name',$request->asset_name)->pluck('id')->first();
             $asset=Asset::find($asset_id);
     
     if($asset->disposed=="1"){
            $request->session()->flash('delete_status',$request->asset_name." is Disposed Asset Impairement Can not be done.");
            return redirect('/asset/'.$asset_id);
     }
     else{  
         if($asset->book_value<$request->new_value){
             $request->session()->flash('delete_status'," Impairment value can not be greater than current book value .");
            return redirect('/asset/'.$asset_id);
         } 
          if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be greater than  date of acquisition .");
            return redirect('/asset/'.$asset_id);
         }   
         $effective_year=date('Y',strtotime($request->effective_date));
        $calc_depreciation=PPEDepreciation::where('asset_id',$asset_id)
        ->whereYear('selected_depreciation_date',$effective_year)
        ->where('calculation_type',"Final")
        ->value('selected_depreciation_date'); 
          
        if(!empty($calc_depreciation)){
             $year=date('Y',strtotime($calc_depreciation));
             $effective_year=date('Y',strtotime($request->effective_date));
            if($year==$effective_year){
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  Imapairement value can not be added.");
            return redirect('/asset/'.$asset_id);
            }           
        }   
        $impairment->impaired_value=$request->new_value;
        $impairment->book_value=$request->current_value;
        $impairment->effective_date=$request->effective_date;
        $impairment->remarks=$request->remarks;
        $impairment->asset_id=$asset_id;

        if($impairment->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$asset_id)
            ->update(['book_value'=>$asset->book_value-$request->new_value]);
            $request->session()->flash('status',"Impairement made for asset ".$request->asset_name." successfully added.");
            return redirect('/asset/'.$asset_id);
        }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function show(Impairment $impairment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $edit=Impairment::find($id);     
        $asset=Asset::find($edit->asset_id);
        $asset_name=$asset->asset_name;        
         return view('fixed_asset.asset.impairment.edit',['result'=>$edit,'asset_name'=>$asset_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
               
        dd($request->all());
          $update=Impairment::find($id);     
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
        $update->impaired_value=$request->impaired_value;
        $update->book_value= $update->book_value;
        $update->effective_date=$request->effective_date;
        $update->remarks=$request->remark;
       if($update->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$update->asset_id)
            ->update(['book_value'=>($asset->book_value+$request->prev_value )-$request->impaired_value]);
            $request->session()->flash('status'," record successfully update.");
            return redirect('/asset/'.$update->asset_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = Impairment::find( $id );   
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
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  Record can not be updated.");
            return redirect('/asset/'.$update->asset_id);
            }           
        }  
        //dd($asset->book_value);             
       if( $delete ->delete()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$asset->id)
            ->update(['book_value'=>$asset->book_value+$delete->impaired_value]);
            $request->session()->flash('delete_status'," record successfully Closed.");
            return redirect('/asset/'.$asset->id);
        }
    }
}
