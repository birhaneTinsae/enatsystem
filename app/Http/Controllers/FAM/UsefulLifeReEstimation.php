<?php

namespace App\Http\Controllers\FAM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PPECategory;
use App\Asset;
use App\Usefullife;
use App\PPEDepreciation;
use Illuminate\Support\Facades\DB;
class UsefulLifeReEstimation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
         $asset=Asset::findOrFail($id);
        //dd($ppe);
        return view('fixed_asset.asset.usefullife.new',['asset'=>$asset]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $new_rec=new Usefullife;
      $asset=Asset::find($request->asset_id);
     if($asset->disposed=="1"){
 $request->session()->flash('delete_status',$request->asset_name." is Disposed Asset Useful Life Can not be Estimated.");
            return redirect('/asset/'.$request->asset_id);
     }
     else{     
          if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be less than  date of acquisition .");
            return redirect('/asset/'.$request->asset_id);
         }      
      $new_rec->asset_id=$request->asset_id;
       $new_rec->effective_date=$request->effective_date;
        $new_rec->new_useful_life=$request->new_useful_life;
         $new_rec->remarks=$request->remarks;         
         if($new_rec->save()){   
              DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['overrided_useful_life'=>$request->new_useful_life]);           
            $request->session()->flash('status',"Useful Life Re Estimated For ".$request->asset_name." successfully .");
            return redirect('/asset/'.$request->asset_id);
        }
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
        $edit=Usefullife::find($id);
        return view('fixed_asset.asset.usefullife.edit',['usefullife'=>$edit]);
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
       // dd($request->remarks);
        $update=Usefullife::find($id);              
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
            return redirect('/asset/'.$request->asset_id);
            }           
        }  
         $asset=Asset::find($request->asset_id);      
          if($asset->date_of_acquisition>$request->effective_date){
             $request->session()->flash('delete_status'," Effective date can not be less than  date of acquisition .");
            return redirect('/asset/'.$request->asset_id);
         }      
        $update->asset_id=$request->asset_id;
        $update->effective_date=$request->effective_date;
        $update->remarks=$request->remarks;
        $update->new_useful_life=$request->new_useful_life;
    if($update->save()){       
        DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['overrided_useful_life'=>$request->new_useful_life]);     
            $request->session()->flash('status',"Record Updated");
            return redirect('/asset/'.$request->asset_id);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $delete = Usefullife::find( $id );   
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
            ->update(['overrided_useful_life'=>NULL]);
            $request->session()->flash('delete_status'," record successfully Closed.");
            return redirect('/asset/'.$asset->id);
        }
    }
}
