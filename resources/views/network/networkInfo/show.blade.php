@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
<li class="list-group-item disabled">Menu</li>

<li class="list-group-item"><a href="/fourG-threeG-maintainance">3G4G</a></li>
<li class="list-group-item"><a href="/tt-maintainance">TT</a></li>
<li class="list-group-item"><a href="/domain-name/">Domain</a></li>
<li class="list-group-item"><a href="/maintainance-info/">Maintainance</a></li> 
<li class="list-group-item"><a href="/network-info">Network</a></li> 
</ul>
@endsection
 
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 ">
        {{-- <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">Network Info
@hasrole('admin')
                    <a href="/network-info/{{$networkInfo->id}}/edit" class="text-right pull-right panel-menu-item"><i class="far fa-edit"></i>
                    Edit</a>
@endhasrole
                    <a href="/network-info/{{$networkInfo->id}}/delete" class="text-right pull-right panel-menu-item"><i class="far fa-trash-alt"></i>
                    Delete</a>   
                    <a href="/network-info/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a>
                  

                </div>

                <div class="panel-body">

            
                 <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" readonly>
                                <option value="{{$networkInfo->branch->id}}">{{$networkInfo->branch->name}}</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cpe">CPE</label>
                            <input type="text" class="form-control" name="cpe" value="{{$networkInfo->cpe}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="zone">Zone</label>
                            <input type="text" class="form-control" name="zone" id="zone"   value="{{$networkInfo->zone}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city"  value="{{$networkInfo->city}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <input type="text" class="form-control" name="service_type" id="service_type" value="{{$networkInfo->service_type}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lan_ip">LAN IP</label>
                            <input type="text" class="form-control" name="lan_ip" id="lan_ip" value="{{$networkInfo->lan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Sub net Mask</label>
                            <input type="text" class="form-control" name="sub_net_mask" id="sub_net_mask" value="{{$networkInfo->subnet_mask}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="wan_ip">WAN IP</label>
                            <input type="text" class="form-control" name="wan_ip" id="wan_ip" value="{{$networkInfo->wan_ip}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="router_wan_interface">Router WAN inteface</label>
                            <input type="text" class="form-control" name="router_wan_interface" id="router_wan_interface" value="{{$networkInfo->router_wan_interface}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Date Inteface</label>
                            <input type="text" class="form-control" name="data_interface" id="data_interface" value="{{$networkInfo->data_interface}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                        
                        <div class="form-group">
                            <label for="internet_interface">Internet Inteface</label>
                            <input type="text" class="form-control" name="internet_interface" id="internet_interface" value="{{$networkInfo->internet_interface}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="managment_interface">Managment Interface</label>
                            <input type="text" class="form-control" name="managment_interface" id="managment_interface" value="{{$networkInfo->managment_interface}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_0">Router Tunnel 0</label>
                            <input type="text" class="form-control" name="router_tunnel_0" id="router_tunnel_0" value="{{$networkInfo->router_tunnel_0}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_100">Router Tunnel 100</label>
                            <input type="text" class="form-control" name="router_tunnel_100" id="router_tunnel_100" value="{{$networkInfo->router_tunnel_100}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_200">Router Tunnel 200</label>
                            <input type="text" class="form-control" name="router_tunnel_200" id="router_tunnel_200" value="{{$networkInfo->router_tunnel_200}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="service_no">Service No</label>
                            <input type="text" class="form-control" name="service_no" id="service_no" value="{{$networkInfo->service_no}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="link_speed">Link Speed</label>
                            <input type="text" class="form-control" name="link_speed" id="link_speed" value="{{$networkInfo->link_speed}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="msg_box_no">Message Box No</label>
                            <input type="text" class="form-control" name="msg_box_no" id="msg_box_no" value="{{$networkInfo->msg_box_no}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mac">MAC</label>
                            <input type="text" class="form-control" name="mac" id="mac" value="{{$networkInfo->mac}}" readonly>
                        </div>
                        @hasrole('admin')
                        <form action="/network-info/{{$networkInfo->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Deleted" class="btn btn-sm btn-danger">                        
                        </form>
                        @endhasrole
                    </div>
                 </div>
                   
             
                    
                </div>
                <div class="panel-footer">
                    <!-- <div class="row">
                <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection