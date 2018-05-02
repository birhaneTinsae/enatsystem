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
                <div class="panel-heading">SMS One Time Notification

                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   

                    
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a> -->


                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a> @endcan @can('create-sms')
                    <a href="/sms-password-notification/send-one-time" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">
                    <form action="/sms-password-notification/send-one-time" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone_no">Phone No</label>
                                    <input type="tel" name="phone_no" id="phone_no" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="msg">Message</label>
                                    <textarea name="msg" id="msg" cols="5" rows="3" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send" class="btn btn-success btn-block">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">

                            </div> --}}
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