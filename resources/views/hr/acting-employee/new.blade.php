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
                <li class="active">New Acting Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new Acting employee                  
                </div>
                <div class="panel-body">                                  
                    <form method="POST" action="/actingemployee">
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

                                                <div class="form-group">
                                    <label for="employee"> Replaced by</label>
                                   
                                    <select class="form-control" name="replaced_by" id="replaced_by">
                                     {{$employee=App\Employee::all()}}
                                    <option value="">-----Select Employee -----
                                   </option>
                                        @foreach($employee as $emp)
                                        <option value="{{$emp->id}}">{{$emp->full_name}}</option>
                                        @endforeach
                                    <select>
                                           @if ($errors->has('replaced_by'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('replaced_by') }}</strong>
                                    </span>
                                    @endif
                             </div>    
                             <div class="form-group">
                                    <label for="acting_branch_id">Acting Branch</label>
                                   
                                    <select class="form-control" name="acting_branch_id" id="acting_branch_id">
                                     {{$branch=App\Branch::all()}}
                                    <option value="">-----Select Branch -----
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->id}}">{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
                                      @if ($errors->has('acting_branch_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('acting_branch_id') }}</strong>
                                    </span>
                                    @endif
                             </div>                             
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date" required  >                            
                        </div> 
         <div class="form-group">                    
           <label> Is End date known ?  </label>          
            Yes
        <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>
        </span>
        <span>
        No
        <input type="radio" onclick="javascript:yesnoCheck();" checked name="yesno" id="noCheck"/>
        </span>
        </div>
        <div class="form-group" id="ifYes" style="display:none">If yes, Fill:
            <label for="end_date">End Date</label>
            <input type="date" class="form-control col-xs-3" id="end_date" name="end_date" >
        </div>
         </div>

         
                                <div class="col-md-6">
                                                     <div class="form-group">
                                    <label for="in_place_of_employee"> In Place of Employee</label>
                                   
                                    <select class="form-control" name="in_place_of_employee" id="in_place_of_employee">
                                     {{$employee=App\Employee::all()}}
                                    <option value="">-----Select Employee -----
                                   </option>
                                        @foreach($employee as $emp)
                                        <option value="{{$emp->id}}">{{$emp->full_name}}</option>
                                        @endforeach
                                    <select>
                                           @if ($errors->has('in_place_of_employee'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('in_place_of_employee') }}</strong>
                                    </span>
                                    @endif
                             </div>    
                                  <div class="form-group">
                                    <label for="job_position">Acting Position</label>
                                    
                                    <select class="form-control" name="acting_job_id" id="acting_job_id" >
                                    <option value="">-----Select Job Position -----</option>
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}">{{$job_position}}</option>
                                        @endforeach
                                    <select>
                                     @if ($errors->has('acting_job_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('acting_job_id') }}</strong>
                                    </span>
                                    @endif
                             </div>                                                                                                
                                                       
                                 <div class="form-group">
                                    <label for="status">Status</label>
                                    <select  class="form-control" name="status" id="status" >
                                    <option value="">----Select Status----</option>
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>                                   
                                    </select>
                                     @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
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
