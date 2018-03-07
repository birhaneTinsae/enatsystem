@extends('layouts.app')

@section('sidebar')
                        <!-- <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul> -->
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <!-- <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">FCY</li>
            </ol> -->
            {{--  <div class="panel panel-default">
            <div class="panel panel-body">  --}}
                    <div class="jumbotron">
                            <h1 class="display-4"><i class="fas fa-window-close"></i> {{ $exception->getStatusCode() }}.</h1>
                            <p class="lead"> {{ $exception->getMessage() }}</p>
                            <hr class="my-4">
                            <p>The file your are tring to access can not be found.</p>
                            <p class="lead">
                              <a class="btn btn-primary btn-lg" href="/home" role="button">Learn more</a>
                            </p>
                        </div>
            
            
           
            
            
                
                {{--  </div>
                <div class="panel-footer">
                   
                </div>
            </div>  --}}
        </div>
    </div>
</div>
@endsection
