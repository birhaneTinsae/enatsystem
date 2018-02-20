@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="hr" >Employee List</a></li>
                             <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            <li class="list-group-item"><a href="role" >Role</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">HR</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Acting Employee Lists
                    @can('close-role')                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    @endcan

                    @can('update-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    @endcan

                    @can('delete')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create', App\ActingEmployee::class)
                    <a href="actingemployee/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    @endcan
                   
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>
                    @endif
                    @if (session('delete_status'))
                        <div class="alert alert-danger">
                            {{ session('delete_status') }}
                        </div>
                    @endif
                    

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full name</th>
                                <th>Job Position</th>
                                <th>Branch</th>
                                <th>Acting Position</th>                                
                                <th>Acting For Branch</th>
                                <th>From</th>
                                <th>Up to</th>
                                <th>Status</th>
                                 <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->employee_name}}</td>
                                <td>{{$employee->job_position}}</td>
                                <td>{{$employee->home_branch}}</td>
                                <td>{{$employee->acting_job_position}}</td>
                                <td>{{$employee->acting_branch_name}}</td>
                                <td>{{$employee->start_date}}</td>
                                <td>{{$employee->end_date}}</td>
                                @if ($employee->status==="1")
		                            <td><span class=".label-success">
			                        <label class='label label-success'>Active</label>
		                            </span></td>
                                 @else
                                    <td><span class=".label-success">
			                        <label class='label label-danger'>Blocked</label>
		                            </span></td>
                                @endif
                                @can('update',App\ActingEmployee::class)
                                <td><a 
                                class="btn-warning btn-sm" data-toggle="modal" data-target="#actingemployeeUpdateModal" data-id="{{$employee->id}}"><i class="fa fa-edit"></i></a></td>
                                @endcan
                              
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
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

<!-- Detail View Modal end -->

<!-- Update View Modal -->

 <div class="modal fade" id="actingemployeeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="employeeUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actingemployeeUpdateModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="actingemployee/{{$employee->id}}"  method="post">         
            {{method_field('patch')}}
              {{csrf_field()}}
            <div class="form-group">
                <label for="full_name">Fullname</label>
                <input type="text" id="full_name" name="full_name"
                list="employees-list" class="form-control" >
                <datalist id="employees-list"> </datalist>
            </div>
            
            <div class="form-group">
                <label for="acting_job_position">Acting_Position</label>
                <select class="form-control" name="acting_job_position" id="acting_job_position" >
                      {{$job_positions=App\JobPosition::all()}}
                                    <option value="{{$employee->acting_job_position}}">{{$employee->acting_job_position}}
                                        @foreach($job_positions as $job_position)
                                        <option value="{{$job_position->id}}">{{$job_position->name}}</option>
                                        @endforeach
                                    <select>
               
            </div>
            <div class="form-group">
                <label for="acting_branch_name">Acting_Branch</label>
                <select class="form-control" name="acting_branch_name" id="acting_branch_name">
                                     {{$branch=App\Branch::all()}}
                                    <option value="{{$employee->acting_branch_name}}">
                                    {{$employee->acting_branch_name}}
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->branch_name}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
               
            </div>
            <div class="form-group">
                <label for="start_date">Start_Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" >
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select  class="form-control" name="status" id="status" >
                                    <option value="{{$employee->status}}"> 
                                   @if ($employee->status==="1")
		                            <td><span class=".label-success">
			                        <label class='label label-success'>Active</label>
		                            </span></td>
                                 @else
                                    <td><span class=".label-success">
			                        <label class='label label-danger'>Blocked</label>
		                            </span></td>
                                @endif
                                    </option>
                                    <option value="1">Active</option>
                                    <option value="0">Blocked</option>
                                   
                                    </select>
            </div>
             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Update</button>
        
      </div>

        </form>
      </div>
     
    </div>
  </div>
</div> 





<!-- Update View Modal end -->
@endsection