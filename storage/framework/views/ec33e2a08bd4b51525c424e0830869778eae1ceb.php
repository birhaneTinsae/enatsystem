<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    } else {
        document.getElementById('ifYes').style.display = 'none';
    }
}

</script>
<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <!-- <li class="list-group-item"><a href="#" >Request List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="" >Home</a></li> -->
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
                <li><a href="/actingemployee">Home</a></li>               
                <li><a href="/actingemployee">Acting Employee</a></li>               
                <li class="active"> Acting Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Update Records                  
                </div>
                <div class="panel-body">                                  
                 <form method="POST" action="/actingemployee/<?php echo e($ActingEmployee->id); ?>">
                         <?php echo e(method_field ('PUT')); ?>

                        <?php echo e(csrf_field()); ?>


                            <div class="row">
                                <div class="col-md-6">
                                     <!-- <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control"  list="actemployees-list"
                                         id="new-employee" name="new_employee" id="<?php echo e($ActingEmployee->employee_id); ?>" placeholder="Employee" value=<?php echo e($ActingEmployee->employee_id); ?>>                            
                                    <datalist id="actemployees-list"> </datalist>
                                    <input type="hidden" name="emp_id" value="<?php echo e($ActingEmployee->employee_id); ?>">
                                </div>    
                                    <div class="col-md-6"> -->
                                    <div class="form-group">
                                    <label for="employee"> Employee name</label>
                                   
                                    <select class="form-control" name="employee" id="employee">
                                     <?php echo e($employee=App\Employee::all()); ?>

                                    <option value="<?php echo e($ActingEmployee->employee_id); ?>"><?php echo e($emp_name); ?>

                                   </option>
                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>    
                                                             <div class="form-group">
                                    <label for="employee"> Replaced by</label>
                                   
                                    <select class="form-control" name="replaced_by" id="replaced_by">
                                     <?php echo e($employee=App\Employee::all()); ?>

                                    <option value="<?php echo e($ActingEmployee->replaced_by); ?>"><?php echo e($replaced_by); ?>

                                   </option>
                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                           <?php if($errors->has('replaced_by')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('replaced_by')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div>                         
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" value="<?php echo e($ActingEmployee->start_date); ?>" class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div>   
                          <?php if($ActingEmployee->notification==0): ?>                  
                 <label> Is End date known ?  </label>          
                  Yes
                <input type="radio" checked name="yesno" value="Yes" id="yesCheck"/>                
                 </span>

                 <span>
                 No
        <input type="radio" value="No"  name="yesno" id="noCheck"/>
        </span>
                   <?php else: ?>
                      Yes
                <input type="radio" value="Yes" name="yesno" id="yesCheck"/>                
                 </span>
                        <span>
                 No
        <input type="radio" value="No" checked name="yesno" id="noCheck"/>
        </span>
                <?php endif; ?>
        
        <div>
            <label for="end_date">End Date</label>
            <input type="date" value="<?php echo e($ActingEmployee->end_date); ?>" class="form-control col-xs-3" id="end_date" name="end_date"  >
        </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="in_place_of_employee"> In Place of Employee</label>
                                   
                                    <select class="form-control" name="in_place_of_employee" id="in_place_of_employee">
                                     <?php echo e($employee=App\Employee::all()); ?>

                                    <option value="<?php echo e($ActingEmployee->in_place_of); ?>"><?php echo e($inplace_of); ?>

                                   </option>
                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                           <?php if($errors->has('in_place_of_employee')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('in_place_of_employee')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div>    
                                     <div class="form-group">
                                    <label for="job_position">Acting Position</label>
                                    
                                    <select class="form-control" name="acting_job_id" id="acting_job_id" >
                                     <option value="<?php echo e($ActingEmployee->acting_job_position_id); ?>"><?php echo e($to_job); ?></option>
                                        <?php $__currentLoopData = $job_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$job_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($job_position); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                     <?php if($errors->has('acting_job_id')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('acting_job_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div>                 
                             </div>

                                                                               
                                       <div class="col-md-6">
                                        <div class="form-group">
                                    <label for="job_position">Acting For Branch/Department</label>                                   
                                    <select class="form-control" name="acting_branch_id" id="branch_name">
                                     <?php echo e($branch=App\Branch::all()); ?>

                                    <option value="<?php echo e($ActingEmployee->acting_branch_id); ?>"><?php echo e($to_branch); ?>

                                   </option>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>
                                </div>
                                <div class="col-md-6">
                                
                                 <div class="form-group">
                                    <label for="status">Status</label>
                                    <select  class="form-control" name="status" id="status" >
                                     <?php if($ActingEmployee->status==1): ?>                                      
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>
                                      <?php else: ?>
                                    <option value="0">Terminated</option>
                                    <option value="1">Active</option>
                                    <?php endif; ?>
                                    </select>
                                </div>
                                </div>
                                  <div class="col-md-6">
                            <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark" value="<?php echo e($ActingEmployee->remark); ?>">Remark</textarea>                            
                        </div> 
                       </div>
                       
                            </div>                                                                  
                      <a href="/actingemployee" class="btn btn-danger btn-sm">Cancel</a>
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