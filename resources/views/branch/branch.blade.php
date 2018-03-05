@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Branch List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Branch</li>
            </ol>
         
           
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

                    
                    <a href="/branch/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Branch Code</th>
                            <th>Branch Name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($branches as $branch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$branch->branch_code}}</td>
                            <td>{{$branch->branch_name}}</td>
                            <td><a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#branchDetailModal" data-id="{{$branch->id}}"><i class="fa fa-info-circle"></i></a></td>
                            <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#branchUpdateModal" data-id="{{$branch->id}}"><i class="fa fa-edit"></i></a></td>
                           
                        </tr>
                        @endforeach
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
<!-- Detail View Modal -->
<div class="modal fade" id="branchDetailModal" tabindex="-1" role="dialog" aria-labelledby="branchDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="branchDetailModalLabel"><b>New message</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label for="branch_code">Branch Code</label>
                <input type="text" id="branch_code" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="branch_name">Branch Name</label>
                <input type="text" id="branch_name" class="form-control" readonly>
            </div>            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Detail View Modal end -->

<!-- Update View Modal -->
<div class="modal fade" id="branchUpdateModal" tabindex="-1" role="dialog" aria-labelledby="branchUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="branchUpdateModalLabel"><b>New message</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/branch" >
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="branch_code">Branch Code</label>
                <input type="text" id="branch_code" class="form-control" >
            </div>
            <div class="form-group">
                <label for="branch_name">Branch Name</label>
                <input type="text" id="branch_name" class="form-control" >
            </div>      
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Update</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Update View Modal end -->
@endsection
