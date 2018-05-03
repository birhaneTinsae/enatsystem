<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>                            
                        </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
                   <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>               
                <li><a href="/transferpromotionrequest">Transfer/Promotion Req</a></li>               
                <li class="active">New Transfer/Promotion Request</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new record                 
                </div>
                <div class="panel-body">                                  
                    <form method="POST" action="/transferpromotionrequest">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                    <label for="employee"> Employee name</label>
                                   
                                    <select class="form-control" name="employee" id="employee">
                                     <?php echo e($employee=App\Employee::all()); ?>

                                    <option value="">-----Select Employee -----
                                   </option>
                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>                                                                                                         
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  <?php echo e($errors->has('job_position') ? ' has-error' : ''); ?>">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_position_id" id="job_position_id" >
                                         <option value="">-----Select Job Position  -----
                                   </option>
                                        <?php $__currentLoopData = $job_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$job_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"  <?php if(old('job_position_id') == "$id"): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($job_position); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                    <?php if($errors->has('job_position_id')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('job_position_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div> 
                                </div>
                                
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Requested Branch/Department</label>                                   
                                    <select class="form-control" name="branch_id" id="branch_id">
                                     <?php echo e($branch=App\Branch::all()); ?>

                                    <option>-----Select Branch -----
                                   </option>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>
                              
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="reason">Remark</label>
                                    <select  class="form-control" name="remark" id="remark" >
                                    <option>
                                   </option>
                                    <option value="Lateral">Lateral</option>
                                    <option value="Place Change">Place Change</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div> 
                        </div>
                      
                    <div class="col-md-6">
                    <label for="reason">Reason</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="reason">Reason</textarea>                            
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