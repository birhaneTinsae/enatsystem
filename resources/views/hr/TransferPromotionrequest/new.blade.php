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
                <li><a href="/transferpromotionrequest">Transfer/Promotion Req</a></li>               
                <li class="active">New Transfer/Promotion Request</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new record                 
                </div>
                <div class="panel-body">                                  
                    <form method="POST" action="/transferpromotionrequest">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control" list="actemployees-list"
                                         id="new-employee" name="new_employee" placeholder="Employee">                            
                                    <datalist id="actemployees-list"> </datalist>
                                </div>                                                                                                         
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Requested Position</label>                                    
                                    <select class="form-control" name="job_id" id="job_id" >
                                    {{$job_positions=App\Jobposition::all()}}
                                    <option>-----Select Job Position -----
                                        @foreach($job_positions as $job_position)
                                        <option value="{{$job_position->id}}">{{$job_position->name}}</option>
                                        @endforeach
                                    <select>
                             </div>
                                </div>
                                
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Requested Branch/Department</label>                                   
                                    <select class="form-control" name="branch_id" id="branch_id">
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
                                    <label for="reason">Reason</label>
                                    <select  class="form-control" name="reason" id="reason" >
                                    <option>-----Verify Reason -----
                                   </option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Promotion">Promotion</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div> 
                        </div>
                    <div class="col-md-6">
                    <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark">Remark</textarea>                            
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
