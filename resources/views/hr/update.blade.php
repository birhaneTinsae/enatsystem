@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            {{--  <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>  --}}
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
                <div class="panel-heading">Update record
                    
                </div>

                <div class="panel-body">
                   

                    
                    <form method="POST" action="/hr/{{$employee->id}}" >
                            {{ csrf_field() }}
                          @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                        <label for="employee">Employee</label>
                                        <input disabled type="text" class="form-control" list="employees-list" value="{{$emp_name}}" id="new-employee" name="user_id" placeholder="Employee">
                            
                                    <datalist id="employees-list"> </datalist>
                                    @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                        <div class="form-group {{ $errors->has('join_date') ? ' has-error' : '' }}">
                            <label for="join_date">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date" value="{{$employee->employed_date}}" >
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
                                       {{$job_positions=App\Jobposition::all()}}
                                    <option value="{{$employee->job_position_id}}">{{$job_name}}
                                        @foreach($job_positions as $job_position)
                                        <option value="{{$job_position->id}}">{{$job_position->name}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('job_position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_position') }}</strong>
                                    </span>
                                    @endif
                                    
                             </div>                                                          
                               <div class="form-group {{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary">Salary</label>
                            <input type="text" required class="form-control" id="salary" name="salary" value="{{$employee->salary}}" placeholder="Salary" >
                                    @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                    @endif
                        </div>
                                 <div class="form-group {{ $errors->has('enat_id') ? ' has-error' : '' }}">
                            <label for="enat_id">Employee_Id</label>
                            <input type="text" pattern="[E][B][-][\d]{2,}" required class="form-control"  id="enat_id" name="enat_id" value="{{$employee->enat_id}}" placeholder="eg. EB- id no" >
                                    @if ($errors->has('enat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enat_id') }}</strong>
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
                         <a href="/hr" class="btn btn-danger btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
