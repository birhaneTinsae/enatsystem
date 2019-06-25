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
                <form action="/fourG-threeG-maintainance/search" method="get" class="row">
                <div class="  col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="serial_no" placeholder="Serial Number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="imei_no" placeholder="IMEI Number">
                    </div>
                </div>
                <div class="  col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="service_no" placeholder="Service Number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="iccid_no" placeholder="ICCID Number">
                    </div>
                </div>
               
                    <div class="form-group">
                    <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        <div class="col-md-10 ">
            {{--<ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>
           --}}
            <div class="panel panel-default">
                <div class="panel-heading">FourG & ThreeG networks

                {{-- <a href="/fourG-threeG-maintainance/report" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Report</a>

                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan --}}
                    <a href="/fourG-threeG-maintainance/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 
                </div>

                <div class="panel-body">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Service #</th>
                                <th>Serial #</th>
                                <th>IMEI</th>
                                <th>ICCDI #</th>
                                <th>Responsible Person</th>
                                <th>Connection Type</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($networks as $network)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$network->branch->name}}</td>
                                <td>{{$network->service_no}}</td>
                                <td>{{$network->serial_no}}</td>
                                <td>{{$network->imei_no}}</td>
                                <td>{{$network->sim_card_iccid_no}}</td>
                            
                                <td>{{$network->employee->name}}</td>
                                <td>{{$network->connection_type}}</td>
                                <td><a href="/fourG-threeG-maintainance/{{$network->id}}" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/fourG-threeG-maintainance/{{$network->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$networks->links()}}
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