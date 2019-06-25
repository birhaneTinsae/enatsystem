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
                <div class="panel-heading">Domain Name
                @hasrole('admin')
                    <a href="/domain-name/{{$domainName->id}}/edit" class="text-right pull-right panel-menu-item"><i class="far fa-edit"></i>
                    Edit</a>
                    @endhasrole
                   <a href="/domain-name/{{$domainName->id}}" class="text-right pull-right panel-menu-item"><i class="far fa-trash-alt"></i>  Delete</a>
                  
                   <a href="/domain-name/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 
                         @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">
               
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control"  readonly>
                               <option value="{{$domainName->branch->id}}">{{$domainName->branch->name}}</option>
                          
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bios_name">BIOS Name</label>
                            <input type="text" class="form-control" name="bios_name" id="bios_name" value="{{$domainName->bios_name}}" readonly>
                        </div>
                        
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="network_address">Network Address</label>
                            <input type="text" class="form-control" name="network_address" id="network_address" value="{{$domainName->network_address}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="access_switch_address">Access Switch Address</label>
                            <input type="text" class="form-control" name="access_switch_address" id="access_switch_address" value="{{$domainName->switch_address}}" readonly>
                        </div>
                        @hasrole('admin')
                        <form action="/domain-name/{{$domainName->id}}" method="post">
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