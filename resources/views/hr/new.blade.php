@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    {{--
    <li class="list-group-item"><a href="#">Request List</a></li>
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
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>
                <li><a href="/hr">HRM</a></li>
                <li class="active">New Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee {{-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                     Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                     Delete</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                     New</a> --}}
                </div>

                <div class="panel-body">



                    <form method="POST" action="/hr">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('new_employee') ? ' has-error' : '' }}">
                                    <label for="new_employee">Full name</label>
                                    <input type="text" class="form-control" id="new_employee" name="new_employee" placeholder="Employee">

                                    <!-- <datalist id="employees-list"> </datalist> -->
                                    @if ($errors->has('new_employee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_employee') }}</strong>
                                    </span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('join_date') ? ' has-error' : '' }}">
                                    <label for="join_date">Join Date</label>
                                    <input type="date" class="form-control" id="join_date" name="join_date"> @if ($errors->has('join_date'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('join_date') }}</strong>
                                                </span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('salary') ? ' has-error' : '' }}">
                                    <label for="salary">Salary</label>
                                    <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary">                                    @if ($errors->has('salary'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('salary') }}</strong>
                                                </span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span> @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  {{ $errors->has('job_position') ? ' has-error' : '' }}">
                                    <label for="job_position">Job Position</label>

                                    <select class="form-control" name="job_position" id="job_position">
                                        @foreach($job_positions as $id=>$job_position)
                                        <option value="{{$id}}">{{$job_position}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('job_position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_position') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                  <div class="form-group  {{ $errors->has('branch') ? ' has-error' : '' }}">
                                    <label for="branch">Branch</label>
                                    
                                    <select class="form-control" name="branch" id="branch" >
                                        @foreach($branches as $id=>$branch)
                                        <option value="{{$id}}">{{$branch}}</option>
                                        @endforeach
                                    <select>
                                    @if ($errors->has('branch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                 
                                  <div class="form-group">
                                    <label for="">Sex</label>
                                    <div class="radio">
                                        <label><input type="radio" name="sex" value="F">Female</label>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="sex" value="M">Male</label>
                                    </div>
                                  </div>


                                <div class="form-group"> 
                                        <label for="phone_no">Phone No</label>
                                        <input type="tel" name="phone_no" id="phone_no" class="form-control" placeholder="Phone No">
                                </div>
                                <div class="form-group"> 
                                        <label for="enat_id">Enat Id</label>
                                        <input type="tel" name="enat_id" id="enat_id" class="form-control" placeholder="Enat Id">
                                </div>
                                </div>
                            </div>
                       
                      
                        <a  class="btn btn-sm text-center" role="button" data-parent="#selector" data-toggle="collapse" data-target="#collapseAddress"><span class="badge badge-light">Address</span></a>
                        <br>
                        <div class="collapse" id="collapseAddress">
                            <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Sub City</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">Woreda</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Kebele</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">House No</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
                            </div>
                               
                               
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                   
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection