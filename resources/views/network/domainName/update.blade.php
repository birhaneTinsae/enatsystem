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
        {{--<ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">Domain Name

                <a href="/domain-name" class="text-right pull-right panel-menu-item"><i class="fas fa-list"></i>
                        List</a> 
                    <a href="/domain-name/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 

                </div>

                <div class="panel-body">
                <form action="/domain-name/{{$domainName->id}}" method="post">
                @csrf
                @method('PUT')
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                               <option value="{{$domainName->branch->id}}">{{$domainName->branch->name}}</option>
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bios_name">BIOS Name</label>
                            <input type="text" class="form-control" name="bios_name" id="bios_name" value="{{$domainName->bios_name}}">
                        </div>
                        
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="network_address">Network Address</label>
                            <input type="text" class="form-control" name="network_address" id="network_address" value="{{$domainName->network_address}}" pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                            <label for="access_switch_address">Access Switch Address</label>
                            <input type="text" class="form-control" name="access_switch_address" id="access_switch_address" value="{{$domainName->switch_address}}" pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}">
                        </div>
                        <div class="form-group">
                           
                            <input type="submit" value="save" class="btn btn-success">
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