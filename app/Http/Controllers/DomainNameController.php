<?php

namespace App\Http\Controllers;

use App\Model\DomainName;
use Illuminate\Http\Request;

class DomainNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $domainNames=DomainName::paginate(20);
        return view('network.domainName.domain',['domainNames'=>$domainNames]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches=\App\Branch::all();
        return view('network.domainName.new',['branches'=>$branches]);
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
        $maintainance=new DomainName;
        $maintainance->branch_id =$request->branch;
        $maintainance->bios_name =$request->bios_name;
        $maintainance->network_address =$request->network_address;
        $maintainance->switch_address =$request->access_switch_address;
        

        if($maintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/domain-name');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\DomainName  $domainName
     * @return \Illuminate\Http\Response
     */
    public function show(DomainName $domainName)
    {
        //
        return view('network.domainName.show',['domainName'=>$domainName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DomainName  $domainName
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainName $domainName)
    {
        //
        $branches=\App\Branch::all();
        return view('network.domainName.update',['domainName'=>$domainName,"branches"=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DomainName  $domainName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainName $domainName)
    {
        
        $domainName->branch_id =$request->branch;
        $domainName->bios_name =$request->bios_name;
        $domainName->network_address =$request->network_address;
        $domainName->switch_address =$request->access_switch_address;
        

        if($domainName->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/domain-name');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\DomainName  $domainName
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainName $domainName)
    {
        if($domainName->delete()){
           session()->flash('status','Successfully deleted');
            return \redirect('/domain-name');
        }
    }
    
}
