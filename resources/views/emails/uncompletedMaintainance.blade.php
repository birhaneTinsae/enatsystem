@extends('layouts.app') 
 
@section('content')
<div class="container">
    <div class="row">
        <!--col-md-offset-1-->
        <div class="col-md-10 ">
            
            <div class="panel panel-default">
                

                <div class="panel-body">
                   
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Scheduled Completion Date</th>
                                <th>Problem Type</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($maintainances as $maintainance)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$maintainance->branch->name}}</td>
                                <td>{{$maintainance->completion_date}}</td>
                                <td>{{$maintainance->problem_type}}</td>
                            </tr>
                            @endforeach
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