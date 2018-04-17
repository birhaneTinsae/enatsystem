@extends('layouts.app')

@section('sidebar')
                        
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>  
                <li> <a href="/fixed-asset">FAM</a></li>
                <li class="active">Dispose Asset</li>
                             
                            
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Update Record
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
                      <form method="POST" action="/dispose/{{ $result->id }}">
                         {{ method_field ('PUT')}}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asset_name">Asset</label>
                                    <input type="text" name="asset_name" id="asset_name" class="form-control" value="{{$asset_name}}" readonly>
                                    <input type="hidden" name="asset_id" id="asset_id" class="form-control" value="{{$result->id}}" readonly>
                                </div>                              
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" value="{{$result->remarks}}" cols="10" rows="5" class="form-control">
                                    {{$result->remarks}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 
                                <div class="form-group">
                                    <label for="effective_date">Effective Date</label>
                                    <input type="date" name="effective_date" value="{{$result->effective_date}}" class="form-control" required>
                                </div>  
                             
                                <div class="form-group">
                                    <label for=""></label>
                                     <a href="/dispose" class="btn btn-danger btn-sm">Cancel</a>
                                    <input type="submit" value="Update" class="btn btn-success btn-sm">
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