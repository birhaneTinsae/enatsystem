<?php

namespace App\Http\Controllers\FAM;

use App\Impairment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asset;
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
        $impairment->new_value=$request->new_value;
        $impairment->current_value=$request->current_value;
        $impairment->effective_date=$request->effective_date;
        $impairment->remarks=$request->remarks;
        $impairment->asset_id=$request->$asset_id;

        if($impairment->save()){
            $request->session()->flash('status',"New Cost for asset ".$request->asset_name." successfully added.");
            return redirect('/impairment/'.$asset_id);
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
    public function edit(Impairment $impairment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impairment $impairment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Impairment  $impairment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impairment $impairment)
    {
        //
    }
}
