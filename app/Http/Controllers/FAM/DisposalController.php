<?php

namespace App\Http\Controllers\FAM;
use Illuminate\Support\Facades\DB;
use App\Asset;
use App\Disposal;
use App\PPEDepreciation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dis_assets=new Disposal;
        $dis_assets->setConnection('sqlsrv2');
        $dis_assets=Disposal::all();
        return view('fixed_asset.asset.disposal.disposal',['assets'=>$dis_assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $asset=Asset::findOrFail($id);
        return view('fixed_asset.asset.disposal.new',['asset'=>$asset]);
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
      $new_rec=new Disposal;
      $asset=Asset::find($request->asset_id);
       $new_rec->asset_id=$request->asset_id;
         if($asset->disposed=="1"){
 $request->session()->flash('delete_status',$request->asset_name." is already Disposed.");
            return redirect('/asset/'.$request->asset_id);
     }
      $effective_year=date('Y',strtotime($request->effective_date));
        $calc_depreciation=PPEDepreciation::where('asset_id',$request->asset_id)        
        ->where('calculation_type',"Final")
        ->whereYear('selected_depreciation_date',$effective_year)
        ->value('selected_depreciation_date'); 
          
        if(!empty($calc_depreciation)){
             $year=date('Y',strtotime($calc_depreciation));
             $effective_year=date('Y',strtotime($request->effective_date));
            if($year==$effective_year){
                 $request->session()->flash('delete_status'," Final PPE is calculated within specifaied Effective date  asset can not be disposed.");
            return redirect('/asset/'.$request->asset_id);
            }           
        }                 
        if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be greater than current date of acquisition .");
            return redirect('/asset/'.$request->asset_id);
         }  
       $new_rec->effective_date=$request->effective_date;
        $new_rec->remarks=$request->remarks;
        if($new_rec->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['disposed'=>"1"]);
            $request->session()->flash('status',"Asset ".$request->asset_name." Disposed.");
            return redirect('/asset/'.$request->asset_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function show(Disposal $disposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $edit=Disposal::find($id);     
        $asset=Asset::find($edit->asset_id);
        $asset_name=$asset->asset_name;
         return view('fixed_asset.asset.disposal.edit',['result'=>$edit,'asset_name'=>$asset_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {      
        $update=Disposal::find($id);     
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
        $update->effective_date=$request->effective_date;
        $update->remarks=$request->remark;
       if($update->save()){
            $request->session()->flash('status'," record successfully update.");
            return redirect('/asset/'.$update->asset_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $delete = Disposal::find( $id );   
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
       if( $delete ->delete()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$asset->id)
            ->update(['disposed'=>"0"]);
            $request->session()->flash('delete_status'," record successfully Closed.");
            return redirect('/asset/'.$asset->id);
        }
    }

    public function search(Request $request)
    {
          $name=$request->queryemp;          
          $assets =DB::connection('sqlsrv2')->table('assets')->where('asset_name','LIKE','%'.$name.'%')->get();
          dd($assets);
    }
}
