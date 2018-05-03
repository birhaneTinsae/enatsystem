@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="" >Employee List</a></li>
                            <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="transferpromotionrequest" >Employee Transfer/Position Change Request</a></li>
                            <li class="list-group-item"><a href="transfer" >Employee Transfer/Promotion </a></li>                        
                            {{--  <li class="list-group-item"><a href="#" >Leave</a></li>  --}}
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                             
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            @can('view',App\Role::class)
                            <li class="list-group-item"><a href="role" >Role</a></li>
                            @endcan
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">HR</li>
            </ol>
               <form action="searchemployee" method="get">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="queryemp" name="queryemp" placeholder="Search Employee" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon">
                    <button type="submit" class="fa fa-search">  </button>                  
                    </span>
                </div>
                </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Human Resource
                  
                   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a>

                    @can('delete')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create', App\Employee::class)
                    <a href="hr/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    @endcan
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($employees->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->full_name}}</td>
                                <td>{{$employee->email}}</td>
                              
                                <td>
                                <a href="/hr/detail/{{$employee->id}}" class="btn-success btn-sm">
                                 <i class="fa fa-info-circle"></i> </a>                                 
                                </td>
                                @can('update',App\Employee::class)
                                <td>
                               <a href="{{ route('hr.edit', $employee->id) }}" class="btn-warning btn-sm" >
                                <i class="fa fa-edit"></i></a></td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{ $employees->links() }}
                    @else
                    <div class="jumbotron ">
                        <div class="container">
                          <h1 class="display-4">Employee Empty</h1>
                          <p class="lead">No Employee yet.</p>
                        </div>
                      </div>
                    @endif
                </div>
                <div class="panel-footer">
                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
