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
           {{--  <ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>
            --}}
            <div class="panel panel-default">
                <div class="panel-heading">Update

                <a href="/maintainance-info" class="text-right pull-right panel-menu-item"><i class="fas fa-list"></i>
                        List</a> 

                    <a href="/maintainance-info/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 

                </div>

                <div class="panel-body">

                <form action="/maintainance-info/{{$maintainanceInfo->id}}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                                <option value="{{$maintainanceInfo->branch->id}}">{{$maintainanceInfo->branch->name}}</option>
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--<div class="form-group">
                            <label for="received_at">Received Date</label>
                            <input type="date" class="form-control" name="received_at" id="received_at" value="{{$maintainanceInfo->received_at}}">
                        </div>--}}
                        <div class="form-group">
                            <label for="item">Item</label>
                            <select name="item" id="item" class="form-control">
                            <option value="{{$maintainanceInfo->item}}">{{$maintainanceInfo->item}}</option>
                                <option value="su">System Unit</option>
                                <option value="router">Router</option>
                                <option value="laptop">Laptop</option>
                                <option value="printer">Printer</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="problem_type">Problem Type</label>
                                <select name="problem_type" id="problem_type" class="form-control">
                                <option value="{{$maintainanceInfo->problem_type}}">{{$maintainanceInfo->problem_type}}</option>
                                    <option value="Operating System">Operating System</option>
                                    <option value="Hard Disk">Hard Disk</option>
                                    <option value="Power Supply">Power Supply</option>
                                    <option value="memory">Memory</option>
                                    <option value="MotherBoard">MotherBoard</option>
                                    <option value="CIMOS Battery">CIMOS Battery</option>
                                    <option value="other">OTHER</option>

                                </select>
                            </div>
                       
                        <div class="form-group">
                            <label for="action">Action</label>
                            <select name="action" id="action" class="form-control">
                            <option value="{{$maintainanceInfo->action}}">{{$maintainanceInfo->action}}</option>
                                <option value="repair">Repair</option>
                                <option value="reinstallation">ReInstallation</option>
                                <option value="replacement">Replacement</option>
                                <option value="other">Other</option>
                            </select>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{--<div class="form-group">
                            <label for="final_date">Final Date</label>
                            <input type="date" class="form-control" name="final_date" id="final_date" value="{{$maintainanceInfo->completion_date}}">
                        </div>--}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                            <option value="{{$maintainanceInfo->status}}">{{$maintainanceInfo->status}}</option>
                               
                            <option value="received">Received</option>
                                    <option value="assigned">Assigned</option>
                                    <option value="inprogress">Inprogress</option>
                                    <option value="escalated">Escalated</option>
                                    <option value="outsourced">Outsourced</option>                                    
                                    <option value="completed">Complete</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="assigned_to">Assign To</label>
                            <select name="assigned_to" id="assigned_to" class="form-control">
                            <option value="{{$maintainanceInfo->assigned_to}}">{{$maintainanceInfo->assigned_to}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->username}}">{{$user->username}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                            <textarea name="remark" id="remark" cols="30" rows="5" class="form-control">{{$maintainanceInfo->remarks}}</textarea>
                        </div>
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                 </div>
                   
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