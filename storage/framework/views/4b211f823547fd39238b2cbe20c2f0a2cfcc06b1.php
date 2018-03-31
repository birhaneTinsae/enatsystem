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
                                  <div class="form-group">
                                    <label for="job_position">New Position</label>                                    
                                    <select class="form-control" name="job_id" id="job_id" >
                                    <?php echo e($job_positions=App\Jobposition::all()); ?>

                                    <option value="<?php echo e($transferpromotion->to_job_position); ?>"><?php echo e($to_job); ?>

                                        <?php $__currentLoopData = $job_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($job_position->id); ?>"><?php echo e($job_position->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>
                                </div>
                                
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">New Branch/Department</label>                                   
                                    <select class="form-control" name="branch_name" id="branch_name">
                                     <?php echo e($branch=App\Branch::all()); ?>

                                    <option value="<?php echo e($transferpromotion->from_job_position); ?>"><?php echo e($to_branch); ?>

                                   </option>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>
                                <div class="form-group">
                                    <label for="newsalary">New Salary</label>
                                   <input type="text" value="<?php echo e($transferpromotion->new_salary); ?>" id="newsalary" name="newsalary" class="form-control" placeholder="New Salary" >                            
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