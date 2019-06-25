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
    <div class="col-md-6 ">
                <form action="/tt-maintainance/search" method="get" class="row">
                    <div class="form-group col-md-6">
                           <select name="status" id="" class="form-control">
                               <option value="completed">Complete</option>
                               <option value="inprogress">Inprogress</option>
                           </select>
                            
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </div>
                    
                </form>
            </div>
        <div class="col-md-10 ">
        {{--    <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/isd">ISD</a></li>
                <li class="active">TT</li>
            </ol>--}}
            
            <div class="panel panel-default">
                <div class="panel-heading">TT registration

                {{--    <a href="/tt-maintainance/report" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Report</a>

                   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> @can('delete-role')
                    <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    </form>
                     @endcan --}}
                    <a href="/tt-maintainance/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 

                </div>

                <div class="panel-body">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Disconnected At</th>
                                <th>Registered At</th>
                                <th>Follow Up No</th>
                                <th>Status</th>
                                <th>Time Taken</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tts as $tt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$tt->branch->name}}</td>
                                <td>{{\Carbon\Carbon::parse($tt->disconnected_at)->toDayDateTimeString()}}</td>
                                <td>{{\Carbon\Carbon::parse($tt->registered_at)->toDayDateTimeString()}}</td>
                                <td>{{$tt->follow_up_no}}</td>
                                @if($tt->status=="COMPLETED")
                                <td><span class="label label-success">{{$tt->status}}</span></td>
                                @elseif($tt->status=="INPROGRESS")
                                <td><span class="label label-info">{{$tt->status}}</span></td>
                                @else
                                <td><span class="label label-default">{{$tt->status}}</span></td>
                                @endif
                                @if(!is_null($tt->reconnected_at))
                               <td>{{$tt->created_at->diffForHumans($tt->reconnected_at)}}</td>
                               @else
                               <td>{{$tt->status}}</td>
                               @endif
                                <td><a href="/tt-maintainance/{{$tt->id}}" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/tt-maintainance/{{$tt->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$tts->links()}}
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