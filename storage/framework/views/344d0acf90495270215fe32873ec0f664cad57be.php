<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Enat Bank S.C.')); ?>- <?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">  

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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
    input[type="password"]:invalid {
    border-color: red;
    }
    input[type="password"],
    input[type="password"]:valid {
        border-color: #ccc;
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
                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                        <?php echo e(config('app.name', 'Enat Bank S.c.')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                             <li><a href="<?php echo e(route('phone-book')); ?>">Phone Book</a></li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                            <!-- <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                        <?php else: ?>
                            <li><a href="<?php echo e(route('register')); ?>">Branch <span class="label label-success"><?php echo e(Auth::user()->branch->code); ?></span></a></li>
                            <!-- <li><a href="<?php echo e(route('register')); ?>">Role <span class="label label-primary"><?php echo e(Auth::user()->branch->branch_code); ?></span></a></li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Reset password
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     Settings
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
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
                    <?php echo $__env->yieldContent('sidebar'); ?>
                   
    
                        
                  
                   
            </div>
            <div class="col-md-9">
            <!--Main Content functionality-->
                    <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>



       
    </div>

    <!-- Scripts -->
   
    <script  src="<?php echo e(asset('js/app.js')); ?>"></script>

    <script >
    $(document).ready(function () {
        var temp=[];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
        //to dynamically populate employees while selecting branch.
        $('#branch').change(function () {
            var branch = $(this).val();          
            var result='';
            console.log(branch);
            $.getJSON("/branch/"+branch+"/employees", function(data){
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
            
            $.getJSON('/msg-templete/'+msg_templete,function(data){
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



         $('#actingemployeeUpdateModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
             // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   // console.log(id);
   var id = button.data('empid')
  
    var employee_name = button.data('full_name') 
     var acting_job_position_name = button.data('acting_job_position_name') 
      var acting_branch_name = button.data('acting_branch_name') 
       var start_date = button.data('start_date') 
        var end_date = button.data('end_date') 
        var status = button.data('status')      
        console.log(acting_branch_name);      
            var modal = $(this)                       
            modal.find('.modal-title').text( "Edit Information");
            modal.find('.modal-body #full_name').val(employee_name);
            modal.find('.modal-body #acting_job_position_name').val(acting_job_position_name);
            modal.find('.modal-body #acting_branch_name').val(acting_branch_name);
            modal.find('.modal-body #start_date').val(start_date);
            modal.find('.modal-body #end_date').val(end_date);
            modal.find('.modal-body #status').val(status);   
            modal.find('.modal-body #empid').val(id);         
            //modal.find('.modal-body form').attr('action','/actingemployee/'+id)
          
           
            
            
            
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
         
   $.getJSON('/acting/employees',function(data){
                // Loop over the JSON array.
                data.forEach(function(employee) {
                // Create a new <option> element.
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                option.value = employee.id;
                option.text=employee.name;
                // Add the <option> element to the <datalist>.
                $('#actemployees-list').append(option);
            });
          //  $('#new-employee').placeholder('--Employee List--');
         });
//phone book search query ajax call
         $('#query').on('keyup',function(){
           var query= $(this).val();
           //to check if the search box is empty and display all the employees.
            if(query==='')
              query='all';

           
           var result='';
           $.getJSON('/phone-book/'+query,function(data){
            data.forEach(function(employee){              
                result+='<tr><td>'
                        +employee.count
                        +'</td><td>'
                        +employee.name
                        +'</td><td>'                      
                        +employee.branch
                        +'</td><td>'
                        +employee.phone_no+'</td></tr>';
            });
            $('#search-result tbody').html(result);
           });
         });
//Act Employee search query ajax call
           $('#queryemp').on('keyup',function(){
           var queryemp= $(this).val();
           //to check if the search box is empty and display all the employees.
            if(queryemp==='')
              queryemp='all';           
           var results='';
           $.getJSON('/searchactingemployee/'+queryemp,function(data){
            data.forEach(function(actemployee){              
                results+='<tr><td>'
                        +actemployee.count
                        +'</td><td>'
                        +actemployee.full_name
                        +'</td><td>'                      
                        +actemployee.job_position
                        +'</td><td>'                      
                        +actemployee.home_branch
                        +'</td><td>'                      
                        +actemployee.acting_job_position
                        +'</td>'
                        +'<td>'                      
                        +actemployee.acting_branch_name
                        +'</td><td>'                      
                        +actemployee.from
                        +'</td><td>'                      
                        +actemployee.upto
                        +'</td><td>'                      
                        +actemployee.status                        
+'</td><td><a class="btn-warning btn-sm" data-toggle="modal" data-target="#actingemployeeUpdateModal" data-empid='+actemployee.emp_id+' data-full_name='+actemployee.full_name+' data-acting_job_position_name='+actemployee.acting_job_position+' data-acting_branch_name='+actemployee.acting_branch_name+' data-start_date='+actemployee.from+' data-end_date='+actemployee.upto+' data-status='+actemployee.status+'> <i class="fa fa-edit"></i></a> ' +'</td></tr>';        
            });
            console.log(results);
            $('#search-results tbody').html(results);
           });
         });

         //add new row to role defination screen
         var row_counter=1;
         $("#add-new-role-row").click(function(){

            var row="<tr>\
                                    <td>\
                                        <select name=\"models[]\" id=\"\" class=\"form-control\">\
                                            <option value=\"employee\">Employee</option>\
                                            <option value=\"user\">User</option>\
                                            <option value=\"branch\">Branch</option>\
                                            <option value=\"job\">Job</option>\
                                            <option value=\"role\">Role</option>\
                                            <option value=\"sms\">SMS Notification</option>\
                                            <option value=\"message\">Message Templete</option>\
                                            <option value=\"hr\">HR Access</option>\
                                            <option value=\"fam\">FAM Access</option>\
                                            <option value=\"vms\">VMS Access</option>\
                                            <option value=\"fcy\">FCY Access Access</option>\
                                        </select>\
                                    </td>\
                                    <td>\
                                        <div class=\"checkbox\">\
                                            <label for=\"\">\
                                            <input type=\"checkbox\" name=\"permissions["+row_counter+"][]\" value=\"create\">\
                                            </label>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class=\"checkbox\">\
                                            <label for=\"\">\
                                            <input type=\"checkbox\" name=\"permissions["+row_counter+"][]\" value=\"view\">\
                                            </label>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class=\"checkbox\" >\
                                            <label for=\"\">\
                                            <input type=\"checkbox\" name=\"permissions["+row_counter+"][]\" value=\"update\">\
                                            </label>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class=\"checkbox\">\
                                            <label for=\"\">\
                                            <input type=\"checkbox\" name=\"permissions["+row_counter+"][]\" value=\"delete\">\
                                            </label>\
                                        </div>\
                                    </td>\
                                </tr>";
                                row_counter++;
       $('#new-role-table tbody').append(row);
       console.log('clicked');

         });


         //to do the actual slugfing
         const slugify=(val)=>{
             return val.toString().toLowerCase().trim()
             .replace(/&/g,'-and-') //replace & with '-and-'
             .replace(/[\s\W-]+/g,'-')  //replace other non wordy character with '-'
         }
         // to create slug for role name
         $('#role-name').keyup(function(){
                $('#role-slug').val(slugify($(this).val()));
         });

         //password generator button click listener.
         $('#password_generate').click(function(){
             $.get('/password-generator',function(data,status){
                 console.log(data);
                 $('#notification-new-password').val(data);
             });
         });


    });
    </script>
    
</body>
</html>
