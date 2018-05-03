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
                <div class="panel-heading">Add new employee
                    {{--  <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                     Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                     Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                     New</a>  --}}
                </div>

                <div class="panel-body">
                   

                    
                    <form method="POST" action="/hr">
                            {{ csrf_field() }}
                            <div class="row">
                            
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="employee">Employee name</label>                                        
                                        <input type="text" class="form-control" required id="new-employee"
                                         name="full_name" placeholder="Employee" value="{{ old('full_name') }}">   
                                             @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('full_name') }}</strong>
                                    </span>
                                    @endif                                                                                          
                                </div>

                            <div class="form-group">
                                    <label for="status">Gender</label>
                                    <select  class="form-control" name="gender" id="gender" >
                                    <option value="">----Select Gender----</option>
                                    <option value="M" @if (old('gender') == "M") {{ 'selected' }} @endif>Male</option>
                                    <option value="F" @if (old('gender') == "F") {{ 'selected' }} @endif>Female</option>
                                   
                                    </select>
                                             @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif  
                                </div>
                             
                         <div class="form-group">
                            <label for="employement_date">Employement Date</label>
                            <input type="date" class="form-control" 
                            id="employement_date" name="employement_date" value="{{ old('employement_date') }}" > 

                            @if ($errors->has('employement_date'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('employement_date') }}</strong>
                                    </span>
                                    @endif                                 
                        </div>

                              <div class="form-group">
                                    <label for="operation_location">Operation Location</label>
                                    <select  class="form-control" name="operation_location" id="operation_location" >
                                    <option value="">----Select operation_location----</option>
                                    <option value="Head_office" @if (old('operation_location') == "Head_office") {{ 'selected' }} @endif>Head_Office</option>
                                    <option value="City_Branch" @if (old('operation_location') == "City_Branch") {{ 'selected' }} @endif>City_Branch</option>
                                    <option value="Outline_Branch" @if (old('operation_location') == "Outline_Branch") {{ 'selected' }} @endif>Outline_Branch</option>                                                                       
                                    </select>
                                     @if ($errors->has('operation_location'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('operation_location') }}</strong>
                                    </span>
                                    @endif   
                                </div>

                         <div class="form-group">
                            <label for="Phone no">Phone no </label>
                            <input type="text" class="form-control" minlength="10" maxlength="10" 
                            pattern="\d*" id="Phone_no" name="Phone_no" required value="{{ old('Phone_no') }}"  >  
                            @if ($errors->has('Phone_no'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('Phone_no') }}</strong>
                                    </span>
                                    @endif                               
                        </div>

                        <div class="form-group">
                            <label for="email">email </label>
                            <input type="email" class="form-control" id="email" name="email" 
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{ old('email') }}">    

                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif                              
                        </div>
                         <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" class="form-control"
                                            name="city" id="city" value="{{ old('city') }}">
                                     @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif  
                        </div>

                           <div class="form-group">
                                            <label for="">Woreda/Kebele</label>
                                            <input type="text"  class="form-control" name="woreda/kebele" value="{{ old('woreda/kebele') }}">

                                            @if ($errors->has('woreda'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('woreda') }}</strong>
                                    </span>
                                    @endif 
                         </div>

                            <div class="form-group">
                            <label for="private_pension_no no">Private Pension no </label>
                            <input type="text" class="form-control" maxlength="10" 
                            pattern="\d*" id="private_pension_no" name="private_pension_no" value="{{ old('private_pension_no') }}"  >                                
                        @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('private_pension_no') }}</strong>
                                    </span>
                                @endif 
                        </div>

                            <div class="form-group">
                            <label for="gov_pension_no">Gov't Pension no </label>
                            <input type="text" class="form-control"  maxlength="10" 
                            pattern="\d*" id="govt_pension_no" name="govt_pension_no" value="{{ old('govt_pension_no') }}" >                                
                             @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('govt_pension_no') }}</strong>
                                    </span>
                                @endif       
                        </div>

                        
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="employee">Employee Id</label>                                        
                                        <input type="text"  pattern="[E][B][-][\d]{2,}" required class="form-control" id="enat_id" name="enat_id"
                                         placeholder="eg. EB-id_no" value="{{ old('enat_id') }}">       
                                           @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('enat_id') }}</strong>
                                    </span>
                                @endif                                                                                      
                                </div>
                                  <div class="form-group  {{ $errors->has('job_position') ? ' has-error' : '' }}">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_position_id" id="job_position_id" >
                                         <option value="">-----Select Job Position  -----
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
                                 <div class="form-group">
                                    <label for="job_position"> Branch</label>
                                   
                                    <select class="form-control" name="branch_id" id="branch_id">
                                     {{$branch=App\Branch::all()}}
                                    <option value="">-----Select Branch -----
                                   </option>
                                        @foreach($branch as $br)
                                        <option value="{{$br->id}}" @if (old('branch_id') == "$br->id") {{ 'selected' }} @endif>{{$br->branch_name}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('branch_id'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('branch_id') }}</strong>
                                    </span>
                                    @endif
                             </div>
                                 <div class="form-group">
                                    <label for="job_position_step">Job_Position_Step</label>
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
                                <div class="form-group">
                            <label for="join_date">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required value="{{ old('birth_date') }}" >                                
                          @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                    @endif
                        </div>
                                    <div class="form-group">
                                    <label for="category">Category</label>
                                    <select  class="form-control" name="category" id="category" >
                                    <option value="">----Select Category----</option>
                                    <option value="C" @if (old('category') == "C") {{ 'selected' }} @endif>C</option>
                                    <option value="M" @if (old('category') == "M") {{ 'selected' }} @endif>M</option>
                                    <option value="N.C" @if (old('category') == "N.C") {{ 'selected' }} @endif>NC</option>                                   
                                    </select>
                                      @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                     <div class="form-group">
                                    <label for="marital_status">Marital Status</label>
                                    <select  class="form-control" name="marital_status" id="marital_status" >
                                    <option value="">----Select Marital Status----</option>
                                    <option value="S"  @if (old('marital_status') == "S") {{ 'selected' }} @endif>Single</option>
                                    <option value="M"  @if (old('marital_status') == "M") {{ 'selected' }} @endif>Married</option>
                                    <option value="D"  @if (old('marital_status') == "D") {{ 'selected' }} @endif>Divorsed</option>
                                    <option value="W"  @if (old('marital_status') == "W") {{ 'selected' }} @endif>Widowed</option>
                                   
                                    </select>
                                      @if ($errors->has('marital_status'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                    <div class="form-group">
                                            <label for="">House No</label>
                                            <input type="text" class="form-control"
                                            name="houseno" id="houseno" value="{{ old('houseno') }}">
                                              @if ($errors->has('houseno'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('houseno') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                             <div class="form-group">
                            <label for="tin_no">Tin_no </label>
                            <input type="text" class="form-control" maxlength="10" 
                            pattern="\d*" id="tin_no" name="tin_no" value="{{ old('tin_no') }}"  >    
                              @if ($errors->has('tin_no'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('tin_no') }}</strong>
                                    </span>
                                    @endif                            
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
