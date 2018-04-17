@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="/fixed-asset" >PPE</a></li>
                            <li class="list-group-item"><a href="/asset-category" >Asset Item</a></li>
                            <li class="list-group-item"><a href="/asset" >Asset </a></li>
                            <li class="list-group-item"><a href="#" >Additional Cost</a></li>
                            <li class="list-group-item"><a href="/dispose" >Disposed Assets</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">FAM</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Property Plant and Equipment Managment
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                         Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                         Delete</a> -->
                    <a href="/fixed-asset/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                         New</a>
                </div>

                <div class="panel-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>
                    @endif
                    @if (session('delete_status'))
                        <div class="alert alert-danger">
                            {{ session('delete_status') }}
                        </div>
                    @endif  
                @if($ppes->isNotEmpty())
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PPE Type</th>
                            <th>Useful Life</th>
                            <th>Residual Value</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ppes as $ppe)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ppe->p_p_e_type}}</td>
                            <td>{{$ppe->useful_life}}</td>
                            <td>{{$ppe->residual_value}}</td>
                            <td><a href="/fixed-asset/{{$ppe->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    @else
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4">PPE Empty</h1>
                      <p class="lead">No PPE yet.</p>
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
