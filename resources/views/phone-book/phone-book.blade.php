@extends('layouts.app')

@section('sidebar')
                        <!-- <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >List</a></li>
                            <li class="list-group-item"><a href="#" >SMS</a></li>
                            <li class="list-group-item"><a href="#" >Email</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                        </ul> -->
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <!-- <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Notification</li>
            </ol> -->
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Phone Book</li>
            </ol>
            <form action="">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="query" name="query" placeholder="Search Employee" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon"><i class="fa fa-search"></i></span>
                </div>
                </div>
            </form>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Employee List
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

                    @can('create-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    @endcan
                
                </div>

                <div class="panel-body">
                  <table class="table table-striped" id="search-result">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Employee Name</th>
                             <th>Branch</th>
                             <th>Phone No</th>
                            
                         </tr>
                     </thead>
                     <tbody>
                     @foreach($users as $user)
                         <tr>
                             <td>{{$counter++}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->branch->branch_name}}</td>
                             <td>{{$user->phone_no}}</td>
                         </tr>
                    @endforeach
                     </tbody>
                  
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
