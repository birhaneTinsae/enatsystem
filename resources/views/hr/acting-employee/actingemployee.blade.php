@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <!-- <li class="list-group-item"><a href="hr" >Employee List</a></li>
                             <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            <li class="list-group-item"><a href="role" >Role</a></li> -->
                        </ul>
@endsection

@section('content')

<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>         
                <li><a href="/hr">HR</a></li>                     
                <li class="active">ActingEmployee</li>
            </ol>
       <form action="searchactingemployee" method="get">
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
                 <div class="panel-heading">Acting Employee Lists
                    @can('close-role')                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    @endcan

                    @can('update-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    @endcan

                    @can('delete')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                    @can('create', App\ActingEmployee::class)
                    <a href="actingemployee/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    @endcan                                   
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
                    @if($Result->isNotEmpty())
                    <table class="table table-striped">
                        <thead >
                            <tr>                                                           
                                <th>Full name</th>
                                <th>From Job Position</th>
                                <th>To Job Position</th>
                                <!-- <th>From Branch</th>
                                <th>To Branch</th> -->
                                <!-- <th>Salary</th>    -->
                                <th>Detail</th>                             
                                <!-- <th>Date</th>
                                <th>Reason</th>                                                                  
                                <th> Remark</th>                                                                                            -->
                                <th>Edit</th>
                                <th>Close</th> 
                            </tr>
                        </thead>
                        <tbody>
                         @php
                            $j =0
                         @endphp  
                            @foreach($Result as  $employee)                                    
                            <tr>                                
                                <td>{{$employee->Employee->User->name}}</td>                                                                                    
                                 @for ($i = $j; $i <=$j; $i++)                                                                        
                                <td>{{$FromJob[$j]}}</td>                                                                                                                     
                                @endfor                                                                                                                                                 
                            
                                  @for ($i = $j; $i <=$j; $i++) 
                                <td>{{$ToJob[$i]}}</td> 
                                @endfor
                                 <!-- @for ($i = $j; $i <=$j; $i++)                                                                                                                                                                                             
                                <td>{{$FromBranch[$i]}}</td>
                                  @endfor                                 
                                  @for ($i = $j; $i <=$j; $i++) 
                                <td>{{$ToBranch[$i]}}</td>   
                                 @endfor                                                                                                                                                                                 -->
                                <!-- <td>{{$employee->new_salary}}</td>                                -->
                                <!-- <td>{{$employee->date}}</td>
                                <td>{{$employee->reason}}</td>
                                <td>{{$employee->remark}}</td>                                                                                             -->
                                
                                <td>
                                 <a href="{{ route('actingemployee.show', $employee->id) }}" class="btn-success btn-sm">
                                 <i class="fa fa-info-circle"></i> </a>
                                 </td>
                                @can('update',App\ActingEmployee::class)
                                <td>                                
                                <a href="{{ route('actingemployee.edit', $employee->id) }}" class="btn-warning btn-sm" >
                                <i class="fa fa-edit"></i></a></td>
                                @endcan  
                                 @can('delete',App\ActingEmployee::class)
                                  <td>
                                  	<form action="/actingemployee/{{ $employee->id}}" method="POST">
                    {{ method_field ('DELETE')}}
                        {{ csrf_field() }}		
                                 <button class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>		                                                    			
		</form>
                                  </td>  
                                  @endcan
                               
		
	
		

                            </tr>   
                                  @php
                            $j =$j+1
                            
                         @endphp    

                            @endforeach                                                                                
                        </tbody>
                    </table>
                      {{$Result->links()}}
 
                  @else
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4"> Record Empty</h1>
                      <p class="lead">No Records yet.</p>
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

                                        
<div class="modal modal-danger fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('actingemployee.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="rowid" id="rowid" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
