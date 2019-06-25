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
                <form action="/maintainance-info/search" class=" row ">
                <div class="form-group col-md-4">
                <select name="branch_id" id="branch_id" class="form-control">
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                </div>
                <div class="form-group col-md-4">
                <select name="item" id="item" class="form-control">
                                <option value="System Unit">System Unit</option>
                                <option value="router">Router</option>
                                <option value="laptop">Laptop</option>
                                <option value="printer">Printer</option>
                                <option value="other">Other</option>
                            </select>
                </div>
               
                        
                    <div class="form-group col-md-4">
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
                <div class="panel-heading">Maintainance Info

                {{--  <a href="/maintainance-info/report" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Report</a>


                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
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
                                <th>Time Taken</th>
                                <th>Assigned To</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td>{{$maintainanceInfo->time_taken}}</td>
                                @if(is_null($maintainanceInfo->assigned_to))
                                <td>{{$maintainanceInfo->received_by}}</td>
                                @else
                                <td>{{$maintainanceInfo->assigned_to}}</td>
                                @endif
                                <td><a href="/maintainance-info/{{$maintainanceInfo->id}}" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/maintainance-info/{{$maintainanceInfo->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$maintainanceInfos->links()}}
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