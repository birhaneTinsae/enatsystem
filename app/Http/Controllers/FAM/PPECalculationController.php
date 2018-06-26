<?php
use Illuminate\Http\Request;
namespace App\Http\Controllers\FAM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asset;
use Auth;
use Carbon\Carbon;
use App\PPEDepreciation;
use App\AdditionalCost;
use App\Impairment;
use App\Disposal;
use App\Usefullife;
use App\Residuallife;
use Illuminate\Support\Facades\DB;
class PPECalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result=new PPEDepreciation;
      $result->setConnection('sqlsrv2');
      $result=PPEDepreciation::all();
      return view('fixed_asset.Calculation.calculation',['assets'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $result=new PPEDepreciation;
      $result->setConnection('sqlsrv2');
      $result=PPEDepreciation::all();
      return view('fixed_asset.Calculation.calculation',['assets'=>$result]);
    }

      public function draft()
    {
    $result=new PPEDepreciation;
      $result->setConnection('sqlsrv2');
      $result=PPEDepreciation::all();
      return view('fixed_asset.Calculation.draft',['assets'=>$result]);
    }

      public function final()
    {
         $result=new PPEDepreciation;
      $result->setConnection('sqlsrv2');
      $result=PPEDepreciation::all();
      return view('fixed_asset.Calculation.final',['assets'=>$result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {              
          $new_rec=new PPEDepreciation; 
          $hostname=gethostbyaddr(\Request::ip());          
          $assets=Asset::all();       
          $calculation_date=$request->date;
          $calculation_year =date('Y', strtotime($request->date));  
          $now=date('Y'); 
        //  dd($now);
          if($now==$calculation_year){
             for($i=0;$i<count($assets);$i++){ 
                $new_rec=new PPEDepreciation; 
                $new_record_effective_date="";
                $aditional_cost="";
                $impairment_cost="";
                $disposal="";
                $useful_life="";
                $residual_life=""; 
                $curr_book_value="";
                $date_of_acquisition="";
                // Get Useful life
                if($assets[$i]->overrided_useful_life!=''){
                    $useful_life=$assets[$i]->overrided_useful_life;
                }                             
                elseif($assets[$i]->asset_item->overrided_useful_life!=''){
                     $useful_life=$assets[$i]->asset_item->overrided_useful_life;
                }
                else{
                     $useful_life=$assets[$i]->asset_item->p_p_e_categorie->useful_life;
                }

                //Get Residual life

                 if($assets[$i]->overrided_residual_value!=''){
                    $residual_life=$assets[$i]->overrided_residual_value;
                }                             
                elseif($assets[$i]->asset_item->overrided_residual_value!=''){
                     $residual_life=$assets[$i]->asset_item->overrided_residual_value;
                }
                else{
                     $residual_life=$assets[$i]->asset_item->p_p_e_categorie->residual_value;
                     
                }                 
               
                // Get Book Value
                $curr_book_value=$assets[$i]->book_value;
                $date_of_acquisition=$assets[$i]->date_of_acquisition;

                //Check if the asset is within useful life
                $no_of_days=date_diff(date_create($calculation_date),date_create($date_of_acquisition))
                ->format("%a"); 
                if($no_of_days<($useful_life*365)
                && $curr_book_value>($residual_life/100)
                && $assets[$i]->disposed==0 ){
                $depreciation_base=$curr_book_value-($residual_life/100); 
                $daily_depreciation =$depreciation_base/($useful_life * 365); 
                if($no_of_days>365){
                    $no_of_days=365;
                }
                if($no_of_days<0){
                    $no_of_days=0;
                }
                $depreciation=$daily_depreciation * $no_of_days;
                $new_rec->asset_id=$assets[$i]->id; 
                $new_rec->from_date=$date_of_acquisition;
                $new_rec->upto_date=$calculation_date;
                $new_rec->depreciation_value=$depreciation;
                $new_rec->cost_center=$assets[$i]->branch_id;
                $new_rec->depreciation_base=$depreciation_base;
                $new_rec->daily_depreciation=$daily_depreciation;
                $new_rec->no_days=$no_of_days;
                $new_rec->selected_depreciation_date=$calculation_date;   
                $new_rec->useful_life= $useful_life;             
                $new_rec->residual_value= $residual_life;  
                $new_rec->remark="";
                $new_rec->book_value_before_dep=$curr_book_value;
                $new_rec->book_value_after_dep=$curr_book_value-$depreciation;
                if($request->calculation=="Draft PPE Calculation"){
                $new_rec->calculation_type="Draft";                
                }
                else{
                $new_rec->calculation_type="Final"; 
             DB::connection('sqlsrv2')->table('assets')
            ->where('id',$assets[$i]->id)
            ->update(['book_value'=>$curr_book_value-$depreciation]);
                }
                $new_rec->maker=Auth::User()->username; 
                $new_rec->station=\Request::ip()."/".$hostname;
                $new_rec->save(); 

                }

                else{
                    if($assets[$i]->disposed==1 ){
                        // Get year of disposal
                        $disposal_check=Disposal::where('asset_id',$assets[$i]->id)->get();
                        $disposal_year=date('Y', strtotime($disposal_check->effective_date)); 
                        if($now==$disposal_year){
                            if($calculation_date>$disposal_check->effective_date){
                                $no_of_days=date_diff(date_create($calculation_date),date_create($date_of_acquisition))
                            ->format("%a"); 
                                if($no_of_days>365){
                                    $no_of_days=365;
                                }
                                if($no_of_days<0){
                                    $no_of_days=0;
                                }
                             $new_rec->upto_date=$calculation_date;
                            }
                            else{
                                  $no_of_days=date_diff(date_create($calculation_date),date_create($disposal_check->effective_date))
                            ->format("%a"); 
                             if($no_of_days>365){
                             $no_of_days=365;
                            }
                             if($no_of_days<0){
                             $no_of_days=0;
                            }
                             $new_rec->upto_date=$disposal_check->effective_date;
                            }
                          
                            $depreciation_base=$curr_book_value-($residual_life/100); 
                            $daily_depreciation =$depreciation_base/($useful_life * 365); 
                            $depreciation=$daily_depreciation * $no_of_days;
                            $new_rec->asset_id=$assets[$i]->id; 
                            $new_rec->from_date=$date_of_acquisition;
                            $new_rec->cost_center=$assets[$i]->branch_id;
                            $new_rec->depreciation_base=$depreciation_base;
                            $new_rec->daily_depreciation=$daily_depreciation;
                            $new_rec->no_days=$no_of_days;
                            $new_rec->selected_depreciation_date=$calculation_date;
                            $new_rec->depreciation_value=$depreciation;
                            $new_rec->remark="";
                            $new_rec->book_value_before_dep=$curr_book_value;
                            $new_rec->book_value_after_dep=$curr_book_value-$depreciation;
                              if($request->calculation=="Draft PPE Calculation"){
                                $new_rec->calculation_type="Draft";                
                                }
                                else{
                                $new_rec->calculation_type="Final"; 
                            DB::connection('sqlsrv2')->table('assets')
                            ->where('id',$assets[$i]->id)
                            ->update(['book_value'=>$curr_book_value-$depreciation]);
                                }
                            $new_rec->maker=Auth::User()->username; 
                            $new_rec->station=\Request::ip()."/".$hostname;
                            $new_rec->save(); 
                        }
                        else{
                            $no_of_days=date_diff(date_create($calculation_date),date_create($date_of_acquisition))
                            ->format("%a");  
                                 if($no_of_days>365){
                                    $no_of_days=365;
                                 }
                                 if($no_of_days<0){
                                    $no_of_days=0;
                                 }                            
                             $depreciation_base=0; 
                             $daily_depreciation =0; 
                             $depreciation=0;
                             $new_rec->asset_id=$assets[$i]->id; 
                             $new_rec->from_date=$date_of_acquisition;
                             $new_rec->upto_date=$calculation_date;
                             $new_rec->depreciation_value=0;
                             $new_rec->remark="";
                             $new_rec->cost_center=$assets[$i]->branch_id;
                             $new_rec->depreciation_base=$depreciation_base;
                             $new_rec->daily_depreciation=$daily_depreciation;
                             $new_rec->no_days=$no_of_days;
                             $new_rec->selected_depreciation_date=$calculation_date;
                             $new_rec->book_value_before_dep=$curr_book_value;
                             $new_rec->book_value_after_dep=$curr_book_value-0;
                               if($request->calculation=="Draft PPE Calculation"){
                                $new_rec->calculation_type="Draft";                
                                }
                                else{
                                $new_rec->calculation_type="Final"; 
                            DB::connection('sqlsrv2')->table('assets')
                            ->where('id',$assets[$i]->id)
                            ->update(['book_value'=>$curr_book_value-$depreciation]);
                                }
                             $new_rec->maker=Auth::User()->username; 
                             $new_rec->station=\Request::ip()."/". $hostname;
                             $new_rec->save(); 

                        }
                    }

                    else{
                              $no_of_days=date_diff(date_create($calculation_date),date_create($date_of_acquisition))
                            ->format("%a");
                                if($no_of_days>365){
                                    $no_of_days=365;
                                }
                                if($no_of_days<0){
                                    $no_of_days=0;
                                } 
                             $depreciation_base=0; 
                             $daily_depreciation =0; 
                             $depreciation=0;
                             $new_rec->asset_id=$assets[$i]->id; 
                             $new_rec->from_date=$date_of_acquisition;
                             $new_rec->upto_date=$calculation_date;
                             $new_rec->depreciation_value=0;
                             $new_rec->cost_center=$assets[$i]->branch_id;
                             $new_rec->depreciation_base=$depreciation_base;
                             $new_rec->daily_depreciation=$daily_depreciation;
                             $new_rec->no_days=$no_of_days;
                             $new_rec->selected_depreciation_date=$calculation_date;
                             $new_rec->remark="";
                             $new_rec->book_value_before_dep=$curr_book_value;
                             $new_rec->book_value_after_dep=$curr_book_value-0;
                                            if($request->calculation=="Draft PPE Calculation"){
                                $new_rec->calculation_type="Draft";                
                                }
                                else{
                                $new_rec->calculation_type="Final"; 
                                DB::connection('sqlsrv2')->table('assets')
                                ->where('id',$assets[$i]->id)
                                ->update(['book_value'=>$curr_book_value-$depreciation]);
                                }
                             $new_rec->maker=Auth::User()->username; 
                             $new_rec->station=\Request::ip()."/". $hostname;
                             $new_rec->save(); 
                    }
                }
                

                //Check if book value is less than residual value
            // if($curr_book_value>$residual_life){

            // }

            // else{
            //     // No Calc
            // }

            // // Check if asset is disposed

            //  if($assets[$i]->disposed==0){
            //         $useful_life=$assets[$i]->disposed;
            //     }        
            // else{
            //     // No calculation
            // }




         }
          if($new_rec->save()){
                 $request->session()->flash('status','PPE Calculate For date' .$calculation_date);
                return redirect('ppecalc');
        }
          }
          else{
             $request->session()->flash('delete_status',"PPE Calculation can not be maded for the requested year:-".$calculation_year);
            return redirect('ppecalc');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
