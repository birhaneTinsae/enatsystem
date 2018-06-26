<?php

namespace App\Http\Controllers\FAM;

use App\PPECategory;
use Illuminate\Http\Request;
use App\Usefullife;
use App\Residuallife;
use App\Http\Controllers\Controller;
class PPECategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ppes=new PPECategory;
         $ppes->setConnection('sqlsrv2');
        $ppes=PPECategory::all();
         
        return view('fixed_asset.fixed_asset',['ppes'=>$ppes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fixed_asset.new');
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
        $ppe=new PPECategory;
        $ppe->setConnection('sqlsrv2');
        $ppe->p_p_e_type=$request->ppe_type;
        $ppe->useful_life=$request->useful_life;
        $ppe->residual_value=$request->residual_value;
        if($ppe->save()){
            $request->session()->flash('status',"PPE ".$request->p_p_e_type." successfully added.");
            return redirect('/fixed-asset');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PPECategory  $pPECategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=PPECategory::findOrFail($id);
        $useful_life=new Usefullife;
        $useful_life->setconnection('sqlsrv2');
      //  $useful_life=Usefullife::where('p_p_e_categorie_id',$id)->get();

        $residual_life=new Residuallife;
        $residual_life->setconnection('sqlsrv2');
       // $residual_life=Residuallife::where('p_p_e_categorie_id',$id)->get();       
          return view('fixed_asset.show',['ppe'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PPECategory  $pPECategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id/*PPECategory $pPECategory*/)
    {
        //
        $ppe=PPECategory::findOrFail($id);
        return view('fixed_asset.update',compact('ppe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PPECategory  $pPECategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pPECategory=PPECategory::findOrFail($id);
        
        $pPECategory->p_p_e_type=$request->ppe_type;
        $pPECategory->useful_life=$request->useful_life;
        $pPECategory->residual_value=$request->residual_value;
        if($pPECategory->save()){
            $request->session()->flash('status',"PPE ".$request->p_p_e_type." successfully update.");
            return redirect('/fixed-asset');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PPECategory  $pPECategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PPECategory $pPECategory)
    {
        //
    }
}
