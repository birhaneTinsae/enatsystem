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
                <div class="panel-heading">Add new record                 
                </div>
                <div class="panel-body">                                  
                    <form method="POST" action="/transferpromotion">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                                 <div class="form-group">
                                    <label for="employee"> Employee name</label>
                                   
                                    <select class="form-control" name="employee" id="employee">
                                     {{$employee=App\Employee::all()}}
                                    <option value="">-----Select Employee -----
                                   </option>
                                        @foreach($employee as $emp)
                                        <option value="{{$emp->id}}">{{$emp->full_name}}</option>
                                        @endforeach
                                    <select>
                                           @if ($errors->has('employee'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('employee') }}</strong>
                                    </span>
                                    @endif
                             </div>        

                                                                                                                             
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group  {{ $errors->has('job_id') ? ' has-error' : '' }}">
                                    <label for="job_position">New Position</label>
                                    
                                    <select class="form-control" name="job_id" id="job_id" >
                                         <option value="">-----Select Job Position  -----
                                   </option>
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}"  @if (old('job_position_id') == "$id") {{ 'selected' }} @endif>{{$job_position}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('job_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('job_id') }}</strong>
                                    </span>
                                    @endif
                             </div> 
                                </div>
                                
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">New Branch/Department</label>                                   
                                    <select class="form-control" name="branch_id" id="branch_id">
                                     {{$branch=App\Branch::all()}}
                                    <option>-----Select Branch -----
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->id}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
                                      @if ($errors->has('branch_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('branch_id') }}</strong>
                                    </span>
                                    @endif
                             </div>
                                <div class="form-group">
                                    <label for="job_position_step"> New Job_Position_Step</label>
                                    <select  class="form-control" name="job_position_step" id="job_position_step" >
                                    <option value="">----Select job_position_step----</option>
                                    <option value="base" @if (old('job_position_step') == "base") {{ 'selected' }} @endif>Base</option>
                                    <option value="step1" @if (old('job_position_step') == "step1") {{ 'selected' }} @endif>Step 1</option>
                                    <option value="step2" @if (old('job_position_step') == "step2") {{ 'selected' }} @endif>Step 2</option>
                                    <option value="step3" @if (old('job_position_step') == "step3") {{ 'selected' }} @endif>Step 3</option>                                   
                                    <option value="step4" @if (old('job_position_step') == "step4") {{ 'selected' }} @endif>Step 4</option>                                   
                                    <option value="step5" @if (old('job_position_step') == "step5") {{ 'selected' }} @endif>Step 5</option>                                   
                                    <option value="step6" @if (old('job_position_step') == "step6") {{ 'selected' }} @endif>Step 6</option>                                   
                                    <option value="step7" @if (old('job_position_step') == "step7") {{ 'selected' }} @endif>Step 7</option>                                   
                                    <option value="step8" @if (old('job_position_step') == "step8") {{ 'selected' }} @endif>Step 8</option>                                   
                                    <option value="step9" @if (old('job_position_step') == "step9") {{ 'selected' }} @endif>Step 9</option>                                   
                                    <option value="step10" @if (old('job_position_step') == "step10") {{ 'selected' }} @endif>Step 10</option>                                   
                                    </select>
                                      @if ($errors->has('job_position_step'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('job_position_step') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <select  class="form-control" name="reason" id="reason" >
                                    <option value="">-----Verify Reason -----
                                   </option>
                                   <option value="Marriage Based">Marriage Based</option>
                                    <option value="Re Assignment">Re Assignment</option>
                                    <option value="Promotion">Promotion</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date" required >                            
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
