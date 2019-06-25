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
        {{--<ol class="breadcrumb">
                <li><a href="home">Home</a></li>
                <li><a href="/hr">HR</a></li>
                <li class="active">Role</li>
            </ol>--}}
            <div class="panel panel-default">
                <div class="panel-heading">TT Registration

                    <a href="/tt-maintainance/{{$tt->id}}/edit" class="text-right pull-right panel-menu-item"><i class="far fa-edit"></i>
                    Edit</a>

                    <a href="/tt-maintainance/{{$tt->id}}/delete" class="text-right pull-right panel-menu-item"><i class="far fa-trash-alt"></i>
                    Delete</a>
                    <a href="/tt-maintainance/" class="text-right pull-right panel-menu-item"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a> 
 @can('create',App\User::class)
                    <a href="role/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a> @endcan

                </div>

                <div class="panel-body">


              
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" readonly>
                                <option value="{{$tt->branch->id}}">{{$tt->branch->name}}</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="registered_at">Registered At</label>
                            <input type="datetime-local" class="form-control" name="registered_at" value="{{$tt->registered_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="disconnected_at">Disconnected At</label>
                            <input type="datetime-local" class="form-control" name="disconnected_at" value="{{$tt->disconnected_at}}" readonly >
                        </div>
                        <div class="form-group">
                            <label for="reconnected_at">Reconnected At</label>
                            <input type="datetime-local" class="form-control" name="reconnected_at" value="{{$tt->reconnected_at}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="follow_up_no">Follow Up No</label>
                            <input type="text" class="form-control" name="follow_up_no" value="{{$tt->follow_up_no}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" readonly>
                                <option value="completed">Completed</option>
                                <option value="in_progress">In Progress</option>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                            <textarea name="remark" id="remark" cols="30" rows="10" class="form-control"  readonly>{{$tt->remarks}}
                            </textarea>
                        </div>
                        <form action="/tt-maintainance/{{$tt->id}}" method="post">
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