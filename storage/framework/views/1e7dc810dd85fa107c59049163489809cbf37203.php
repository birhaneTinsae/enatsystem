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
            
                    <div class="jumbotron">
                            <h1 class="display-4"><i class="fas fa-lock"></i> <?php echo e($exception->getStatusCode()); ?>.</h1>
                            <p class="lead"> <?php echo e($exception->getMessage()); ?></p>
                            <hr class="my-4">
                            <p>This error is due to tring to access an authorized resource.Please make sure you have the previlages to access or contact the System administrator.</p>
                            <p class="lead">
                              <a class="btn btn-primary btn-lg" href="/home" role="button">Learn more</a>
                            </p>
                        </div>
            
            
           
            
            
                
                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>