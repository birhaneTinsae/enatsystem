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
                <li class="active">Update Record</li>
            </ol>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">Update Record
                    
                </div>

                <div class="panel-body">
                   <form method="POST" action="/job/<?php echo e($job->id); ?>" >
                            <?php echo e(csrf_field()); ?>

                          <?php echo method_field('PUT'); ?>   
                         <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="job_position_name">Job Position Name</label>
                                    <input type="text" class="form-control" name="name" id="job_position_name" value="<?php echo e($job->name); ?>" placeholder="eg. Senior System Admin">
                                    <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                              <div class="form-group <?php echo e($errors->has('grade') ? ' has-error' : ''); ?>">
                            <label for="grade">Grade</label>
                            <input type="text" required class="form-control" id="grade" name="grade" value="<?php echo e($job->grade); ?>" >
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
                                    <option value="<?php echo e($job->operation_class); ?>"><?php echo e($job->operation_class); ?></option>
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
                    
                       
                        <a href="/job" class="btn btn-danger btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
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