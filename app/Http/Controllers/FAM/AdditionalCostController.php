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
        $asset=Asset::findOrFail($id);
        return view('fixed_asset.asset.additional.new',['asset'=>$asset]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(AdditionalCost $additionalCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdditionalCost  $additionalCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalCost $additionalCost)
    {
        //
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
