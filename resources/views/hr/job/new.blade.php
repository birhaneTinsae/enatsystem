@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Job List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">New Job Position</li>
            </ol>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="panel panel-default">
                <div class="panel-heading">New Job Position
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                        Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                       Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                </div>

                <div class="panel-body">
                <form action="/job" method="POST">    
                         {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="job_position_name">Job Position Name</label>
                                    <input type="text" class="form-control" name="name" id="job_position_name" value="{{ old('name') }}" placeholder="eg. Senior System Admin">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('operation_class') ? ' has-error' : '' }}">
                                    <label for="job_position_operation_class">Operation Location</label>
                                    <select  class="form-control" name="operation_class" id="job_position_operation_class" >
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
                            <div class="col-md-6"></div>
                        </div>
                    
                       
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
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
