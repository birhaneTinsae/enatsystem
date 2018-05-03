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
                <li><a href="/transfer">Transfer/Promotion</a></li>               
                <li class="active">New Transfer/Promotion</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Update record                 
                </div>
                <div class="panel-body">                                  
               <form method="POST" action="/transferpromotion/<?php echo e($transferpromotion->id); ?>">
                         <?php echo e(method_field ('PUT')); ?>

                        <?php echo e(csrf_field()); ?>

                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control" disabled list="actemployees-list"
                                         id="new-employee" name="new_employee" placeholder="Employee" value=<?php echo e($emp_name); ?>>                            
                                    <datalist id="actemployees-list"> </datalist>
                                    <input type="hidden" name="emp_id" value="<?php echo e($transferpromotion->employee_id); ?>">
                                </div>                                                                                                         
                                </div>
                                <div class="col-md-6">
                                <div class="form-group  <?php echo e($errors->has('job_position') ? ' has-error' : ''); ?>">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_id" id="job_id" >                                    
                                    <option value="<?php echo e($transferpromotion->to_job_position); ?>"><?php echo e($to_job); ?></option>
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
                                    <label for="job_position">New Branch/Department</label>                                   
                                    <select class="form-control" name="branch_name" id="branch_name">
                                     <?php echo e($branch=App\Branch::all()); ?>

                                    <option value="<?php echo e($transferpromotion->to_branch); ?>"><?php echo e($to_branch); ?>

                                   </option>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                             </div>
                                <div class="form-group">
                                    <label for="job_position_step"> New Job_Position_Step</label>
                                    <select  class="form-control" name="job_position_step" id="job_position_step" >
                                    <option value="<?php echo e($transferpromotion->new_job_position_step); ?>"><?php echo e($transferpromotion->new_job_position_step); ?></option>
                                    <option value="base" <?php if(old('job_position_step') == "base"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Base</option>
                                    <option value="step1" <?php if(old('job_position_step') == "step1"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 1</option>
                                    <option value="step2" <?php if(old('job_position_step') == "step2"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 2</option>
                                    <option value="step3" <?php if(old('job_position_step') == "step3"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 3</option>                                   
                                    <option value="step4" <?php if(old('job_position_step') == "step4"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 4</option>                                   
                                    <option value="step5" <?php if(old('job_position_step') == "step5"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 5</option>                                   
                                    <option value="step6" <?php if(old('job_position_step') == "step6"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 6</option>                                   
                                    <option value="step7" <?php if(old('job_position_step') == "step7"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 7</option>                                   
                                    <option value="step8" <?php if(old('job_position_step') == "step8"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 8</option>                                   
                                    <option value="step9" <?php if(old('job_position_step') == "step9"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 9</option>                                   
                                    <option value="step10" <?php if(old('job_position_step') == "step10"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Step 10</option>                                   
                                    </select>
                                      <?php if($errors->has('job_position_step')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('job_position_step')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <select  class="form-control" name="reason" id="reason" >
                                    <option value="<?php echo e($transferpromotion->reason); ?>"><?php echo e($transferpromotion->reason); ?>

                                   </option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Promotion">Promotion</option>
                                   
                                    </select>
                                </div>
                                </div>
                            <div class="col-md-6">
                         <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" value="<?php echo e($transferpromotion->date); ?>"class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div> 
                        </div>
                    <div class="col-md-6">
                    <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark" value="<?php echo e($transferpromotion->remark); ?>"><?php echo e($transferpromotion->remark); ?></textarea>                            
                        </div> 
                       </div>
                            </div>                                                                               
                                <a href="/transferpromotion" class="btn btn-danger btn-sm">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    update
                                </button>                                                                              
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