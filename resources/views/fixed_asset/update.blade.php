@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >PPE</a></li>
                            <li class="list-group-item"><a href="#" >Asset Item</a></li>
                            <li class="list-group-item"><a href="#" >Asset </a></li>
                            <li class="list-group-item"><a href="#" >Additional Cost</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>               
                <li><a href="/fixed-asset">PPE</a></li>               
                <li class="active">New PPE Category</li>
            </ol>
            @if(session('success')!=null)
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">New PPE Category
                <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
 Close</a>
                <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
 Delete</a> -->
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
 New</a>
                </div>

                <div class="panel-body">
                  <form action="/fixed-asset/{{$ppe->id}}" method="POST">
                  {{csrf_field()}}
                 @method('PUT')
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">PPE Type</label>
                                <input type="text" name="ppe_type" id="" class="form-control" value="{{$ppe->p_p_e_type}}">
                            </div>
                            <div class="form-group">
                                <label for="">Useful Life</label>
                                <input type="number" name="useful_life" id="" class="form-control" required value="{{$ppe->useful_life}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                               <div class="form-group">
                                    <label for="">Risdual Value</label>
                                    <input type="number" name="residual_value" id="" class="form-control" required value="{{$ppe->residual_value}}">
                                </div>
                         
                          </div>
                         
                      </div>
                     
                      <input type="submit" value="Update" class="btn btn-success">
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
