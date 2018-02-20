@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Role List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
   
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Role</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Role 

                    @can('close-role')                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    @endcan

                    @can('update-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    @endcan

                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create',App\Role::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    @endcan
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$role->name}}</td>
                                <td><a class="btn-success btn-sm" data-toggle="modal" data-target="#roleDetailModal" data-id="{{$role->id}}"><i class="fa fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" data-toggle="modal" data-target="#roleUpdateModal" data-id="{{$role->id}}"><i class="fa fa-edit"></i></a></td>
                               
                            </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
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