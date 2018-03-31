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
                              <div class="form-group {{ $errors->has('grade') ? ' has-error' : '' }}">
                            <label for="grade">Grade</label>
                            <input type="text" required class="form-control" id="grade" name="grade" value="{{$job->grade}}" >
                                    @if ($errors->has('grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                        </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('operation_class') ? ' has-error' : '' }}">
                                    <label for="job_position_operation_class">Operation Location</label>
                                    <select  class="form-control" name="operation_class" id="job_position_operation_class" >
                                    <option value="{{$job->operation_class}}">{{$job->operation_class}}</option>
                                    <option value="Head office">Head office</option>
                                    <option value="Branch">Branch</option>
                                    <option value="Both">Both</option>
                                    </select>
                                    @if ($errors->has('operation_class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('operation_class') }}</strong>
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
