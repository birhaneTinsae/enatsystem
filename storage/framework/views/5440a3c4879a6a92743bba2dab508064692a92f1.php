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
                <li class="active"><?php echo e($jobs->name); ?> job position detail</li>
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
                <th>Position Name</th>
                <td><?php echo e($jobs->name); ?></td> 
                </tr>
                <th>Grade </th>
                <td><?php echo e($jobs->grade); ?></td> 
                </tr>
                <tr>
                <th>Step1</th>
                <td><?php echo e($jobs->step1); ?></td> 
                </tr>

                 <th>Step2</th>
                <td><?php echo e($jobs->step2); ?></td> 
                </tr>                

                 <th>Step3</th>
                <td><?php echo e($jobs->step3); ?></td> 
                </tr>


                 <th>Step4</th>
                <td><?php echo e($jobs->step4); ?></td> 
                </tr>

                  <th>Step5</th>
                <td><?php echo e($jobs->step5); ?></td> 
                </tr>

                 <th>Step6</th>
                <td><?php echo e($jobs->step6); ?></td> 
                </tr>

                 <th>Step7</th>
                <td><?php echo e($jobs->step7); ?></td> 
                </tr>

                 <th>Step8</th>
                <td><?php echo e($jobs->step8); ?></td> 
                </tr>

                 <th>Step9</th>
                <td><?php echo e($jobs->step9); ?></td> 
                </tr>

                 <th>Step10</th>
                <td><?php echo e($jobs->step10); ?></td> 
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
<span><a href="/job" class="btn btn-primary">Back</a></span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>