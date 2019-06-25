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
                <div class="panel-heading">Update 

                <a href="/fourG-threeG-maintainance/" class="text-right pull-right panel-menu-item"><i class="fas fa-list"></i>
                        List</a> 


                </div>

                <div class="panel-body">
                <form action="/fourG-threeG-maintainance/{{$network->id}}" method="post">
                @csrf
                @method('PUT')
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                                <option value="{{$network->branch->id}}">{{$network->branch->name}}</option>
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employee">Responsible</label>
                            <select name="employee" id="employee" class="form-control">
                                <option value="{{$network->employee->id}}">{{$network->employee->name}}</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="connection_type">Connection Type</label>
                            <select name="connection_type" id="connection_type" class="form-control">
                               <option value="{{$network->connection_type}}">{{$network->connection_type}}</option>
                                <option value="3g">3G</option>
                                <option value="4g">4G</option>
                                <option value="ev-do">EV-DO</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <select name="service_type" id="service_type" class="form-control">
                            <option value="{{$network->service_type}}">{{$network->service_type}}</option>
                                <option value="data">Data</option>
                                <option value="internet">Internet</option>
                                <option value="gprs">GPRS</option>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="service_no">Service No</label>
                            <input type="number" class="form-control" name="service_no" id="service_no" value="{{$network->service_no}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="device_imei">Device IMEI</label>
                            <input type="number" class="form-control" name="device_imei" id="device_imei" value="{{$network->imei_no}}">
                        </div>
                        <div class="form-group">
                            <label for="device_serial_no">Device Serial No</label>
                            <input type="text" class="form-control" name="device_no" id="device_serial_no" value="{{$network->serial_no}}">
                        </div>
                        <div class="form-group">
                            <label for="sim_card_no">SIM card ICCMI NO</label>
                            <input type="text" class="form-control" name="sim_card_no" id="sim_card_no" value="{{$network->sim_card_iccid_no}}">
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                           <textarea name="remark" id="remark" cols="30" rows="5" class="form-control">{{ $network->remarks}}</textarea>
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