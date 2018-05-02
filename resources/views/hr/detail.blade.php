@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    <li class="list-group-item"><a href="#">Request List</a></li>
    <li class="list-group-item"><a href="#">Leave</a></li>
    <li class="list-group-item"><a href="#">ISD</a></li>
    <li class="list-group-item"><a href="home">Home</a></li>
</ul>
@endsection
 
@section('content')
<div class="container">
    <div class="row">
        <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>
                <li class="active">FCY</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Foreign Currency Request
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                        Close</a>
                    <a href="/hr/{{$employee->id}}/edit" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="new_employee">Employee</label>
                                <input type="text" class="form-control" value="{{$employee->name}}" id="new_employee" name="new_employee" placeholder="Employee"
                                    readonly>



                            </div>
                            <div class="form-group ">
                                <label for="join_date">Join Date</label>
                                <input type="date" class="form-control" id="join_date" name="join_date" value="{{$employee->employed_date}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary" value="{{$employee->salary}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{$employee->email}}" readonly>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="job_position">Job Position</label>

                                <input type="text" name="" id="" class="form-control" value="{{$employee->job_position->name}}" readonly>
                            </div>
                            <div class="form-group  ">
                                <label for="branch">Branch</label>

                                <input type="text" name="" id="" class="form-control" value="{{$employee->branch->name}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="">Sex</label>
                                <div class="radio">
                                    @if($employee->sex=='F')
                                    <label><input type="radio" name="sex" value="F" checked disabled>Female</label> @else
                                    <label><input type="radio" name="sex" value="F" disabled>Female</label> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    @if($employee->sex=='M')
                                    <label><input type="radio" name="sex" value="M" checked disabled>Male</label> @else
                                    <label><input type="radio" name="sex" value="M" disabled >Male</label> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone No</label>
                                <input type="tel" name="phone_no" id="phone_no" class="form-control" placeholder="Phone No" value="{{$employee->phone_no}}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="enat_id">Enat Id</label>
                                <input type="tel" name="enat_id" id="enat_id" class="form-control" placeholder="Enat Id" value="{{$employee->enat_id}}" readonly>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-sm text-center" role="button" data-parent="#selector" data-toggle="collapse" data-target="#collapseAddress"><span class="badge badge-light">Address</span></a>
                    <br>
                    <div class="collapse" id="collapseAddress">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sub City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Woreda</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kebele</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">House No</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
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