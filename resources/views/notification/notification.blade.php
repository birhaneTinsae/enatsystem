@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >List</a></li>
                            <li class="list-group-item"><a href="#" >SMS</a></li>
                            <li class="list-group-item"><a href="#" >Email</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>               
                <li class="active">Notification</li>
            </ol>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification
                                  
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   

                    
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> -->
                   

                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create-sms')
                    <a href="/sms-password-notification/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    @endcan
                
                </div>

                <div class="panel-body">
                  @if($notifications->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                       
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Sender</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{str_limit($notification->message,30)}}</td>
                                <td>{{$notification->sender}}</td>
                                <td>{{$notification->created_at->toDayDateTimeString()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                  @else
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4">Notification Empty</h1>
                      <p class="lead">No Notification yet.</p>
                    </div>
                  </div>
                @endif
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
