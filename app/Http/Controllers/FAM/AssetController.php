<?php

namespace App\Http\Controllers\FAM;
use Illuminate\Support\Facades\DB;
use App\Asset;
use App\User;
use App\AdditionalCost;
use App\Impairment;
use App\AssetItem;
use App\Branch;
use App\Disposal;
use App\Employee;
use App\Transfer;
use App\Usefullife;
use App\Residuallife;
use App\PPECategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $assets=new Asset;
         $assets->setConnection('sqlsrv2');
         $assets=Asset::all();        
        return view('fixed_asset.asset.asset',compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $asset_categories=AssetItem::all();
        $branches=new Branch;
        $branches->setconnection('sqlsrv');
        $branches=Branch::all();
        //dd( $branches);
        $custudian=new Employee;
        $custudian->setconnection('sqlsrv');
        $custudian=Employee::all();             
        return view('fixed_asset.asset.new',['branches'=>$branches,'Employee'=>$custudian]);
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
            'asset_name'=>'required',           
            'asset_category'=>'required',            
            'cost_center'=>'required',          
        ]);          
        $asset=new Asset;
        $asset->setconnection('sqlsrv2');
        $asset->asset_name=$request->asset_name;
        $asset->purchase_date=$request->purchased_date;
        $asset->date_of_acquisition=$request->purchased_date;
        $asset->gross_purchase_amount=$request->gross_purchase_amount;
        $asset->overrided_useful_life=$request->useful_life;
        $asset->overrided_residual_value=$request->residual_value;
        $asset->tag	=$request->tag;
        $asset->asset_item_id=$request->asset_sub_category;
        $asset->branch_id=$request->cost_center;
        $asset->remarks=$request->remarks;
        $asset->p_p_e_categorie_id=$request->asset_category;
        $asset->description=$request->description;
        $asset->gr_number=$request->gr_number;
        $asset->srv=$request->srv;
        $asset->custudian=$request->custudian;
        $asset->serial_no=$request->serial_no;
        $asset->book_value=$request->gross_purchase_amount;  
       
        if($asset->save()){
            $request->session()->flash('status',"Asset ".$request->asset_name." successfully added.");
            return redirect('/asset');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset=new Asset;
        $asset->setconnection('sqlsrv2');
        $asset=Asset::findOrFail($id);
        $additional_costs=new AdditionalCost;
        $additional_costs->setconnection('sqlsrv2');
        $additional_costs=AdditionalCost::where('asset_id',$asset->id)->get();
        $impairments=Impairment::where('asset_id',$asset->id)->get();

        $useful_life=new Usefullife;
        $useful_life->setconnection('sqlsrv2');
        $useful_life=Usefullife::where('asset_id',$asset->id)->get();

        $residual_life=new Residuallife;
        $residual_life->setconnection('sqlsrv2');
        $residual_life=Residuallife::where('asset_id',$asset->id)->get();
        $branch=new Branch;
        $branch->setconnection('sqlsrv');
        $branch=Branch::find($asset->branch_id);
        $custudian=Employee::find($asset->custudian);
        //dd($custudian);
        if($custudian==""){
            $custudian_name="";
        }
        else{
            $custudian_name=$custudian->full_name;
        }
        
        $disposal=new Disposal;
        $disposal->setconnection('sqlsrv2');
        $disposal=Disposal::where('asset_id',$asset->id)->get();
        $transfer=Transfer::where('asset_id',$asset->id)->get();
       $count=0;
       $femp_name=array();
       $temp_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
       $from_user_id=array();
       $to_user_id=array();
       $count2=0;
     foreach($transfer as $result){
     $femp_name[$count]=Employee::where('id',$result->from_employee)->value('full_name');           
    $temp_name[$count]= Employee::where('id',$result->to_employee)->value('full_name'); 
    $fbranch_name[$count]= DB::table('branches')->where('id', $result->from_cost_center)->value('branch_name');
    $tbranch_name[$count]= DB::table('branches')->where('id', $result->to_cost_center)->value('branch_name');
   $count++;
      }            
        $asset_category=PPECategory::find($asset->p_p_e_categorie_id);        
        return view('fixed_asset.asset.show',['asset'=>$asset,'additional_costs'=>$additional_costs,'impairments'=>$impairments,
        'custudian_name'=>$custudian_name,'branch'=>$branch,'Disposal'=>$disposal,
        'asset_category'=>$asset_category,'transfer'=>$transfer,'from_employee'=>$femp_name,
        'to_employee'=>$temp_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name
        ,'Usefullife'=>$useful_life,'Residuallife'=>$residual_life]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $edit=Asset::find($id);  
       $branch=Branch::find($edit->branch_id);   
       $Custudian=Employee::find($edit->custudian);      
      return view('fixed_asset.asset.update',['Asset'=>$edit,'Cost_center'=>$branch
      ,'Custudian'=>$Custudian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // dd($request->all());
      $valid_data=$request->validate([
            'asset_name'=>'required',           
            'asset_category'=>'required',
            'asset_sub_category'=>'required',
            'cost_center'=>'required',          
        ]);          
        $update= Asset::find($id);
        $update->setconnection('sqlsrv2');
        $update->asset_name=$request->asset_name;
        $update->purchase_date=$request->purchased_date;
        $update->date_of_acquisition=$request->purchased_date;
        $update->gross_purchase_amount=$request->gross_purchase_amount;
        $update->overrided_useful_life=$request->useful_life;
        $update->overrided_residual_value=$request->residual_value;
        $update->tag=$request->tag;
        $update->asset_item_id=$request->asset_sub_category;
        $update->branch_id=$request->cost_center;
        $update->remarks=$request->remarks;
        $update->p_p_e_categorie_id=$request->asset_category;
        $update->description=$request->description;
        $update->gr_number=$request->gr_number;
        $update->srv=$request->srv;
        $update->custudian=$request->custudian;
        $update->serial_no=$request->serial_no;
        $update->book_value=$request->gross_purchase_amount;  
       
        if($update->save()){
            $request->session()->flash('status',"Asset ".$request->asset_name." successfully updated.");
            return redirect('/asset');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
