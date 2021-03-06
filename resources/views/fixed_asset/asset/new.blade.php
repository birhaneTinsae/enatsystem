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
                    <form action="/asset" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Asset Name</label>
                                    <input type="text" name="asset_name" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Purchased Date</label>
                                    <input type="date" name="purchased_date" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Gross Purchase Amount</label>
                                    <input type="number" name="gross_purchase_amount" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Useful Life (Overrite)</label>
                                    <input type="number" name="useful_life" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Residual Value (Overrite)</label>
                                    <input type="number" name="residual_value" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tag</label>
                                    <input type="text" name="tag" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Asset Category</label>
                                    <select type="select" name="asset_category" id="" class="form-control">
                                    @foreach($asset_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Cost Center</label>
                                    <select type="select" name="cost_center" id="" class="form-control">
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <textarea name="remarks" id="" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="disposed">Disposed</label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-success btn-block">
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