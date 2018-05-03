@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            {{--  <li class="list-group-item"><a href="#" >Job List</a></li>
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
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HRM</a></li>               
                <li><a href="/job">Job</a></li>               
                <li class="active">Update Record</li>
            </ol>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="panel panel-default">
                <div class="panel-heading">Update Record
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
                   <form method="POST" action="/job/{{$job->id}}" >
                            {{ csrf_field() }}
                          @method('PUT')   
                         {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="job_position_name">Job Position Name</label>
                                    <input type="text" class="form-control" name="name" id="job_position_name" value="{{ $job->name }}" placeholder="eg. Senior System Admin">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                         
           <div class="form-group">
                            <label for="base">Base </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="base" name="base" required value="{{$job->base}}"  >  
                            @if ($errors->has('base'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('base') }}</strong>
                                    </span>
                                    @endif                               
                        </div>  
                        <div class="form-group">
                            <label for="Phone no">Step1 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step1" name="step1" required value="{{$job->step1}}"  >  
                            @if ($errors->has('step1'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step1') }}</strong>
                                    </span>
                                    @endif                               
                        </div>                       

                           <div class="form-group">
                            <label for="Phone no">Step3 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step3" name="step3" required value="{{$job->step3}}"  >  
                            @if ($errors->has('step3'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step3') }}</strong>
                                    </span>
                                    @endif                               
                        </div>

                           <div class="form-group">
                            <label for="Phone no">Step5 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step5" name="step5" required value="{{$job->step5}}"  >  
                            @if ($errors->has('step5'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step5') }}</strong>
                                    </span>
                                    @endif                               
                        </div>

                           <div class="form-group">
                            <label for="Phone no">Step7 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step7" name="step7" required value="{{$job->step7}}"  >  
                            @if ($errors->has('step7'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step7') }}</strong>
                                    </span>
                                    @endif                               
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step9 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step9" name="step9" required value="{{$job->step9}}"  >  
                            @if ($errors->has('step9'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step9') }}</strong>
                                    </span>
                                    @endif                               
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                                  <div class="form-group {{ $errors->has('grade') ? ' has-error' : '' }}">
                            <label for="grade">Grade</label>
                            <input type="text" required class="form-control" id="grade" name="grade" value="{{$job->grade}}" >
                                    @if ($errors->has('grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step2 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step2" name="step2" required value=" {{$job->step2}} "  >  
                            @if ($errors->has('step2'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step2') }}</strong>
                                    </span>
                                    @endif                               
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step4 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step4" name="step4" required value="{{$job->step4}}"  >  
                            @if ($errors->has('step4'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step4') }}</strong>
                                    </span>
                                    @endif                               
                        </div>
                            <div class="form-group">
                            <label for="Phone no">Step6 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step6" name="step6" required value="{{$job->step6}}"  >  
                            @if ($errors->has('step6'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step6') }}</strong>
                                    </span>
                                    @endif                               
                        </div>
                            <div class="form-group">
                            <label for="Phone no">Step8 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step8" name="step8" required value="{{$job->step8}}"  >  
                            @if ($errors->has('step8'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step8') }}</strong>
                                    </span>
                                    @endif                               
                        </div>
                           <div class="form-group">
                            <label for="Phone no">Step10 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step10" name="step10" required value="{{$job->step10}}"  >  
                            @if ($errors->has('step10'))
                                    <span class="help-block">
                                        <strong  class="text-danger">{{ $errors->first('step10') }}</strong>
                                    </span>
                                    @endif                               
                        </div>
                            </div>
                        </div>
                    
                       
                        <a href="/job" class="btn btn-danger btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>
                <div class="panel-footer">
                    {{--  <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
