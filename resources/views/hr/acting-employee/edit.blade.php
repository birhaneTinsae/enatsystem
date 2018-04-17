@extends('layouts.app')
<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    } else {
        document.getElementById('ifYes').style.display = 'none';
    }
}

</script>
@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <!-- <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="" >Home</a></li> -->
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
                <li><a href="/actingemployee">Home</a></li>               
                <li><a href="/actingemployee">Acting Employee</a></li>               
                <li class="active"> Acting Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Update Records                  
                </div>
                <div class="panel-body">                                  
                 <form method="POST" action="/actingemployee/{{ $ActingEmployee->id }}">
                         {{ method_field ('PUT')}}
                        {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control"  list="actemployees-list"
                                         id="new-employee" name="new_employee" id="{{$ActingEmployee->employee_id}}" placeholder="Employee" value={{$ActingEmployee->employee_id}}>                            
                                    <datalist id="actemployees-list"> </datalist>
                                    <input type="hidden" name="emp_id" value="{{$ActingEmployee->employee_id}}">
                                </div>                                
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" value="{{$ActingEmployee->start_date}}" class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div>   
                          @if($ActingEmployee->notification==0)                  
                 <label> Is End date known ?  </label>          
                  Yes
                <input type="radio" checked name="yesno" value="Yes" id="yesCheck"/>                
                 </span>

                 <span>
                 No
        <input type="radio" value="No"  name="yesno" id="noCheck"/>
        </span>
                   @else
                      Yes
                <input type="radio" value="Yes" name="yesno" id="yesCheck"/>                
                 </span>
                        <span>
                 No
        <input type="radio" value="No" checked name="yesno" id="noCheck"/>
        </span>
                @endif
        
        <div>
            <label for="end_date">End Date</label>
            <input type="date" value="{{$ActingEmployee->end_date}}" class="form-control col-xs-3" id="end_date" name="end_date"  >
        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="job_position">Acting Position</label>                                    
                                    <select class="form-control" name="acting_job_id" id="job_id" >
                                    {{$job_positions=App\Jobposition::all()}}
                                    <option value="{{$ActingEmployee->acting_job_position_id}}">{{$to_job}}
                                        @foreach($job_positions as $job_position)
                                        <option value="{{$job_position->id}}">{{$job_position->name}}</option>
                                        @endforeach
                                    <select>
                             </div
                              
                                
                                       <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="job_position">Acting For Branch/Department</label>                                   
                                    <select class="form-control" name="acting_branch_id" id="branch_name">
                                     {{$branch=App\Branch::all()}}
                                    <option value="{{$ActingEmployee->acting_branch_id}}">{{$to_branch}}
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
                                     @if($ActingEmployee->status==1)                                      
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>
                                      @else
                                    <option value="0">Terminated</option>
                                    <option value="1">Active</option>
                                    @endif
                                    </select>
                                </div>
                                </div>
                                  <div class="col-md-6">
                            <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark" value="{{$ActingEmployee->remark}}">Remark</textarea>                            
                        </div> 
                       </div>
                       
                            </div>                                                                  
                      <a href="/actingemployee" class="btn btn-danger btn-sm">Cancel</a>
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
