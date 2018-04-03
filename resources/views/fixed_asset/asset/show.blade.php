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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Asset Name</label>
                                <input type="text" name="" id="" class="form-control" value="{{$asset->asset_name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Purchased Date</label>
                                <input type="text" name="" id="" class="form-control" value="{{$asset->purchase_date}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Gross Purchase Amount</label>
                                <input type="text" name="" id="" class="form-control" value="{{$asset->gross_purchase_amount}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Useful Life</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->gross_purchase_amount}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Residual Value</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->gross_purchase_amount}}" readonly>
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->tag}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Asset Category</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->asset_item->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Cost Center</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->branch->name}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Remarks</label>
                                <input type="text" name="" id="" class="form-control"  value="{{$asset->remarks}}" readonly>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                @if($asset->disposed)
                                    <label><input type="checkbox" name="disposed" checked>Disposed</label>
                                @else
                                    <label><input type="checkbox" name="disposed">Disposed</label>
                                @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <a href="/additional-cost/{{$asset->id}}" class="btn btn-link"><kbd>Additional Cost</kbd></a>
                                <a href="/impairment/{{$asset->id}}" class="btn btn-link"><kbd>Impairment</kbd></a>
                            </div>
                        </div>
                    </div>
                    <h4>Additional Cost</h4>
                    @if($additional_costs->isNotEmpty())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Value</th>
                                <th>Remarks</th>
                                <th>Effective Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($additional_costs as $additional_cost)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$additional_cost->added_cost}}</td>
                                <td>{{$additional_cost->remarks}}</td>
                                <td>{{$additional_cost->effective_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-warning">
                        <strong>No Additional Value</strong> 
                    </div>
                   
                    @endif
                    <h4>Impairment</h4>
                    @if($impairments->isNotEmpty())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Old Value</th>
                                <th>New Value</th>
                                <th>Effective Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($impairments as $impairment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$impairment->current_value}}</td>
                                <td>{{$impairment->new_value}}</td>
                                <td>{{$impairment->effective_date}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-warning">
                        <strong> No Impairment Value</strong> 
                    </div>
                   
                    @endif
                    <h4>Depreciation Schedule</h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Depreciation Dates</th>
                                <th>Depreciation Values</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{now()->addYear(1)->toDateString()}}</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{now()->addYear(2)->toDateString()}}</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{now()->addYear(3)->toDateString()}}</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{now()->addYear(4)->toDateString()}}</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
