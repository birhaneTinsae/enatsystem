@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="row">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif @can('view-sms')
        <div class="col-md-2">
            <div class="panel panel-default">

                <div class="panel-heading">Notification</div>
                <div class="panel-body">
                    <p class="panel-text">For any tasks that need any form of information transmittion</p>
                    <a href="sms-password-notification" class="btn btn-primary btn-block"><i class="far fa-bell"></i> Notification</a>
                </div>
            </div>
        </div>
        @endcan @can('view-vms')
        <div class="col-md-2">
            <div class="panel panel-default">

                <div class="panel-heading">Vehicle Managment</div>
                <div class="panel-body">
                    <p class="panel-text">With supporting text below as a natural lead-in to additional</p>
                    <br>
                    <a href="#" class="btn btn-primary btn-block"><i class="fas fa-bus"></i> VMS</a>
                </div>
            </div>
        </div>
        @endcan @can('view-fcy')
        <div class="col-md-2">
            <div class="panel panel-default">

                <div class="panel-heading">Foreign Currency</div>
                <div class="panel-body">
                    <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="fcy" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign"></i> FCY</a>
                </div>
            </div>
        </div>
        @endcan @can('view-fam')
        <div class="col-md-2">
            <div class="panel panel-default">

                <div class="panel-heading">Fixed Asset</div>
                <div class="panel-body">
                    <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="fixed-asset" class="btn btn-primary btn-block">Fixed Asset</a>
                </div>
            </div>
        </div>
        @endcan @can('view-hr')
        <div class="col-md-2">
            <div class="panel panel-default">

                <div class="panel-heading">Human Resource</div>
                <div class="panel-body">
                    <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="hr" class="btn btn-primary btn-block"><i class="fas fa-female"></i> HR</a>
                </div>
            </div>
        </div>
        @endcan

    </div>
    <!-- <div class="row">
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="sms-password-notification" class="btn btn-primary">Notification</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">VMS</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">FCY</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Fixed Asset</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">HR</a>
                </div>
            </div>
        </div>
       
    </div> -->
</div>
@endsection