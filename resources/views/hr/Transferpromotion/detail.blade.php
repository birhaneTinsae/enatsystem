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
                <li class="active">TransferPromotion detail</li>
            </ol>
            <div class="panel panel-primary">
             <div id="printableTable">
                <div class="panel-heading">               
                <div class="panel-body text-center">
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">                        
                          </div> 
              <h4 class="text-center  text-success font-weight-bold">
               {{$Transferpromotion->reason}} History of Employee {{$emp_name}} on date {{$Transferpromotion->date}}
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
                <th>From Job Position</th>
                <td>{{$from_job}}<td>
                </tr>

                <tr>
                <th>To Job position</th>
                <td>{{$to_job}}<td>
                </tr>

                <tr>
                <th>From Branch</th>
                <td>{{$from_branch}}<td>
                </tr>

                <tr>
                <th>To Branch</th>
                <td>{{$to_branch}}<td>
                </tr>


                <tr>
                <th> Date of Promotion</th>
                <td>{{$Transferpromotion->date}}<td>
                </tr>

                 <tr>
                <th> From Salary</th>
                <td>{{$Transferpromotion->prev_salary}} <td>
                </tr>
                <tr>
                <th> To Salary</th>
                <td>{{$Transferpromotion->new_salary}} <td>
                </tr>

                <tr>
                <th> Reason</th>
                <td>{{$Transferpromotion->reason}}<td>
                </tr>

                <tr>
                <th> Remark</th>
                <td>{{$Transferpromotion->remark}}<td>
                </tr>
                        </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">{{$Transferpromotion->maker}}</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">{{$Transferpromotion->created_at}}</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>
                    </div>                    
                </div>
            </div>
            <button onclick="printpage('printableTable')" class="btn btn-primary">print</button></span>                  
<span><a href="/transferpromotion" class="btn btn-primary">Back</a></span>
        </div>
    </div>
</div>
@endsection
