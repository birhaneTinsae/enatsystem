@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    <li class="list-group-item"><a href="#">List</a></li>
    <li class="list-group-item"><a href="#">SMS</a></li>
    <li class="list-group-item"><a href="#">Email</a></li>
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
                <li><a href="/sms-password-notification">Notification</a></li>
                <li class="active">New Message Templete</li>
            </ol>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification @can('close-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a> @endcan @can('update-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a> @endcan @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan


                    <a href="/msg-templete/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>


                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Msg Templete</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($msg_templetes as $msg_templete)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$msg_templete->name}}</td>
                            <td><a href="/msg-templete/{{$msg_templete->id}}/edit" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#" data-id="{{$msg_templete->id}}"><i class="fa fa-info-circle"></i></a></td>
                            <td><a href="/msg-templete/{{$msg_templete->id}}/edit" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#" data-id="{{$msg_templete->id}}"><i class="fa fa-edit"></i></a></td>

                        </tr>
                        @endforeach
                    </table>


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