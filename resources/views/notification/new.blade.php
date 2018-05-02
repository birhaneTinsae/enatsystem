@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    <li class="list-group-item"><a href="/sms-password-notification">List</a></li>
    <li class="list-group-item"><a href="/sms-password-notification/create">SMS</a></li>
    <li class="list-group-item"><a href="/sms-password-notification/send-one-time">One Time SMS</a></li>
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
                <li class="active">Notification</li>
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
                        Delete</a> @endcan @can('create-sms')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">


                    <form action="/sms-password-notification/send" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                    <select id="branch" class="form-control" name="branch">
                                @foreach($branches as $id=>$branch)
                                <option value="{{$id}}">{{$branch}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee">Employee</label>
                                    <select id="employee" class="form-control" name="employee">
                                    <option value=""></option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone-no">Phone Number</label>
                                    <input type="text" class="form-control" id="phone-no" name="phone_no" placeholder="0911******" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="notification-new-password">New Password</label>
                                <div class="input-group">
                                    <!--  -->
                                    <input type="text" class="form-control" id="notification-new-password" name="password" placeholder="password">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="password_generate">
                                    <i class="fa fa-cogs"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="msg-templete">Message Templete</label>
                            <select name="msg-templete" class="form-control" id="msg-templete">
                            <option value="">--Select Templete--</option>
                            @foreach($msg_templetes as $id=>$msg_templete)
                            <option value="{{$id}}">{{$msg_templete}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="msg">Message</label>
                            <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-md">Send</button>
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