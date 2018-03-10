@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            {{--  <li class="list-group-item"><a href="#" >Branch List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>  --}}
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HRM</a></li>               
                <li><a href="/branch">Branch</a></li>               
                <li class="active">New Branch</li>
            </ol>
            @if(session('success')!=null)
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Branch
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

                   
                    {{--  <a href="/branch/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                     --}}
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/branch">
                     {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                           
                            <div class="form-group">
                                <label for="branch_code">Branch Code</label>
                                <input type="text" class="form-control" id="branch_code" name="branch_code"  placeholder="Branch code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_name">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name"  placeholder="Branch name">
                            </div>
                        </div>
                    </div>
                    
                       
                        

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="panel-footer">
                    {{--  <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
