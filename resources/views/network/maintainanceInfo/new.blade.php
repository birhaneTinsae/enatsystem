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
                <div class="panel-heading">Maintainance

                <a href="/maintainance-info" class="text-right pull-right panel-menu-item"><i class="fas fa-list"></i>
                        List</a> 

                </div>

                <div class="panel-body">

                <form action="/maintainance-info" method="post">
                 @csrf
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control">
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="item">Item</label>
                            <select name="item" id="item" class="form-control">
                                <option value="System Unit">System Unit</option>
                                <option value="router">Router</option>
                                <option value="laptop">Laptop</option>
                                <option value="printer">Printer</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="problem_type">Problem Type</label>
                                <select name="problem_type" id="problem_type" class="form-control">
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
                                <option value="repair">Repair</option>
                                <option value="reinstallation">ReInstallation</option>
                                <option value="replacement">Replacement</option>
                                <option value="other">Other</option>
                            </select>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="" class="required">Status</label>
                                <select name="status" id="" class="form-control" required>
                                   
                                    <option value="received">Received</option>
                                    <option value="assigned">Assigned</option>
                                    <option value="inprogress">Inprogress</option>
                                    <option value="escalated">Escalated</option>
                                    <option value="outsourced">Outsourced</option>                                    
                                    <option value="completed">Complete</option>

                                </select>
                            </div>
                        
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                            <textarea name="remark" id="remark" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Save" class="btn btn-success">
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