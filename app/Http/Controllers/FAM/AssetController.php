<?php

namespace App\Http\Controllers\FAM;

use App\Asset;
use App\PPECategory;
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
        $residual_percent;

        if(!empty($request->residual_value)){
            $residual_percent=$request->residual_value;
        }else {
            $asset_category=AssetItem::findOrFail($request->asset_category);
            if(!empty($asset_category->overrided_residual_value)){
                $residual_percent=$asset_category->overrided_residual_value;
            }else{
                $residual_percent=$asset_category->ppe_category->residual_value;
            }
        }

        $asset=new Asset;
        $asset->asset_name=$request->asset_name;
        $asset->purchase_date=$request->purchased_date;
        $asset->gross_purchase_amount=$request->gross_purchase_amount;
        $asset->overrided_useful_life=$request->useful_life;
        $asset->overrided_residual_value=$request->residual_value;
        $asset->tag	=$request->tag;
        $asset->asset_item_id=$request->asset_category;
        $asset->branch_id=$request->cost_center;
        $asset->book_value=$this->get_book_value($request->gross_purchase_amount,$residual_percent);
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
        $useful_life;

        $asset=Asset::findOrFail($id);
        $additional_costs=$asset->additional_costs;
        $impairments=$asset->impairments;

        if($asset->useful_life){
            $useful_life=$asset->useful_life;
        }else if($asset->asset_item->useful_life){
            $useful_life=$asset->asset_item->useful_life;
        }else{
            $useful_life=$asset->asset_item->ppe_category->useful_life;
        }
       
        return view('fixed_asset.asset.show',['asset'=>$asset,'additional_costs'=>$additional_costs,'impairments'=>$impairments,'useful_life'=>$useful_life]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $asset=Asset::findOrFail($id);
        $asset_categories=AssetItem::all();
        $branches=Branch::all();
        return view('fixed_asset.asset.update',['asset'=>$asset,'asset_categories'=>$asset_categories,'branches'=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $residual_percent;

        
        if(!empty($request->residual_value)){
            $residual_percent=$request->residual_value;
        }else {
            $asset_category=AssetItem::findOrFail($request->asset_category);
            if(!empty($asset_category->overrided_residual_value)){
                $residual_percent=$asset_category->overrided_residual_value;
            }else{
                $residual_percent=$asset_category->ppe_category->residual_value;
            }
        }

        $asset=Asset::findOrFail($id);
        $asset->asset_name=$request->asset_name;
        $asset->purchase_date=$request->purchased_date;
        $asset->gross_purchase_amount=$request->gross_purchase_amount;
        $asset->overrided_useful_life=$request->useful_life;
        $asset->overrided_residual_value=$request->residual_value;
        $asset->tag	=$request->tag;
        $asset->asset_item_id=$request->asset_category;
        $asset->branch_id=$request->cost_center;
        $asset->book_value=$this->get_book_value($request->gross_purchase_amount,$residual_percent);
        $asset->remarks=$request->remarks;

        if($asset->save()){
            $request->session()->flash('status','Asset with name '.$asset->asset_name.' successfully Updated.');
            return redirect('/asset/'.$asset->id);
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
    /**
     * 
     */
    public function get_book_value($gross_value , $residual_percent){

      $residual_value= $gross_value * ($residual_percent / 100);

      return $gross_value - $residual_value;
    }
    /**
     * 
     */
    public function daily_depreciation($book_value , $useful_life){

        return $book_value / $useful_life * 365;
    }
    /**
     * 
     */
    public function yearly_depreciation($book_value , $useful_life , $no_of_days_on_service){

        return $this->daily_depreciation($book_value , $useful_life) * $no_of_days_on_service;
    }
}
