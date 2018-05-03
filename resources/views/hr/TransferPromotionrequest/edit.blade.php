@extends('layouts.app')
@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>                            
                        </ul>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>               
                <li><a href="/transfer">Transfer/Position Change</a></li>               
                <li class="active">Transfer/Position Change</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Update record                 
                </div>
                <div class="panel-body">                                  
               <form method="POST" action="/transferpromotionrequest/{{ $transferpromotion->id }}">
                         {{ method_field ('PUT')}}
                        {{ csrf_field() }}
                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="employee"> Employee name</label>
                                   
                                    <select class="form-control" name="employee" id="employee">
                                     {{$employee=App\Employee::all()}}
                                    <option value="{{$transferpromotion->employee_id}}">{{$emp_name}}
                                   </option>
                                        @foreach($employee as $emp)
                                        <option value="{{$emp->id}}">{{$emp->full_name}}</option>
                                        @endforeach
                                    <select>
                             </div>                                                                                                        
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group  {{ $errors->has('job_position') ? ' has-error' : '' }}">
                                   <label for="job_position">Requested Position</label>                                    
                                    <select class="form-control" name="job_id" id="job_id" >
                                        <option value="{{$transferpromotion->to_job_position}}">{{$to_job}}
                                   </option>
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}"  @if (old('job_position_id') == "$id") {{ 'selected' }} @endif>{{$job_position}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('job_position_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('job_position_id') }}</strong>
                                    </span>
                                    @endif
                             </div> 
                                </div>
                                

                                   


                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Requested Branch/Department</label>                                   
                                    <select class="form-control" name="branch_name" id="branch_name">
                                     {{$branch=App\Branch::all()}}
                                    <option value="{{$transferpromotion->to_branch}}">{{$to_branch}}
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->id}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
                             </div>
                              
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <select  class="form-control" name="remark" id="remark" >
                                    <option value="{{$transferpromotion->remark}}">{{$transferpromotion->remark}}
                                   </option>
                                    <option value="Lateral">Lateral</option>
                                    <option value="Place Change">Place Change</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="date"> Date</label>
                            <input type="date" value="{{$transferpromotion->date}}"class="form-control col-xs-3" id="date" name="date"  >                            
                        </div> 
                        </div>
                    <div class="col-md-6">
                    <label for="reason">Reason</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="reason" value="{{$transferpromotion->reason}}">{{$transferpromotion->reason}}</textarea>                            
                        </div> 
                       </div>
                            </div>                                                                               
                                <a href="/transferpromotionrequest" class="btn btn-danger btn-sm">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    update
                                </button>                                                                              
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