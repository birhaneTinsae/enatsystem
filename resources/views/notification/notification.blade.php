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
            {{-- <div class="col-md-10"> --}}
                <form action="/sms-password-notification/filter" method="post" class="form-inline">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <input type="text" name="sender" id="sender" class="form-control" placeholder="Sender">
                    </div>
                    <div class="form-group">
                        <label for="from_date">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="form-date">
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="form-date">
                    </div>
                    {{-- <div class="form-group">
                        <label for="to_phone_no">Phone No</label>
                        <input type="tel" name="to_phone_no" id="to_phone_no" class="form-control" placeholder="form-date">
                    </div> --}}
                    <div class="form-group">
                        {{-- <label for="to_date">To Date</label> --}}
                        <input type="submit" value="Filter" class="btn btn-primary" >
                    </div>
                </form>
                <br>
            {{-- </div> --}}
            <sms-notification-list></sms-notification-list>
        </div>
    </div>
</div>
@endsection