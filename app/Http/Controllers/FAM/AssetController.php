<?php

namespace App\Http\Controllers\FAM;

use App\Asset;
use App\AdditionalCost;
use App\Impairment;
use App\AssetItem;
use App\Branch;
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
        $branches=Branch::all();

        return view('fixed_asset.asset.new',['asset_categories'=>$asset_categories,'branches'=>$branches]);
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
        $asset=new Asset;
        $asset->asset_name=$request->asset_name;
        $asset->purchase_date=$request->purchased_date;
        $asset->gross_purchase_amount=$request->gross_purchase_amount;
        $asset->overrided_useful_life=$request->useful_life;
        $asset->overrided_residual_value=$request->residual_value;
        $asset->tag	=$request->tag;
        $asset->asset_item_id=$request->asset_category;
        $asset->branch_id=$request->cost_center;
        $asset->remarks=$request->remarks;
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
        //
        $asset=Asset::findOrFail($id);
        $additional_costs=AdditionalCost::where('asset_id',$asset->id)->get();
        $impairments=Impairment::where('asset_id',$asset->id)->get();
        // dd($additional_costs);
        return view('fixed_asset.asset.show',['asset'=>$asset,'additional_costs'=>$additional_costs,'impairments'=>$impairments]);
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
