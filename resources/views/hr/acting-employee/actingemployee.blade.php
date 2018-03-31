@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <!-- <li class="list-group-item"><a href="hr" >Employee List</a></li>
                             <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            <li class="list-group-item"><a href="role" >Role</a></li> -->
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>         
                <li><a href="/hr">HR</a></li>                     
                <li class="active">Acting Employee</li>
            </ol>
        <form action="searchactingemployee" method="get">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="queryemp" name="queryemp" placeholder="Search Employee" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon">
                    <button type="submit" class="fa fa-search">  </button>                  
                    </span>
                </div>
                </div>
            </form>
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
     @if($employees->isNotEmpty())
                    <table class="table table-striped"  id="search-results">
                        <thead>
                            <tr>                                
                                <th>Full name</th>
                                <th>Job Position</th>
                                <th>Branch</th>
                                <th>Acting Position</th>                                
                                <th>Acting For Branch</th>
                                <th>From</th>
                                 <th>Up to</th>
                                 <th>Duration</th>
                                  <th>Remark</th> 
                                 <th>Status</th>                                                                
                                 <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>                                
                                <td>{{$employee->user->name}}</td>
                                <td>{{$employee->job_position->name}}</td>
                                <td>{{$employee->branch->branch_name}}</td>                            
                                <td>{{$employee->acting_job_position_name}}</td>
                                <td>{{$employee->acting_branch_name}}</td>                               
                                <td>{{$employee->start_date}}</td>
                                <td>{{$employee->end_date}}</td>
                                <td><label class='label label-primary'>For about {{$employee->duration}} months</label></td>
                                  @if ($employee->remark==="1")
		                            <td>
			                        <label class='label label-primary'>Notification Required</label>
		                            </td>
                                 @else
                                    <td>
			                        <label class='label label-primary'>Notification not Required</label>
		                            </td>
                                @endif
                                @if ($employee->status==="1")
		                            <td><span class=".label-success">
			                        <label class='label label-success'>Active</label>
		                            </span></td>
                                 @else
                                    <td><span class=".label-success">
			                        <label class='label label-danger'>Terminated</label>
		                            </span></td>
                                @endif
                                @can('update',App\ActingEmployee::class)
                                <td><a 
                                class="btn-warning btn-sm" data-toggle="modal" data-target="#actingemployeeUpdateModal" 
                                data-empid="{{$employee->id}}" 
                                data-full_name="{{$employee->user->name}}"
                                data-acting_job_position_name="{{$employee->acting_job_position_name}}"
                                data-acting_branch_name="{{$employee->acting_branch_name}}"
                                data-start_date="{{$employee->start_date}}"
                                data-end_date="{{$employee->end_date}}"
                                data-status="{{$employee->status}}" >
                                <i class="fa fa-edit"></i></a></td>
                                @endcan                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  @else
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4"> Acting Employees Empty</h1>
                      <p class="lead">No Acting Employees yet.</p>
                    </div>
                  </div>
                @endif
                    {{$employees->links()}}
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
        <form action="/actingemployee/update "  method="post">         
            {{method_field('put')}}
              {{csrf_field()}}
            <div class="form-group">
                <label for="full_name">Fullname</label>
                <input type="text" required id="full_name" name="full_name"
                list="actemployees-list" class="form-control" >
                <datalist id="actemployees-list"> </datalist>
            </div>
            
        <div class="form-group">
                <label for="acting_job_position_name">Acting_Job_Position</label>
                <select required class="form-control" name="acting_job_position_name" id="acting_job_position_name">
                                      {{$job=App\JobPosition::all()}}                                    
                                        @foreach($job as $jobs)
                                        <option value="{{$jobs->name}}">{{$jobs->name}}</option>
                                        @endforeach
                                    <select>               
        </div>
            <div class="form-group">
                <label for="acting_branch_name">Acting_Branch</label>
                <select class="form-control" name="acting_branch_name" id="acting_branch_name" required>
                                     {{$branch=App\Branch::all()}}
                                   
                                        @foreach($branch as $br)
                                        <option value="{{$br->branch_name}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
               
            </div>
            <div class="form-group">
                <label for="start_date">Start_Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" >
            </div>
              <label> Is End date known ?  </label>          
            Yes
        <input type="radio" onclick="javascript:yesnoCheck();" name="enddate" id="enddate" value="Yes"/>
        </span>
        <span>
        No
        <input type="radio" onclick="javascript:yesnoCheck();" name="enddate" id="enddate" value="No"/ >
        </span>  
          <div id="ifYes" style="display:none">If yes, Fill:
            <label for="end_date">End Date</label>
            <input type="date" class="form-control col-xs-3" id="end_date" name="end_date"  >
        </div>      
            <div class="form-group">
                <label for="end_date">End_Date</label>
                <input type="date" required id="end_date" name="end_date" class="form-control" >
            </div>
              <div class="form-group">             
                <input type="hidden" id="empid" name="empid" value=""class="form-control"  >
            </div>
            <div class="form-group">
                <label for="status">Status                   
                </label>
                <select  class="form-control" name="status" id="status" required >                                                                    
                                    <option value="0">Terminated</option>                                 
                                    <option value="1">Active</option>                                                           
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
