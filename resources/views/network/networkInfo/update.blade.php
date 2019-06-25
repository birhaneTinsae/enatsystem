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

                <a href="/network-info" class="text-right pull-right panel-menu-item"><i class="fas fa-list"></i>
                        List</a> 
                    <a href="/network-info/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 

                </div>

                <div class="panel-body">

                <form action="/network-info/{{$networkInfo->id}}" method="post">
                @csrf
                @method('PUT')
                 <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                                <option value="{{$networkInfo->branch->id}}">{{$networkInfo->branch->name}}</option>
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cpe">CPE</label>
                            <input type="text" class="form-control" name="cpe" value="{{$networkInfo->cpe}}">
                        </div>
                        <div class="form-group">
                            <label for="zone">Zone</label>
                            <input type="text" class="form-control" name="zone" id="zone"   value="{{$networkInfo->zone}}">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city"  value="{{$networkInfo->city}}">
                        </div>
                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <select name="service_type" id="service_type" class="form-control">
                               <option value="{{$networkInfo->service_type}}">{{$networkInfo->service_type}}</option>
                                <option value="data">Data</option>
                                <option value="internet">Internet</option>
                                <option value="sms/ussd">SMS/USSD</option>
                            </select>
                          
                        </div>
                       
                        <div class="form-group">
                            <label for="lan_ip">LAN IP</label>
                            <input type="text" class="form-control" name="lan_ip" id="lan_ip" value="{{$networkInfo->lan}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="">Sub net Mask</label>
                            <select name="sub_net_mask" id="sub_net_mask" class="form-control">
                                <option value="{{$networkInfo->subnet_mask}}">{{$networkInfo->subnet_mask}}</option>
                                <option value="255.0.0.0">255.0.0.0</option>
                                <option value="255.255.0.0">255.255.0.0</option>
                                <option value="255.255.255.0">255.255.255.0</option>
                                <option value="255.255.255.248">255.255.255.248</option>
                                <option value="255.255.255.252">255.255.255.252</option>
                            </select>
                           
                        </div>
                       
                        <div class="form-group">
                            <label for="wan_ip">WAN IP</label>
                            <input type="text" class="form-control" name="wan_ip" id="wan_ip" value="{{$networkInfo->wan_ip}}">
                        </div>
                        <div class="form-group">
                            <label for="router_wan_interface">Router WAN inteface</label>
                            <input type="text" class="form-control" name="router_wan_interface" id="router_wan_interface" value="{{$networkInfo->router_wan_interface}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="">Date Inteface</label>
                            <input type="text" class="form-control" name="data_interface" id="data_interface" value="{{$networkInfo->data_interface}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                        
                        <div class="form-group">
                            <label for="internet_interface">Internet Inteface</label>
                            <input type="text" class="form-control" name="internet_interface" id="internet_interface" value="{{$networkInfo->internet_interface}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="managment_interface">Managment Interface</label>
                            <input type="text" class="form-control" name="managment_interface" id="managment_interface" value="{{$networkInfo->managment_interface}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_0">Router Tunnel 0</label>
                            <input type="text" class="form-control" name="router_tunnel_0" id="router_tunnel_0" value="{{$networkInfo->router_tunnel_0}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_100">Router Tunnel 100</label>
                            <input type="text" class="form-control" name="router_tunnel_100" id="router_tunnel_100" value="{{$networkInfo->router_tunnel_100}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="router_tunnel_200">Router Tunnel 200</label>
                            <input type="text" class="form-control" name="router_tunnel_200" id="router_tunnel_200" value="{{$networkInfo->router_tunnel_200}}"  pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="service_no">Service No</label>
                            <input type="number" class="form-control" name="service_no" id="service_no" value="{{$networkInfo->service_no}}">
                        </div>
                        <div class="form-group">
                            <label for="link_speed">Link Speed</label>
                            <input type="text" class="form-control" name="link_speed" id="link_speed" value="{{$networkInfo->link_speed}}">
                        </div>
                        <div class="form-group">
                            <label for="msg_box_no">Message Box No</label>
                            <input type="text" class="form-control" name="msg_box_no" id="msg_box_no" value="{{$networkInfo->msg_box_no}}">
                        </div>
                        <div class="form-group">
                            <label for="mac">MAC</label>
                            <input type="text" class="form-control" name="mac" id="mac" value="{{$networkInfo->mac}}" pattern="([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-success">
                        </div>
                    </div>
                 </div>
                   
                </form>
                    
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