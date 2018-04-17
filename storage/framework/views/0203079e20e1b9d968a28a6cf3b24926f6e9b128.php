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
                   <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li><a href="/hr">HRM</a></li>               
                <li class="active">New Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee
                    
                </div>

                <div class="panel-body">
                   

                    
                    <form method="POST" action="/hr">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                            
                                <div class="col-md-6">
                                   <div class="form-group <?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
                                        <label for="employee">Employee</label>
                                        
                                        <input type="text" class="form-control" list="employees-list" id="new-employee" name="user_id" placeholder="Employee">
                            
                                    <datalist id="employees-list"> </datalist>
                                    <?php if($errors->has('user_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('user_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                        <div class="form-group <?php echo e($errors->has('join_date') ? ' has-error' : ''); ?>">
                            <label for="join_date">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date"  >
                                    <?php if($errors->has('join_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('join_date')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group  <?php echo e($errors->has('job_position') ? ' has-error' : ''); ?>">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_position" id="job_position" >
                                        <?php $__currentLoopData = $job_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$job_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($job_position); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                    <?php if($errors->has('job_position')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('job_position')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div>
                                     <div class="form-group <?php echo e($errors->has('salary') ? ' has-error' : ''); ?>">
                            <label for="salary">Salary</label>
                            <input type="text" required class="form-control" id="salary" name="salary"  placeholder="Salary" >
                                    <?php if($errors->has('salary')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('salary')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>
                                 <div class="form-group <?php echo e($errors->has('enat_id') ? ' has-error' : ''); ?>">
                            <label for="enat_id">Employee_Id</label>
                            <input type="text" pattern="[E][B][-][\d]{2,}" required class="form-control" id="enat_id" name="enat_id" placeholder="eg. EB-id_no" >
                                    <?php if($errors->has('enat_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('enat_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>
                                </div>
                            </div>
                       
                      
                        <a  class="btn btn-sm text-center" role="button" data-parent="#selector" data-toggle="collapse" data-target="#collapseAddress"><span class="badge badge-light">Address</span></a>
                        <br>
                        <div class="collapse" id="collapseAddress">
                            <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Sub City</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">Woreda</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Kebele</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="">House No</label>
                                            <input type="text"  class="form-control">
                                    </div>
                                </div>
                            </div>
                               
                               
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                   
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>