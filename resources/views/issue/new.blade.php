@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    {{--
    <li class="list-group-item"><a href="#">Job List</a></li>
    <li class="list-group-item"><a href="#">Leave</a></li>
    <li class="list-group-item"><a href="#">ISD</a></li>
    <li class="list-group-item"><a href="#">Home</a></li> --}}
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
                <li class="active">New Job Position</li>
            </ol>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">New Issue {{-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                        Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                       Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a> --}}
                </div>

                <div class="panel-body">
                    <form action="/issue" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee">Employee</label>
                                    <select name="employee" id="employee" class="form-control">
                                    @foreach($employees as $id=>$employee)
                                    <option value="{{$id}}">{{$employee}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="from_date">From Date</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="to_date">To Date</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="request_system">Request System</label>
                                    <select name="request_system" id="request_system" class="form-control">
                                                
                                                @foreach($systems as $system)
                                            <option value="{{$system->id}}">{{$system->name}}</option>
                                               @endforeach
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="request_type">Request Type</label>
                                    <select name="request_type" id="request_type" class="form-control">
                                                
                                                <option value="transfer">Transfer</option>
                                                <option value="temporary_assignment">Temporary Assignment</option>
                                                <option value="promotion">Promotion</option>
                                                <option value="password_reset">Password Reset</option>
                                                <option value="user_unlock">User Unlock</option>
                                                <option value="new_user">New User</option>
                                               
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <textarea name="reason" id="reason" cols="5" rows="3" class="form-control">
                                    </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    {{--
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection