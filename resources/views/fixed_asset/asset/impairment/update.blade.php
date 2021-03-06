@extends('layouts.app') 
@section('sidebar')
<ul class="list-group">
    <li class="list-group-item disabled">Menu</li>
    <li class="list-group-item"><a href="/fixed-asset">PPE</a></li>
    <li class="list-group-item"><a href="/asset-category">Asset Item</a></li>
    <li class="list-group-item"><a href="/asset">Asset </a></li>
    <li class="list-group-item"><a href="#">Additional Cost</a></li>
    <li class="list-group-item"><a href="#">Home</a></li>
</ul>
@endsection
 
@section('content')
<div class="container">
    <div class="row">
        <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>
                <li> <a href="/fixed-asset">FAM</a></li>
                <li class="active">New Asset</li>


            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Asset
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                         Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                         Delete</a> -->
                    <a href="/fixed-asset/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                         New</a>
                </div>

                <div class="panel-body">
                    <form action="/impairment/{{$impairment->id}}" method="POST">
                        {{csrf_field()}} @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asset_name">Asset</label>
                                    <input type="text" name="asset_name" id="asset_name" class="form-control" value="{{$impairment->asset->asset_name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_value">Current Value</label>
                                    <input type="number" name="current_value" id="current_value" class="form-control" value="{{$impairment->current_value}}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" cols="10" rows="5" class="form-control">
                                    {{$impairment->remarks}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_value">New Value</label>
                                    <input type="number" name="new_value" id="new_value" value="{{$impairment->new_value}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="effective_date">Effective Date</label>
                                    <input type="date" name="effective_date" id="effective_date" value="{{$impairment->effective_date}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                </div>
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