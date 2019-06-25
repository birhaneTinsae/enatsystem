@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    {{--
    <li class="list-group-item"><a href="#">Role List</a></li>
    <li class="list-group-item"><a href="#">ISD</a></li>
    <li class="list-group-item"><a href="#">ISD</a></li>
    <li class="list-group-item"><a href="#">ISD</a></li> --}}
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
                <div class="panel-heading">Role

                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>

                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td><a href="http://" class="btn-primary btn-sm"><i class="fas fa-info-circle"></i></a></td>
                                <td><a class="btn-warning btn-sm" href="/user/{{$user->id}}/edit"><i class="fa fa-edit"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$users->links()}}
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