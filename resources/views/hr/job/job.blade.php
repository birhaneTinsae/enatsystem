@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Job Positions List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
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
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_positions as $job_position)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$job_position->name}}</td>                                
                                <td><a class="btn-success btn-sm" data-toggle="modal" data-target="#employeeDetailModal" data-id="{{$job_position->id}}"><i class="fa fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" data-toggle="modal" data-target="#employeeUpdateModal" data-id="{{$job_position->id}}"><i class="fa fa-edit"></i></a></td>
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
<!-- Detail View Modal -->
<!-- <div class="modal fade" id="employeeDetailModal" tabindex="-1" role="dialog" aria-labelledby="employeeDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeDetailModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label for="full_name">Fullname</label>
                <input type="text" id="full_name" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="tel" id="phone_no" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="employed_date">Hired Date</label>
                <input type="date" id="employed_date" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="job_position">Job Position</label>
                <input type="text" id="job_position" class="form-control" readonly>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> -->
<!-- Detail View Modal end -->

<!-- Update View Modal -->
<!-- <div class="modal fade" id="employeeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="employeeUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeUpdateModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/hr" >
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="full_name">Fullname</label>
                <input type="text" id="full_name" class="form-control" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" >
            </div>
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="tel" id="phone_no" class="form-control" >
            </div>
            <div class="form-group">
                <label for="employed_date">Hired Date</label>
                <input type="date" id="employed_date" class="form-control" >
            </div>
            <div class="form-group">
                <label for="job_position">Job Position</label>
                <input type="text" id="job_position" class="form-control" >
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Update</button>
        
      </div>
    </div>
  </div>
</div> -->
<!-- Update View Modal end -->
@endsection
