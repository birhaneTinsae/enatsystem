<?php

namespace App\Http\Controllers\FAM;

use App\AdditionalCost;
use App\Asset;
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
     
        $additional_cost->added_cost=$request->additional_value;
        $additional_cost->effective_date=$request->effective_date;
        $additional_cost->remarks=$request->remarks;
        $additional_cost->asset_id=$asset_id;

        if($additional_cost->save()){
            $request->session()->flash('status',"Additional Cost for asset ".$request->asset_name." successfully added.");
            return redirect('/asset/'.$asset_id);
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
    public function edit($id)
    {
        //
        $additional_cost=AdditionalCost::findOrFail($id);
        return view('fixed_asset.asset.additional.update',['additional_cost'=>$additional_cost]);
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
        //
        $additional_cost=AdditionalCost::findOrFail($id);

        $additional_cost->added_cost=$request->additional_value;
        $additional_cost->effective_date=$request->effective_date;
        $additional_cost->remarks=$request->remarks;
       if($additional_cost->save()){
        $request->session()->flash('status',"Additional Cost for asset ".$request->asset_name." successfully updated.");
        return redirect('/asset/'.$additional_cost->asset_id);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalCost $additionalCost)
    {
        //
    }
}
