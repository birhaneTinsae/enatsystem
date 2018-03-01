@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="actingemployee" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <ol class="breadcrumb">
                <li><a href="actingemployee">Home</a></li>               
                <li><a href="actingemployee">HRM</a></li>               
                <li class="active">New Acting Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new Acting employee
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                     Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                     Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                     New</a>
                </div>

                <div class="panel-body">
                   

                    
                    <form method="POST" action="/actingemployee">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control" list="employees-list" id="new-employee" name="new_employee" placeholder="Employee">
                            
                                    <datalist id="employees-list"> </datalist>
                                </div>
                                
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date"  >
                            
                        </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Acting Position</label>
                                    
                                    <select class="form-control" name="acting_job_id" id="acting_job_id" >
                                    <option>-----Select Job Position -----
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}">{{$job_position}}</option>
                                        @endforeach
                                    <select>
                             </div>
                                </div>
                                
                                       <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Acting Branch</label>
                                   
                                    <select class="form-control" name="acting_branch_id" id="acting_branch_id">
                                     {{$branch=App\Branch::all()}}
                                    <option>-----Select Branch -----
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->id}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
                             </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="status">Status</label>
                                    <select  class="form-control" name="status" id="status" >
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>
                                   
                                    </select>
                                </div>
                                </div>
                       
                            </div>
                       
                      
                     

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                   
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
