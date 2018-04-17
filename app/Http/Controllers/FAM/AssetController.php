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
        $count=0;
        $custudian_name=array();
        foreach($custudian as $cust){
            $custudian_name[$count]=DB::table('users')->where('id', $cust->user_id)->value('name');
            $count++;
        }

        return view('fixed_asset.asset.new',['branches'=>$branches,'emp_name'=>$custudian_name,'Employee'=>$custudian]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // $valid_data = App::make('validation.presence');
        // $valid_data->setConnection('sqlsrv2');
          $valid_data=$request->validate([
            'asset_name'=>'required',
            //'asset_sub_category'=>'required',
            'asset_category'=>'required',
            'custudian'=>'required',
            'cost_center'=>'required',          
        ]);  
      //  Validator::getPresenceVerifier()->setConnection('sqlsrv2');
        //dd($request->all());
        $asset=new Asset;
        $asset->setconnection('sqlsrv2');
        $asset->asset_name=$request->asset_name;
        $asset->purchase_date=$request->purchased_date;
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

        if(!isset($request->disposed)){
            $asset->disposed=false;
        }else{
            $asset->disposed=true;
        }
       
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
        $branch=new Branch;
        $branch->setconnection('sqlsrv');
        $branch=Branch::find($asset->branch_id);
        $custudian=Employee::find($asset->custudian);
        $custudian_id=User::find($custudian->user_id);
        $custudian_name=$custudian_id->name;
        $disposal=new Disposal;
        $disposal->setconnection('sqlsrv2');
        $disposal=Disposal::where('asset_id',$asset->id)->get();
        $transfer=Transfer::where('asset_id',$asset->id)->get();
       //dd($transfer);
       $count=0;
       $femp_name=array();
       $temp_name=array();
       $fbranch_name=array();
       $tbranch_name=array();
       $from_user_id=array();
       $to_user_id=array();
       $count2=0;
     foreach($transfer as $result){
     $from_user_id[$count]=Employee::where('id',$result->from_employee)->value('user_id');           
    $to_user_id[$count]= Employee::where('id',$result->to_employee)->value('user_id'); 
    $fbranch_name[$count]= DB::table('branches')->where('id', $result->from_cost_center)->value('branch_name');
    $tbranch_name[$count]= DB::table('branches')->where('id', $result->to_cost_center)->value('branch_name');
   $count++;
      }
      //dd($from_user_id);  
    foreach($from_user_id as $res){      
   $femp_name[$count2]= DB::table('users')->where('id',$res)->value('name');     
   $count2++;
      }
       $count3=0;       
        foreach($to_user_id as $res2){      
   $temp_name[$count3]= DB::table('users')->where('id',$res2)->value('name');     
   $count3++;
      }
      
  
        $asset_category=PPECategory::find($asset->p_p_e_categorie_id);
         //dd($branch->branch_name);
        return view('fixed_asset.asset.show',['asset'=>$asset,'additional_costs'=>$additional_costs,'impairments'=>$impairments,
        'custudian_name'=>$custudian_name,'branch'=>$branch,'Disposal'=>$disposal,
        'asset_category'=>$asset_category,'transfer'=>$transfer,'from_employee'=>$femp_name,
        'to_employee'=>$temp_name,'FromBranch'=>$fbranch_name,'ToBranch'=>$tbranch_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
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
