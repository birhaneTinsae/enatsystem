@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            {{--  <li class="list-group-item"><a href="#" >Job Positions List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>  --}}
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>  
                <li><a href="hr">HR</a></li>              
                <li class="active">Job Position</li>
            </ol>
             <form action="searchjobs" method="get">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="queryjob" name="queryjob" placeholder="Search Job Position" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon">
                    <button type="submit" class="fa fa-search">  </button>                  
                    </span>
                </div>
                </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Job Position List
                   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>

                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a>

                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                  
                    <a href="job/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                   
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Position</th>    
                                <th>Grade</th>                            
                                <th>Base Salary</th>
                                <th>Maximum Salary</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_positions as $job_position)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$job_position->name}}</td> 
                                <td>{{$job_position->grade}}</td> 
                                <td>{{$job_position->step1}}</td>                                
                                <td>{{$job_position->step10}}</td>                                
                                <td><a href="{{ route('job.show', $job_position->id) }}" class="btn-success btn-sm">
                                 <i class="fa fa-info-circle"></i> </a>
                                </td>
                                  @can('update',App\ActingEmployee::class)                                  
                                <td>                                
                                <a href="{{ route('job.edit', $job_position->id) }}" class="btn-warning btn-sm" >
                                <i class="fa fa-edit"></i></a></td>
                                @endcan  
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$job_positions->links()}}
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
