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
                              <div class="form-group">
                            <label for="base">Base </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="base" name="base" required value="<?php echo e(old('base')); ?>"  >  
                            <?php if($errors->has('base')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('base')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>   

                           <div class="form-group">
                            <label for="base">Step1 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step1" name="step1" required value="<?php echo e(old('step1')); ?>"  >  
                            <?php if($errors->has('step1')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step1')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>                       

                           <div class="form-group">
                            <label for="Phone no">Step3 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step3" name="step3" required value="<?php echo e(old('step3')); ?>"  >  
                            <?php if($errors->has('step3')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step3')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>

                           <div class="form-group">
                            <label for="Phone no">Step5 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step5" name="step5" required value="<?php echo e(old('step5')); ?>"  >  
                            <?php if($errors->has('step5')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step5')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>

                           <div class="form-group">
                            <label for="Phone no">Step7 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step7" name="step7" required value="<?php echo e(old('step7')); ?>"  >  
                            <?php if($errors->has('step7')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step7')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step9 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step9" name="step9" required value="<?php echo e(old('step9')); ?>"  >  
                            <?php if($errors->has('step9')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step9')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>
                            </div>
                            <div class="col-md-6">
                                       <div class="form-group <?php echo e($errors->has('grade') ? ' has-error' : ''); ?>">
                                     <label for="grade">Grade</label>
                                     <input type="text" required class="form-control" id="grade" name="grade" placeholder="Job Grade" >
                                    <?php if($errors->has('grade')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('grade')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step2 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step2" name="step2" required value="<?php echo e(old('step2')); ?>"  >  
                            <?php if($errors->has('step2')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step2')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>

                            <div class="form-group">
                            <label for="Phone no">Step4 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step4" name="step4" required value="<?php echo e(old('step4')); ?>"  >  
                            <?php if($errors->has('step4')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step4')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>
                            <div class="form-group">
                            <label for="Phone no">Step6 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step6" name="step6" required value="<?php echo e(old('step6')); ?>"  >  
                            <?php if($errors->has('step6')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step6')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>
                            <div class="form-group">
                            <label for="Phone no">Step8 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step8" name="step8" required value="<?php echo e(old('step8')); ?>"  >  
                            <?php if($errors->has('step8')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step8')); ?></strong>
                                    </span>
                                    <?php endif; ?>                               
                        </div>
                            <div class="form-group">
                            <label for="Phone no">Step10 </label>
                            <input type="text" class="form-control" 
                            pattern="\d*" id="step10" name="step10" required value="<?php echo e(old('step10')); ?>"  >  
                            <?php if($errors->has('step10')): ?>
                                    <span class="help-block">
                                        <strong  class="text-danger"><?php echo e($errors->first('step10')); ?></strong>
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