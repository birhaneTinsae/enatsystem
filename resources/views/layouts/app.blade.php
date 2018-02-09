<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}- @yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .sidebar{
        margin-left:10px;
    }
    .card{
        background-color:#fff;
    }
    .panel-menu-item{
        margin-right:10px;
        color:#000;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('register') }}">Branch <span class="label label-success">{{Auth::user()->branch->branch_code}}</span></a></li>
                            <!-- <li><a href="{{ route('register') }}">Role <span class="label label-primary">{{Auth::user()->branch->branch_code}}</span></a></li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Reset password
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     Settings
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
      </nav> -->
    
        <div class="row"> 
            <div class="col-md-2 sidebar">
            <!--Side bar functionality-->
                    @yield('sidebar')
                   
    
                        
                  
                   
            </div>
            <div class="col-md-9">
            <!--Main Content functionality-->
                    @yield('content')
            </div>
        </div>



       
    </div>

    <!-- Scripts -->
   
    <script  src="{{ asset('js/app.js') }}"></script>

    <script >
    $(document).ready(function () {
        var temp=[];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //to dynamically populate employees while selecting branch.
        $('#branch').change(function () {
            var branch = $(this).val();          
            var result='';
            console.log(branch);
            $.getJSON("branch/"+branch+"/employees", function(data){
                  $.each(data,function(key,value){
                    result+='<option value="'+value.id+'">'+value.name+'</option>';
                    temp[value.id]=value.phone_no;
                  
                  });
                  $('#employee').html(result);
                  $('#phone-no').val(temp[$('#employee').val()]);
             });
        });

        //to dynamically change phone number field based on employee.
        $('#employee').change(function(){
            $('#phone-no').val(temp[$('#employee').val()]);
        });
        // to dynamically populate message content in sms notification page while selecting msg templete.
        $('#msg-templete').change(function(){
            var msg='';
            var msg_templete=$(this).val();
            
            $.getJSON('msg-templete/'+msg_templete,function(data){
              msg=  data.templete;              
                
                $('#msg').text(msg);
            });
        });


    /*
    *
    */
        $('#employeeDetailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var employee;
            var modal = $(this)
           $.getJSON('hr/'+id,function(data){
            modal.find('.modal-title').text( data.employee_name)
            modal.find('.modal-body input#full_name').val(data.employee_name)
            modal.find('.modal-body input#email').val(data.email)
            modal.find('.modal-body input#job_position').val(data.job_position)
            modal.find('.modal-body input#employed_date').val(data.employed_date)
            modal.find('.modal-body input#phone_no').val(data.phone_no)
            
           });
           
            
            
            
        });
        $('#employeeUpdateModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var employee;
            var modal = $(this)
           $.getJSON('hr/'+id,function(data){
            modal.find('.modal-title').text( data.employee_name)
            modal.find('.modal-body input#full_name').val(data.employee_name)
            modal.find('.modal-body input#email').val(data.email)
            modal.find('.modal-body input#job_position').val(data.job_position)
            modal.find('.modal-body input#employed_date').val(data.employed_date)
            modal.find('.modal-body input#phone_no').val(data.phone_no)
            modal.find('.modal-body form').attr('action','/hr/'+id)
            
           });
           
            
            
            
        });
        
        /** 
        
        to retriev employee list from user table
         */

         $.getJSON('/hr/users',function(data){
                // Loop over the JSON array.
                data.forEach(function(employee) {
                // Create a new <option> element.
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                option.value = employee.id;
                option.text=employee.name;
                // Add the <option> element to the <datalist>.
                $('#employees-list').append(option);
            });
          //  $('#new-employee').placeholder('--Employee List--');
         });
    });
    </script>
   

</body>
</html>
