<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="/fixed-asset" >PPE</a></li>
                            <li class="list-group-item"><a href="/asset-category" >Asset Item</a></li>
                            <li class="list-group-item"><a href="/asset" >Asset </a></li>
                            <li class="list-group-item"><a href="#" >Additional Cost</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>  
                <li> <a href="/fixed-asset">FAM</a></li>
                <li class="active">New Asset</li>
                             
                            
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Asset
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                         Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                         Delete</a> -->
                    <a href="/fixed-asset/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                         New</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Asset Name</label>
                                <input type="text" name="" id="" class="form-control" value="<?php echo e($asset->asset_name); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Purchased Date</label>
                                <input type="text" name="" id="" class="form-control" value="<?php echo e($asset->purchase_date); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Gross Purchase Amount</label>
                                <input type="text" name="" id="" class="form-control" value="<?php echo e($asset->gross_purchase_amount); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Useful Life</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset->gross_purchase_amount); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Residual Value</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset->gross_purchase_amount); ?>" readonly>
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset->tag); ?>" readonly>
                            </div>
                             <div class="form-group">
                                <label for="">Asset Category</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset_category->p_p_e_type); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Asset Sub Category</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset->asset_item->name); ?>" readonly>
                            </div>
                               <div class="form-group">
                                <label for="">Custudian</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($custudian_name); ?>

                                "  readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Cost Center</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($branch->branch_name); ?>

                                "  readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Remarks</label>
                                <input type="text" name="" id="" class="form-control"  value="<?php echo e($asset->remarks); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                <?php if($asset->disposed): ?>
                                    <label><input type="checkbox" name="disposed" checked>Disposed</label>
                                <?php else: ?>
                                    <label><input type="checkbox" name="disposed">Disposed</label>
                                <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <a href="/additional-cost/<?php echo e($asset->id); ?>" class="btn btn-link"><kbd>Additional Cost</kbd></a>
                                <a href="/impairment/<?php echo e($asset->id); ?>" class="btn btn-link"><kbd>Impairment</kbd></a>

                                 <a href="/transfer/<?php echo e($asset->id); ?>" class="btn btn-link"><kbd>Transfer</kbd></a>
                                  <a href="/disposal/<?php echo e($asset->id); ?>" class="btn btn-link"><kbd>Disposal</kbd></a>
                            </div>
                        </div>
                    </div>
                    <h4>Additional Cost</h4>
                    <?php if($additional_costs->isNotEmpty()): ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Value</th>
                                <th>Remarks</th>
                                <th>Effective Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $additional_costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additional_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($additional_cost->added_cost); ?></td>
                                <td><?php echo e($additional_cost->remarks); ?></td>
                                <td><?php echo e($additional_cost->effective_date); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        <strong>No Additional Value</strong> 
                    </div>
                   
                    <?php endif; ?>
                    <h4>Impairment</h4>
                    <?php if($impairments->isNotEmpty()): ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Old Value</th>
                                <th>New Value</th>
                                <th>Effective Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $impairments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $impairment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($impairment->current_value); ?></td>
                                <td><?php echo e($impairment->new_value); ?></td>
                                <td><?php echo e($impairment->effective_date); ?></td>
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        <strong> No Impairment Value</strong> 
                    </div>
                   
                    <?php endif; ?>
                    <h4>Disposal</h4>
                     <?php if($Disposal->isNotEmpty()): ?>
                     <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>                                
                                <th>Remark</th>
                                <th>Effective Date</th>
                                <th>Edit</th>
                                 <th>Close</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $Disposal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disposed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($disposed->remarks); ?></td>                                
                                <td><?php echo e($disposed->effective_date); ?></td>
                                 <td><a href="<?php echo e(route('dispose.edit', $disposed->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                  <td>
                                  	<form action="/dispose/<?php echo e($disposed->id); ?>" method="POST">
                                 <?php echo e(method_field ('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>		
                                 <button class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>		                                                    			
		                        </form>
                                  </td> 
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                    </table>
                      <?php else: ?>
                    <div class="alert alert-warning">
                        <strong>Not Disposed</strong> 
                    </div>
                    <?php endif; ?>
                              <h4>Transfer</h4>
                     <?php if($transfer->isNotEmpty()): ?>
                     <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>     
                                <th>From Employee</th>   
                                <th>To Employee</th>                        
                                <th>From Cost Center</th>
                                <th>To Cost Center</th>
                                <th>Remark</th>
                                <th>Effective Date</th>
                                <th>Edit</th>
                                 <th>Close</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $j =0
                         ?> 
                        <?php $__currentLoopData = $transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                               
                                 <?php for($i = $j; $i <=$j; $i++): ?>                                                                        
                                <td><?php echo e($from_employee[$j]); ?></td>                                                                                                                     
                                <?php endfor; ?> 
                                <?php for($i = $j; $i <=$j; $i++): ?>                                                                        
                                <td><?php echo e($to_employee[$j]); ?></td>                                                                                                                     
                                <?php endfor; ?> 
                                  <?php for($i = $j; $i <=$j; $i++): ?>                                                                        
                                <td><?php echo e($FromBranch[$j]); ?></td>                                                                                                                     
                                <?php endfor; ?> 
                                  <?php for($i = $j; $i <=$j; $i++): ?>                                                                        
                                <td><?php echo e($ToBranch[$j]); ?></td>                                                                                                                     
                                <?php endfor; ?>  
                                <td><?php echo e($transfers->remarks); ?></td>                              
                                <td><?php echo e($transfers->effective_date); ?></td>
                                 <td><a href="<?php echo e(route('transfers.edit', $transfers->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                  <td>
                                  	<form action="/dispose/<?php echo e($transfers->id); ?>" method="POST">
                                 <?php echo e(method_field ('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>		
                                 <button class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>		                                                    			
		                        </form>
                                  </td> 
                            </tr>
                            <?php
                            $j =$j+1
                            
                         ?>     
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                    </table>
                      <?php else: ?>
                    <div class="alert alert-warning">
                        <strong>Not Transfered</strong> 
                    </div>
                   
                    <?php endif; ?>
                
                    <h4>Depreciation Schedule</h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Depreciation Dates</th>
                                <th>Depreciation Values</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo e(now()->addYear(1)->toDateString()); ?></td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?php echo e(now()->addYear(2)->toDateString()); ?></td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?php echo e(now()->addYear(3)->toDateString()); ?></td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><?php echo e(now()->addYear(4)->toDateString()); ?></td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
            
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>