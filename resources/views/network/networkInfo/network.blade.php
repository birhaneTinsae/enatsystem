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
    <div class="col-md-10">
                <form action="/network-info/search" class="row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="service_no" placeholder="Service #">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="lan" placeholder="Lan ip">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="wan_ip" placeholder="Wan ip">
                    </div>
                    <div class="form-group col-md-3">
                    <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        <div class="col-md-10 ">
        {{--  <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">Network Info

                {{--  <a href="/network-info/report" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Report</a>

                   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan --}}
                        @hasrole('admin')
                    <a href="/network-info/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                        @endhasrole

                </div>

                <div class="panel-body">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Service #</th>
                                <th>Lan Ip</th>
                                <th>Wan Ip</th>
                                <th>MAC</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($networkInfos as $networkInfo)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$networkInfo->branch->name}}</td>
                                <td>{{$networkInfo->service_no}}</td>
                                <td>{{$networkInfo->lan}}</td>
                                <td>{{$networkInfo->wan_ip}}</td>
                                <td>{{$networkInfo->mac}}</td>
                                <td><a href="/network-info/{{$networkInfo->id}}" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/network-info/{{$networkInfo->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$networkInfos->links()}}
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