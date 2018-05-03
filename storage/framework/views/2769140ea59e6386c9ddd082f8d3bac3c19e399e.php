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
                <div class="panel-heading">Update record
                    
                </div>

                <div class="panel-body">
                                       
                    <form method="POST" action="/hr/<?php echo e($employee->id); ?>" >
                            <?php echo e(csrf_field()); ?>

                          <?php echo method_field('PUT'); ?>
                                 <div class="row">
                            
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="employee">Employee name</label>                                        
                                        <input type="text" class="form-control" required id="new-employee"
                                         name="full_name" placeholder="Employee" value="<?php echo e($employee->full_name); ?>">                                                                                             
                                </div>

                            <div class="form-group">
                                    <label for="status">Gender</label>
                                    <select  class="form-control" name="gender" id="gender" >
                                    <option value="<?php echo e($employee->gender); ?>"><?php echo e($employee->gender); ?></option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                   
                                    </select>
                                      <?php if($errors->has('gender')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('gender')); ?></strong>
                                    </span>
                                    <?php endif; ?> 
                                </div>
                             
                         <div class="form-group">
                            <label for="employement_date">Employement Date</label>
                            <input type="date" class="form-control" 
                            id="employement_date" name="employement_date" value="<?php echo e($employee->employement_date); ?>" >                                
                              <?php if($errors->has('employement_date')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('employement_date')); ?></strong>
                                    </span>
                                    <?php endif; ?> 
                        </div>

                          <div class="form-group">
                                    <label for="operation_location">Operation Location</label>
                                    <select  class="form-control" name="operation_location" id="operation_location" >
                                    <option value="<?php echo e($employee->operation_location); ?>"><?php echo e($employee->operation_location); ?></option>
                                    <option value="Head_office" <?php if(old('operation_location') == "Head_office"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Head_Office</option>
                                    <option value="City_Branch" <?php if(old('operation_location') == "City_Branch"): ?> <?php echo e('selected'); ?> <?php endif; ?>>City_Branch</option>
                                    <option value="Outline_Branch" <?php if(old('operation_location') == "Outline_Branch"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Outline_Branch</option>                                                                       
                                    </select>
                                     <?php if($errors->has('operation_location')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('operation_location')); ?></strong>
                                    </span>
                                    <?php endif; ?>   
                                </div>

                         <div class="form-group">
                            <label for="Phone no">Phone no </label>
                            <input type="text" class="form-control"  value="<?php echo e($employee->phone_no); ?>" 
                            minlength="10" maxlength="10" pattern="\d*" id="Phone_no" name="Phone_no"  >  
                                <?php if($errors->has('Phone_no')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('Phone_no')); ?></strong>
                                    </span>
                                    <?php endif; ?>                                 
                        </div>

                        <div class="form-group">
                            <label for="email">email </label>
                            <input type="email"  value="<?php echo e($employee->email); ?>" class="form-control" id="email" name="email" 
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >  
                            <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>                                    
                        </div>
                         <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text"  value="<?php echo e($employee->city); ?>"  class="form-control"
                                            name="city" id="city">
                        </div>

                           <div class="form-group">
                                            <label for="">Woreda/Kebele</label>
                                            <input type="text"  value="<?php echo e($employee->woreda); ?>"   class="form-control" name="woreda">
                         </div>
                          <div class="form-group">
                            <label for="private_pension_no no">Private Pension no </label>
                            <input type="text" class="form-control" maxlength="10" 
                            pattern="\d*" id="private_pension_no" name="private_pension_no" value="<?php echo e($employee->private_pension_no); ?>"  >                                
                        <?php if($errors->has('id')): ?>
                                    <span class="help-block">
                                        <strong class="text-danger"><?php echo e($errors->first('private_pension_no')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                        </div>

                            <div class="form-group">
                            <label for="gov_pension_no">Gov't Pension no </label>
                            <input type="text" class="form-control"  maxlength="10" 
                            pattern="\d*" id="govt_pension_no" name="govt_pension_no" value="<?php echo e($employee->govt_pension_no); ?>" >                                
                             <?php if($errors->has('id')): ?>
                                    <span class="help-block">
                                        <strong class="text-danger"><?php echo e($errors->first('govt_pension_no')); ?></strong>
                                    </span>
                                <?php endif; ?>       
                        </div>

                         
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="employee">Employee Id</label>                                        
                                        <input type="text"   value="<?php echo e($employee->enat_id); ?>" 
                                        pattern="[E][B][-][\d]{2,}" required class="form-control" id="enat_id" name="enat_id"
                                         placeholder="eg. EB-id_no">  

                                             <?php if($errors->has('enat_id')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('enat_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>                                                                                             
                                </div>

                               <div class="form-group  <?php echo e($errors->has('job_position') ? ' has-error' : ''); ?>">
                                    <label for="job_position">Job Position</label>
                                    
                                    <select class="form-control" name="job_position_id" id="job_position_id" >
                                        <option value="<?php echo e($employee->job_position_id); ?>"><?php echo e($job_name); ?></option>
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
                                 
                                 <div class="form-group">
                                    <label for="branch_id"> Branch</label>
                                   
                                    <select class="form-control" name="branch_id" id="branch_id">
                                     <?php echo e($branch=App\Branch::all()); ?>

                                    <option value="<?php echo e($employee->branch_id); ?>"><?php echo e($branch_name); ?>

                                   </option>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->branch_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                      <?php if($errors->has('branch_id')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('branch_id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                             </div>
                                               <div class="form-group">
                                    <label for="job_position_step">Job_Position_Step</label>
                                    <select  class="form-control" name="job_position_step" id="job_position_step" >
                                    <option value="<?php echo e($employee->Job_Position_Step); ?>"><?php echo e($employee->Job_Position_Step); ?></option>
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
                                 <div class="form-group">
                            <label for="join_date">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required value="<?php echo e($employee->birth_date); ?>" >                                
                          <?php if($errors->has('birth_date')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('birth_date')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>
                                       <div class="form-group">
                                    <label for="category">Category</label>
                                    <select  class="form-control" name="category" id="category" >
                                    <option value="<?php echo e($employee->category); ?>"><?php echo e($employee->category); ?></option>
                                    <option value="C" <?php if(old('category') == "C"): ?> <?php echo e('selected'); ?> <?php endif; ?>>C</option>
                                    <option value="M" <?php if(old('category') == "M"): ?> <?php echo e('selected'); ?> <?php endif; ?>>M</option>
                                    <option value="N.C" <?php if(old('category') == "N.C"): ?> <?php echo e('selected'); ?> <?php endif; ?>>NC</option>                                   
                                    </select>
                                      <?php if($errors->has('category')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('category')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                 <div class="form-group">
                                    <label for="marital_status">Marital Status</label>
                                    <select  class="form-control" name="marital_status" id="marital_status" >
                                    <option value="<?php echo e($employee->marital_status); ?>"><?php echo e($employee->marital_status); ?></option>
                                    <option value="S"  <?php if(old('marital_status') == "S"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Single</option>
                                    <option value="M"  <?php if(old('marital_status') == "M"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Married</option>
                                    <option value="D"  <?php if(old('marital_status') == "D"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Divorsed</option>
                                    <option value="W"  <?php if(old('marital_status') == "W"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Widowed</option>
                                   
                                    </select>
                                      <?php if($errors->has('marital_status')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('marital_status')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                    <div class="form-group">
                                            <label for="">House No</label>
                                            <input type="text"  value="<?php echo e($employee->house_no); ?>" class="form-control"
                                            name="houseno" id="houseno">
                                    </div>

                                    <div class="form-group">
                            <label for="tin_no">Tin_no </label>
                            <input type="text" class="form-control" maxlength="10" 
                            pattern="\d*" id="tin_no" name="tin_no" value="<?php echo e(old('tin_no')); ?>"  >    
                              <?php if($errors->has('tin_no')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('tin_no')); ?></strong>
                                    </span>
                                    <?php endif; ?>                            
                        </div>
                             

                                 
                            </div>                                                                                                 
                        </div>
                         <a href="/hr" class="btn btn-danger btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
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