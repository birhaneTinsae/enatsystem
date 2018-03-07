@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
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
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HRM</a></li>               
                <li class="active">New Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee
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
                   

                    
                    <form method="POST" action="/hr">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                        <label for="employee">Employee</label>
                                        
                                        <input type="text" class="form-control" list="employees-list" id="new-employee" name="user_id" placeholder="Employee">
                            
                                    <datalist id="employees-list"> </datalist>
                                    @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                        <div class="form-group {{ $errors->has('join_date') ? ' has-error' : '' }}">
                            <label for="join_date">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date"  >
                                    @if ($errors->has('join_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('join_date') }}</strong>
                                    </span>
                                    @endif
                        </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group  {{ $errors->has('job_position') ? ' has-error' : '' }}">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_position" id="job_position" >
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}">{{$job_position}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('job_position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_position') }}</strong>
                                    </span>
                                    @endif
                             </div>
                                </div>
                            </div>
                       
                      
                        <a  class="btn btn-sm text-center" role="button" data-parent="#selector" data-toggle="collapse" data-target="#collapseAddress"><span class="badge badge-light">Address</span></a>
                        <br>
                        <div class="collapse" id="collapseAddress">
                            <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Sub City</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">Woreda</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Kebele</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">House No</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
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
