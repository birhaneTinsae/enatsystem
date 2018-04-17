<?php

namespace App\Http\Controllers\FAM;

use App\AssetItem;
use App\PPECategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AssetItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset_categories=new AssetItem;
        $asset_categories->setConnection('sqlsrv2');
        $asset_categories=AssetItem::all();
        return view('fixed_asset.asset_category.asset_category',['asset_categories'=>$asset_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $ppes=new PPECategory;
        $ppes->setConnection('sqlsrv2');
        $ppes=\App\PPECategory::all();
        //dd($ppes);
        return view('fixed_asset.asset_category.new',['ppes'=>$ppes]);
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
        $asset_category=new AssetItem;
        $asset_category->setConnection('sqlsrv2');
        $asset_category->p_p_e_category_id=$request->ppe_type;
        $asset_category->overrided_useful_life=$request->useful_life;
        $asset_category->overrided_residual_value=$request->residual_value;
        $asset_category->name=$request->name;
        //$asset_category->quantity=$request->quantity;
        if($asset_category->save()){
            $request->session()->flash('status',"Asset Category ".$request->name." successfully added.");
            return redirect('/asset-category');
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssetItem  $assetItem
     * @return \Illuminate\Http\Response
     */
    public function show(AssetItem $assetItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssetItem  $assetItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetItem $assetItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssetItem  $assetItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetItem $assetItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssetItem  $assetItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetItem $assetItem)
    {
        //
    }
}
