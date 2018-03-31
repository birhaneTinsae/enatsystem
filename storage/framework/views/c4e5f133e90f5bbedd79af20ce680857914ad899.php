<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HRM</a></li>               
                <li><a href="/job">Job</a></li>               
                <li class="active">New Job Position</li>
            </ol>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">New Job Position
                    
                </div>

                <div class="panel-body">
                <form action="/job" method="POST">    
                         <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="job_position_name">Job Position Name</label>
                                    <input type="text" class="form-control" name="name" id="job_position_name" value="<?php echo e(old('name')); ?>" placeholder="eg. Senior System Admin">
                                    <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                      <div class="form-group <?php echo e($errors->has('grade') ? ' has-error' : ''); ?>">
                            <label for="grade">Grade</label>
                            <input type="text" required class="form-control" id="grade" name="grade" placeholder="Job Grade" >
                                    <?php if($errors->has('grade')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('grade')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php echo e($errors->has('operation_class') ? ' has-error' : ''); ?>">
                                    <label for="job_position_operation_class">Operation Location</label>
                                    <select  class="form-control" name="operation_class" id="job_position_operation_class" >
                                    <option>------Select Operation Class------</option>
                                    <option value="Head office">Head office</option>
                                    <option value="Branch">Branch</option>
                                    <option value="Both">Both</option>
                                    </select>
                                    <?php if($errors->has('operation_class')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('operation_class')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    
                       
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>