<?php

namespace App\Http\Controllers\FAM;
use Illuminate\Support\Facades\DB;
use App\Asset;
use App\Disposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dis_assets=new Disposal;
        $dis_assets->setConnection('sqlsrv2');
        $dis_assets=Disposal::all();
        return view('fixed_asset.asset.disposal.disposal',['assets'=>$dis_assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $asset=Asset::findOrFail($id);
        return view('fixed_asset.asset.disposal.new',['asset'=>$asset]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
      $new_rec=new Disposal;
       $new_rec->asset_id=$request->asset_id;
       $new_rec->effective_date=$request->effective_date;
        $new_rec->remarks=$request->remarks;
        if($new_rec->save()){
            DB::connection('sqlsrv2')->table('assets')
            ->where('id',$request->asset_id)
            ->update(['disposed'=>"1"]);
            $request->session()->flash('status',"Asset ".$request->asset_name." Disposed.");
            return redirect('/asset');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function show(Disposal $disposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $edit=Disposal::find($id);     
        $asset=Asset::find($edit->asset_id);
        $asset_name=$asset->asset_name;
         return view('fixed_asset.asset.disposal.edit',['result'=>$edit,'asset_name'=>$asset_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disposal  $disposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disposal $disposal)
    {
        //
    }

    public function search(Request $request)
    {
          $name=$request->queryemp;          
          $assets =DB::connection('sqlsrv2')->table('assets')->where('asset_name','LIKE','%'.$name.'%')->get();
          dd($assets);
    }
}
