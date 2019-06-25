<?php

namespace App\Http\Controllers;

use App\Model\NetworkInfo;
use Illuminate\Http\Request;

class NetworkInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $networkInfos=NetworkInfo::paginate();
        return view('network.networkInfo.network',['networkInfos'=>$networkInfos]);
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
        return view('network.networkInfo.new',['branches'=>$branches]);
        
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
        $maintainance=new NetworkInfo;
        $maintainance->branch_id =$request->branch;
        $maintainance->cpe =$request->cpe;
        $maintainance->zone =$request->zone;
        $maintainance->city =$request->city;
        $maintainance->service_type =$request->service_type;
        $maintainance->lan =$request->lan_ip;
        $maintainance->subnet_mask=$request->sub_net_mask;
        $maintainance->wan_ip =$request->wan_ip;
        $maintainance->router_wan_interface =$request->router_wan_interface;
        $maintainance->data_interface =$request->data_interface;
        $maintainance->internet_interface =$request->internet_interface;
        $maintainance->managment_interface =$request->managment_interface;
        $maintainance->router_tunnel_0 =$request->router_tunnel_0;
        $maintainance->router_tunnel_100 =$request->router_tunnel_100;
        $maintainance->router_tunnel_200 =$request->router_tunnel_200;
        $maintainance->service_no =$request->service_no;
        $maintainance->link_speed =$request->link_speed;
        $maintainance->msg_box_no =$request->msg_box_no;
        $maintainance->mac =$request->mac;
        
        if($maintainance->save()){
            $request->session()->flash('status','Successfully saved');
            return \redirect('/network-info');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\NetworkInfo  $networkInfo
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkInfo $networkInfo)
    {
        //
        return view('network.networkInfo.show',["networkInfo"=>$networkInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\NetworkInfo  $networkInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkInfo $networkInfo)
    {
        //
        $branches=\App\Branch::all();
        return view('network.networkInfo.update',["networkInfo"=>$networkInfo,"branches"=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\NetworkInfo  $networkInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NetworkInfo $networkInfo)
    {
        //
        // $maintainance=new NetworkInfo;
        
        $networkInfo->branch_id =$request->branch;
        $networkInfo->cpe =$request->cpe;
        $networkInfo->zone =$request->zone;
        $networkInfo->city =$request->city;
        $networkInfo->service_type =$request->service_type;
        $networkInfo->lan =$request->lan_ip;
        $networkInfo->subnet_mask=$request->sub_net_mask;
        $networkInfo->wan_ip =$request->wan_ip;
        $networkInfo->router_wan_interface =$request->router_wan_interface;
        $networkInfo->data_interface =$request->data_interface;
        $networkInfo->internet_interface =$request->internet_interface;
        $networkInfo->managment_interface =$request->managment_interface;
        $networkInfo->router_tunnel_0 =$request->router_tunnel_0;
        $networkInfo->router_tunnel_100 =$request->router_tunnel_100;
        $networkInfo->router_tunnel_200 =$request->router_tunnel_200;
        $networkInfo->service_no =$request->service_no;
        $networkInfo->link_speed =$request->link_speed;
        $networkInfo->msg_box_no =$request->msg_box_no;
        $networkInfo->mac =$request->mac;
        
        if($networkInfo->save()){
            $request->session()->flash('status','Successfully updated');
            return \redirect('/network-info');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\NetworkInfo  $networkInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetworkInfo $networkInfo)
    {
        
        if($networkInfo->delete()){
            // session()->flash('status','Successfully deleted');
            return \redirect('/network-info');
        }
    }
    public function search(Request $request){
      $queries=\collect($request->all())->map(function($status){
            return $status;
       })->reject(function($status){
           return is_null($status);
       });
   
        $networkInfos=NetworkInfo::where($queries->toArray())->paginate();
        return view('network.networkInfo.network',['networkInfos'=>$networkInfos]);
    }
}
