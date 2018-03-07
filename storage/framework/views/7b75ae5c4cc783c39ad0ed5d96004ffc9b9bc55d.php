<?php $__env->startSection('sidebar'); ?>
                        <!-- <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <!-- <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">FCY</li>
            </ol> -->
            <div class="panel panel-default">
            <div class="panel panel-body">
            <div class="alert alert-danger">
            <h1><?php echo e($exception->getStatusCode()); ?>. <?php echo e($exception->getMessage()); ?> </h1>
            </div>
            
            <h1></h1>
            
            </div>
                
                </div>
                <div class="panel-footer">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>