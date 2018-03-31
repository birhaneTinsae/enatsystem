<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <!-- <li class="list-group-item"><a href="hr" >Employee List</a></li>
                             <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="#" >Leave</a></li>
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            <li class="list-group-item"><a href="role" >Role</a></li> -->
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>         
                <li><a href="/hr">HR</a></li>                     
                <li class="active">TransferPromotion Request</li>
            </ol>
        <form action="searchtransferpromotionrequest" method="get">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="queryemp" name="queryemp" placeholder="Search Employee" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon">
                    <button type="submit" class="fa fa-search">  </button>                  
                    </span>
                </div>
                </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Employees Transfer/Promotion Request Records
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('close-role')): ?>                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Transferpromotionrequest::class)): ?>
                    <a href="transferpromotionrequest/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    <?php endif; ?>                                   
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>
                    <?php endif; ?>
                    <?php if(session('delete_status')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('delete_status')); ?>

                        </div>
                    <?php endif; ?>                    
                    <?php if($Result->isNotEmpty()): ?>
                    <table class="table table-striped">
                        <thead >
                            <tr>                                                           
                                <th>Full name</th>
                                <th>From Job Position</th>
                                <th>To Job Position</th>
                                <!-- <th>From Branch</th>
                                <th>To Branch</th> -->
                                <!-- <th>Salary</th>    -->
                                <th>Detail</th>                             
                                <!-- <th>Date</th>
                                <th>Reason</th>                                                                  
                                <th> Remark</th>                                                                                            -->
                                <th>Edit</th>
                                <th>Close</th> 
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                            $j =0
                         ?>  
                            <?php $__currentLoopData = $Result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                            <tr>                                
                                <td><?php echo e($employee->Employee->User->name); ?></td>                                                                                    
                                 <?php for($i = $j; $i <=$j; $i++): ?>                                                                        
                                <td><?php echo e($FromJob[$j]); ?></td>                                                                                                                     
                                <?php endfor; ?>                                                                                                                                                 
                            
                                  <?php for($i = $j; $i <=$j; $i++): ?> 
                                <td><?php echo e($ToJob[$i]); ?></td> 
                                <?php endfor; ?>
                                 <!-- <?php for($i = $j; $i <=$j; $i++): ?>                                                                                                                                                                                             
                                <td><?php echo e($FromBranch[$i]); ?></td>
                                  <?php endfor; ?>                                 
                                  <?php for($i = $j; $i <=$j; $i++): ?> 
                                <td><?php echo e($ToBranch[$i]); ?></td>   
                                 <?php endfor; ?>                                                                                                                                                                                 -->
                                <!-- <td><?php echo e($employee->new_salary); ?></td>                                -->
                                <!-- <td><?php echo e($employee->date); ?></td>
                                <td><?php echo e($employee->reason); ?></td>
                                <td><?php echo e($employee->remark); ?></td>                                                                                             -->
                                
                                <td>
                                 <a href="<?php echo e(route('transferpromotionrequest.show', $employee->id)); ?>" class="btn-success btn-sm">
                                 <i class="fa fa-info-circle"></i> </a>
                                 </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',App\Transferpromotionrequest::class)): ?>
                                <td>                                
                                <a href="<?php echo e(route('transferpromotionrequest.edit', $employee->id)); ?>" class="btn-warning btn-sm" >
                                <i class="fa fa-edit"></i></a></td>
                                <?php endif; ?>  
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',App\Transferpromotionrequest::class)): ?>
                                  <td>
                                  	<form action="/transferpromotionrequest/<?php echo e($employee->id); ?>" method="POST">
                    <?php echo e(method_field ('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>		
                                 <button class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>		                                                    			
		</form>
                                  </td>  
                                  <?php endif; ?>
                               
		
	
		

                            </tr>   
                                  <?php
                            $j =$j+1
                            
                         ?>    

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                
                        </tbody>
                    </table>
                      <?php echo e($Result->links()); ?>

 
                  <?php else: ?>
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4"> Record Empty</h1>
                      <p class="lead">No Records yet.</p>
                    </div>
                  </div>
                <?php endif; ?>                  
                </div>  
                   <div class="panel-footer">
                    <!-- <div class="row">
                        <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                        <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                    </div> -->
                </div>             
            </div>
        </div>
    </div>
</div>

                                        
<div class="modal modal-danger fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="<?php echo e(route('transferpromotionrequest.destroy','test')); ?>" method="post">
      		<?php echo e(method_field('delete')); ?>

      		<?php echo e(csrf_field()); ?>

	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="rowid" id="rowid" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>