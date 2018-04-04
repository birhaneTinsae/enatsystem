@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="/fixed-asset" >PPE</a></li>
                            <li class="list-group-item"><a href="/asset-category" >Asset Item</a></li>
                            <li class="list-group-item"><a href="/asset" >Asset </a></li>
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
                    <form action="/asset/{{$asset->id}}" method="POST">
                    {{csrf_field()}}
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asset_name">Asset Name</label>
                                    <input type="text" name="asset_name" id="asset_name" class="form-control" value="{{$asset->asset_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="purchased_date">Purchased Date</label>
                                    <input type="date" name="purchased_date" id="purchased_date" class="form-control" value="{{$asset->purchase_date}}">
                                </div>
                                <div class="form-group">
                                    <label for="gross_purchase_amount">Gross Purchase Amount</label>
                                    <input type="number" name="gross_purchase_amount" id="gross_purchase_amount" class="form-control" value="{{$asset->gross_purchase_amount}}">
                                </div>
                                <div class="form-group">
                                    <label for="useful_life">Useful Life (Overrite)</label>
                                    <input type="number" name="useful_life" id="useful_life" class="form-control" value="{{$asset->overrided_useful_life}}">
                                </div>
                                <div class="form-group">
                                    <label for="residual_value">Residual Value (Overrite)</label>
                                    <input type="number" name="residual_value" id="residual_value" class="form-control" value="{{$asset->overrided_residual_value}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <input type="text" name="tag" id="tag" class="form-control" value="{{$asset->tag}}">
                                </div>
                                <div class="form-group">
                                    <label for="asset_category">Asset Category</label>
                                    <select type="select" name="asset_category" id="asset_category" class="form-control" >
                                    @foreach($asset_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="cost_center">Cost Center</label>
                                    <select type="select" name="cost_center" id="cost_center" class="form-control" >
                                    <option value="{{$asset->branch->id}}">{{$asset->branch->name}}</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" cols="20" rows="5" class="form-control">{{$asset->remarks}}</textarea>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="disposed">Disposed</label>
                                </div>
                                <div class="form-group">
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
