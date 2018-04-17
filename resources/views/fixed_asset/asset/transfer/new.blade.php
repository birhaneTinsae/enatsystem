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
                <div class="panel-heading">Transfer Asset
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                         Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                         Delete</a> -->
                    <!-- <a href="/fixed-asset/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                         New</a> -->
                </div>

                <div class="panel-body">
                    <form action="/transfers" method="POST">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asset_name">Asset</label>
                                    <input type="text" name="asset_name" id="asset_name" class="form-control" value="{{$asset->asset_name}}" readonly>
                                     <input type="hidden" name="asset_id" id="asset_id" class="form-control" value="{{$asset->id}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_Custudian">Current Custudian</label>
                                    <input type="text" name="current_Custudian" id="current_Custudian" class="form-control" value="{{$curr_custudian_name}}" readonly>
                                    <input type="hidden" name="current_Custudian_id" id="current_Custudian" class="form-control" value="{{$asset->custudian}}" readonly>
                                </div>

                                 <div class="form-group">
                                    <label for="current_Custudian">Current Cost_Center</label>
                                    <input type="text" name="current_cost_center_name" id="current_cost_center_name" class="form-control" value="{{$current_cost_center}}" readonly>
                                    <input type="hidden" name="current_cost_center_id" id="current_cost_center_id" class="form-control" value="{{$asset->branch_id}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" cols="10" rows="5" class="form-control">
                                    
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">New Custudian</label>
                                    <select type="select" name="new_custudian" id="" class="form-control" >
                                     <option >----- Select the New Custudian here -----
                                     </option>
                                      @php
                                           $j =0
                                         @endphp 
                                    @foreach($Employee as $emp)                                        
                                        <option value="{{$emp->id}}">
                                         @for ($i=$j; $i <=$j; $i++) 
                                            {{$emp_name[$i]}}
                                            @endfor                                       
                                        </option>   
                                         @php
                                     $j =$j+1
                                     @endphp                                                                       
                                    @endforeach
                                   
                                   
                                    </select>
                                </div> 
                                 <div class="form-group">
                                    <label for="">New Cost Center</label>
                                    <select type="select" name="new_cost_center" id="" class="form-control" >
                                    <option value="">----- Select Cost Center here -----
                                     </option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="effective_date">Effective Date</label>
                                    <input type="date" name="effective_date" id="effective_date" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label for=""></label>
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
