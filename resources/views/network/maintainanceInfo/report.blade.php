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
                <li><a href="/isd">ISD</a></li>
                <li class="active">TT</li>
            </ol>--}}
            
            <div class="panel panel-default">
                <div class="panel-heading">Maintainance Report

                    
              
                    <a href="/maintainance-info/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> 
                    <a href="/tt-maintainance/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 

                </div>

                <div class="panel-body">
                <form action="/maintainance-info/report" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" name="from">
                            </div>
                            <div class="form-group">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" name="to">
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
                          
                            {{--<div class="form-group">
                            <label for="">Assigned to</label>
                                <select name="status" id="" class="form-control">
                                    <option value="complete">Complete</option>
                                    <option value="inprogress">Inprogress</option>

                                </select>
                            </div>--}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="branch">Requester Unit</label>
                                <select name="branch" id="branch" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   
                                    <option value="received">Received</option>
                                    <option value="assigned">Assigned</option>
                                    <option value="inprogress">Inprogress</option>
                                    <option value="escalated">Escalated</option>
                                    <option value="outsourced">Outsourced</option>                                    
                                    <option value="completed">Complete</option>

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
                            <label for="">Report Type</label>
                                <select name="report_type" id="" class="form-control">
                                    <option value="1">Incidents by assigned users by time range</option>
                                    <option value="2">By Status</option>
                                    <option value="3">By Items for a given time range</option>
                                    <option value="4">By Problem type for a given time range</option>
                                    <option value="5">By Requester Unit</option>
                                </select>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="pdf" name="report_output" disabled value="pdf">
                                <label class="form-check-label" for="pdf">PDF</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="html" name="report_output" value="html">
                                <label class="form-check-label" for="html">HTML</label>
                            </div>
                            <button type="submit" class="btn btn-success">Generate</button>
                        </div>
                    </div>
                </form>
                   
                   
                </div>
                <div class="panel-footer">
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection