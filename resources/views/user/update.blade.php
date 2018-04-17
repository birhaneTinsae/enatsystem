@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            {{--  <li class="list-group-item"><a href="#" >Role List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>  --}}
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
   
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HR</a></li>               
                <li class="active">Role</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">User 

                     <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> -->

                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    @endcan
                
                </div>

                <div class="panel-body">
                    <form action="/user/{{$user->id}}" method="POST">
                    @method('PUT')
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_no">Phone No</label>
                                    <input type="tel" name="phone_no" id="phone_no" class="form-control" value="{{$user->phone_no}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        <option value="{{$user->branch->id}}">{{$user->branch->branch_name}}</option>
                                        @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                </div>
                            </div>
                        </div>
                    </form>

                  
                </div>
                <div class="panel-footer">
                <!-- <div class="row">
                <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
