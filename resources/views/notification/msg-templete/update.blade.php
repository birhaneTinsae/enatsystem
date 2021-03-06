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
                <li><a href="home">Home</a></li>
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
                        Delete</a> @endcan


                    <a href="/msg-templete/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>


                </div>

                <div class="panel-body">
                    <form action="/msg-templete/{{$msg_templete->id}}" method="POST">
                        {{ csrf_field() }} @method('PUT')
                        <div class="form-group">
                            <label for="msg-templete-name">Message Templete Name</label>
                            <input type="text" class="form-control" name="msg_templete_name" id="msg-templete-name" value="{{$msg_templete->name}}">
                        </div>
                        <div class="form-group">
                            <label for="msg-content">Message Content</label>
                            <textarea type="text" class="form-control" name="msg_content" id="msg-content" rows="3">{{$msg_templete->templete}}
                            
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-md">Update</button>
                        <a href="/msg-templete" class="btn btn-warning"> Cancel</a>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                  <button type="submit" class="btn btn-success btn-md">Update</button>
                            </div>
                            <div class="col-md-6">
                                  <a href="/msg-templete" class="btn btn-warning"> Cancel</a>
                            </div>
                        </div> -->


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