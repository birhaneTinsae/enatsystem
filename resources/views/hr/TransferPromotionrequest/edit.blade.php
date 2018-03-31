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
                <li><a href="/transfer">Transfer/Promotion</a></li>               
                <li class="active">New Transfer/Promotion</li>
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
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control" disabled list="actemployees-list"
                                         id="new-employee" name="new_employee" placeholder="Employee" value={{$emp_name}}>                            
                                    <datalist id="actemployees-list"> </datalist>
                                    <input type="hidden" name="emp_id" value="{{$transferpromotion->employee_id}}">
                                </div>                                                                                                         
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Requested Position</label>                                    
                                    <select class="form-control" name="job_id" id="job_id" >
                                    {{$job_positions=App\Jobposition::all()}}
                                    <option value="{{$transferpromotion->to_job_position}}">{{$to_job}}
                                        @foreach($job_positions as $job_position)
                                        <option value="{{$job_position->id}}">{{$job_position->name}}</option>
                                        @endforeach
                                    <select>
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
                                    <label for="reason">Reason</label>
                                    <select  class="form-control" name="reason" id="reason" >
                                    <option value="{{$transferpromotion->reason}}">{{$transferpromotion->reason}}
                                   </option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Promotion">Promotion</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="start_date"> Date</label>
                            <input type="date" value="{{$transferpromotion->date}}"class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div> 
                        </div>
                    <div class="col-md-6">
                    <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark" value="{{$transferpromotion->remark}}">{{$transferpromotion->remark}}</textarea>                            
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
