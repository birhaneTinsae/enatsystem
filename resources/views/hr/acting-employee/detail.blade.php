@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>                           
                            <li class="list-group-item"><a href="#" >TransferPromotion</a></li>
                            <!-- <li class="list-group-item"><a href="home" >Home</a></li> -->
                        </ul>
@endsection

@section('content')
  <script>
 function printpage(el) {
  var restorepage=document.body.innerHTML;
  var printcontent=document.getElementById(el).innerHTML;
 document.body.innerHTML=printcontent;
         window.print();
           document.body.innerHTML=restorepage;
       }
</script>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-6 ">
            <ol class="breadcrumb">
                <!-- <li><a href="home">Home</a></li>                -->
                <li class="active">Acting Employee detail</li>
            </ol>
            <div class="panel panel-primary">
             <div id="printableTable">
                <div class="panel-heading">               
                <div class="panel-body text-center">
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">                        
                          </div> 
              <h4 class="text-center  text-success font-weight-bold">
              Acting History of Employee {{$emp_name}} 
               </h4>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                 <tr>
                <th>Employee Name</th>
                <td>{{$emp_name}}</td> 
                </tr>
                <th>Employee Id</th>
                <td>{{$emp_id}}</td> 
                </tr>
                <tr>
                <th>Job Position</th>
                <td>{{$from_job}}<td>
                </tr>

                <tr>
                <th>Acting Job position</th>
                <td>{{$to_job}}<td>
                </tr>

                <tr>
                <th>Branch</th>
                <td>{{$from_branch}}<td>
                </tr>

                <tr>
                <th>Acting For Branch</th>
                <td>{{$to_branch}}<td>
                </tr>
                <tr>
                <th> Starting Date</th>
                <td>{{$result->start_date}}<td>
                </tr>
                 <tr>
                <th> End_date</th>
                <td>{{$result->end_date}} <td>
                </tr>
                <tr>
                <th>Duration</th>                
                <td>{{$result->duration}} - month <td>
                </tr>

                <tr>
                <th> Status</th>
                <td>{{$status}}<td>
                </tr>

                <tr>
                <th> Remark</th>
                <td>{{$result->remark}}<td>
                </tr>
                        </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">{{$result->maker}}</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">{{$result->created_at}}</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>
                    </div>                    
                </div>
            </div>
            <button onclick="printpage('printableTable')" class="btn btn-primary">print</button></span>                  
<span><a href="/actingemployee" class="btn btn-primary">Back</a></span>
        </div>
    </div>
</div>
@endsection
