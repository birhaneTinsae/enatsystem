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
                <div class="panel-heading">FourG & ThreeG

                    <a href="/fourG-threeG-maintainance/{{$network->id}}/edit" class="text-right pull-right panel-menu-item"><i class="far fa-edit"></i>
                    Edit</a>

                    <a href="/fourG-threeG-maintainance/{{$network->id}}/delete" class="text-right pull-right panel-menu-item"><i class="far fa-trash-alt"></i>
                    Delete</a> 
                    <a href="/fourG-threeG-maintainance/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 


                </div>

                <div class="panel-body">
              
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" readonly>
                                <option value="{{$network->branch->id}}">{{$network->branch->name}}</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employee">Employee</label>
                            <select name="employee" id="employee" class="form-control" readonly>
                                <option value="{{$network->employee->id}}">{{$network->employee->name}}</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="connection_type">Connection Type</label>
                            <input type="text" class="form-control" name="connection_type" id="connection_type" value="{{$network->connection_type}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <input type="text" class="form-control" name="service_type" id="service_type" value="{{$network->service_type}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="service_no">Service No</label>
                            <input type="text" class="form-control" name="service_no" id="service_no" value="{{$network->service_no}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="device_imei">Device IMEI</label>
                            <input type="text" class="form-control" name="device_imei" id="device_imei" value="{{$network->imei_no}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="device_serial_no">Device Serial No</label>
                            <input type="text" class="form-control" name="device_no" id="device_serial_no" value="{{$network->serial_no}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sim_card_no">SIM card ICCMI NO</label>
                            <input type="text" class="form-control" name="sim_card_no" id="sim_card_no" value="{{$network->sim_card_iccid_no}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                           <textarea name="remark" id="remark" cols="30" rows="5" class="form-control" readonly>{{ $network->remarks}}</textarea>
                        </div>
                        <form action="/fourG-threeG-maintainance/{{$network->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Deleted" class="btn btn-sm btn-danger">                        
                        </form>
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