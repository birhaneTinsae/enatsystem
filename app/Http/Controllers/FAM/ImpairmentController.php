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
        $asset=Asset::findOrFail($id);
        return view('fixed_asset.asset.impairment.new',['asset'=>$asset]);
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
