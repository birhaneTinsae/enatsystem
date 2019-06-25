@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
<li class="list-group-item disabled">Menu</li>

<li class="list-group-item"><a href="/fourG-threeG-maintainance">3G4G</a></li>
<li class="list-group-item"><a href="/tt-maintainance">TT</a></li>
<li class="list-group-item"><a href="/domain-name/">Domain</a></li>
<li class="list-group-item"><a href="/maintainance-info/">Maintainance</a></li> 
<li class="list-group-item"><a href="/network-info">Network</a></li> 
</ul>
@endsection
 
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 ">
        {{-- <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">Role

                    <a href="/maintainance-info/{{$maintainanceInfo->id}}/edit" class="text-right pull-right panel-menu-item"><i class="far fa-edit"></i>
                    Edit</a>

                    <a href="/maintainance-info/{{$maintainanceInfo->id}}/delete" class="text-right pull-right panel-menu-item"><i class="far fa-trash-alt"></i>
                    Delete</a> 
                    <a href="/maintainance-info/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 
                    @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">

                <form action="/maintainance-info" method="post">
                 @csrf
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" readonly>
                                <option value="{{$maintainanceInfo->branch->id}}">{{$maintainanceInfo->branch->name}}</option>
                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="received_at">Received Date</label>
                            <input type="date" class="form-control" name="received_at" id="received_at" value="{{$maintainanceInfo->received_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" class="form-control" name="item" id="item" value="{{$maintainanceInfo->item}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="problem_type">Problem Type</label>
                            <input type="text" name="problem_type" id="" class="form-control" value="{{$maintainanceInfo->problem_type}}" readonly/>
                            
                        </div>
                        <div class="form-group">
                            <label for="action">Action</label>
                            <input type="text" class="form-control" name="action" id="action" value="{{$maintainanceInfo->action}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="final_date">Final Date</label>
                            <input type="date" class="form-control" name="final_date" id="final_date" value="{{$maintainanceInfo->completion_date}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" readonly>
                                <option value="complete">COMPLETE</option>
                                <option value="in_progress">IN PROGRESS</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                            <textarea name="remark" id="remark" cols="30" rows="5" class="form-control" readonly>{{$maintainanceInfo->remarks}}</textarea>
                        </div>
                        <form action="/maintainance-info/{{$maintainanceInfo->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Deleted" class="btn btn-sm btn-danger">                        
                        </form>
                    </div>
                 </div>
                
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