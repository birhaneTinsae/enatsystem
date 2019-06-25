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
        {{--  <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">Maintainance Info

                <a href="/maintainance-info/report" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Report</a>
                    <a href="/maintainance-info/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 

                  {{--   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan--}}
                    <a href="/maintainance-info/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>

                </div>

                <div class="panel-body">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Received Date</th>
                                <th>Final Date</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($maintainanceInfos) )

                            @foreach($maintainanceInfos as $maintainanceInfo)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$maintainanceInfo->branch->name}}</td>
                                <td>{{$maintainanceInfo->received_at}}</td>
                                <td>{{$maintainanceInfo->completion_date}}</td>
                                
                                @if($maintainanceInfo->status=="COMPLETED")
                                <td><span class="label label-success">{{$maintainanceInfo->status}}</span></td>
                                @elseif($maintainanceInfo->status=="INPROGRESS")
                                <td><span class="label label-info">{{$maintainanceInfo->status}}</span></td>
                                @elseif($maintainanceInfo->status=="RECEIVED")
                                <td><span class="label label-default">{{$maintainanceInfo->status}}</span></td>
                                @else
                                <td><span class="label label-warning">{{$maintainanceInfo->status}}</span></td>
                                @endif
                                <td>{{$maintainanceInfo->received_by}}</td>
                                <td><a href="/maintainance-info/{{$maintainanceInfo->id}}" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/maintainance-info/{{$maintainanceInfo->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$maintainanceInfos->links()}}
                    @else
                    <h1>No record found</h1>
                    @endif
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