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
                <li class="active">New Acting Employee</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Add new Acting employee                  
                </div>
                <div class="panel-body">                                  
                    <form method="POST" action="/actingemployee">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <input type="text" class="form-control" list="actemployees-list"
                                         id="new-employee" name="new_employee" placeholder="Employee">
                            
                                    <datalist id="actemployees-list"> </datalist>
                                </div>                                
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control col-xs-3" id="start_date" name="start_date"  >                            
                        </div>                     
           <label> Is End date known ?  </label>          
            Yes
        <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>
        </span>
        <span>
        No
        <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/>
        </span>
        <div id="ifYes" style="display:none">If yes, Fill:
            <label for="end_date">End Date</label>
            <input type="date" class="form-control col-xs-3" id="end_date" name="end_date"  >
        </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Acting Position</label>
                                    
                                    <select class="form-control" name="acting_job_id" id="acting_job_id" >
                                    <option>-----Select Job Position -----
                                        <?php $__currentLoopData = $job_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$job_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($job_position); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                             </div>
                                </div>
                                
                                       <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_position">Acting Branch</label>
                                   
                                    <select class="form-control" name="acting_branch_id" id="acting_branch_id">
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
                                    <label for="status">Status</label>
                                    <select  class="form-control" name="status" id="status" >
                                    <option>----Select Status----</option>
                                    <option value="1">Active</option>
                                    <option value="0">Terminated</option>
                                   
                                    </select>
                                </div>
                                </div>
                                  
                            <label for="remark">Remark</label>
                         <div class="form-group">                           
                            <textarea rows="4" cols="50" name="remark">Remark</textarea>                            
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