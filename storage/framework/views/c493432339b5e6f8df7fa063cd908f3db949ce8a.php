<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>                           
                            <li class="list-group-item"><a href="#" >TransferPromotion</a></li>
                            <!-- <li class="list-group-item"><a href="home" >Home</a></li> -->
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
              
               </h4>
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                <table class="table table-striped">
                 <tr>
                <th>Employee Name</th>
                <td><?php echo e($employee->user->name); ?></td> 
                </tr>
                <th>Employee Id</th>
                <td><?php echo e($employee->enat_id); ?></td> 
                </tr>
                <tr>
                <th>Job Position</th>
                <td><?php echo e($employee->job_position->name); ?></td> 
                </tr>

                <tr>
                <th>Email</th>
                <td><?php echo e($employee->user->email); ?></td>
                </tr>

                <tr>
                <th>Phone number</th>
               <td><?php echo e($employee->user->phone_no); ?></td>
                </tr>

                <tr>
                <th>Branch</th>
                <td><?php echo e($employee->user->branch->branch_name); ?></td>
                </tr>
                <tr>
                <th> Date of Employment</th>
                 <td><?php echo e($employee->employed_date); ?></td>
                </tr>

                 <tr>
                <th>Salary</th>
                 <td><?php echo e($employee->salary); ?></td>
                </tr>
                

                        </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default"></span></div>
                        <div class="col-md-4">Date Time <span class="label label-default"></span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>
                    </div>                    
                </div>
            </div>
            <button onclick="printpage('printableTable')" class="btn btn-primary">print</button></span>                  
<span><a href="/hr" class="btn btn-primary">Back</a></span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>