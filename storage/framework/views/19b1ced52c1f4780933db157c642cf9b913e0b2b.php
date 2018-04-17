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
                    <form action="/asset" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Asset Name</label>
                                    <input type="text" name="asset_name" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Purchased Date</label>
                                    <input type="date" name="purchased_date" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Gross Purchase Amount</label>
                                    <input type="number" name="gross_purchase_amount" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Useful Life (Overrite)</label>
                                    <input type="number" name="useful_life" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Residual Value (Overrite)</label>
                                    <input type="number" name="residual_value" id="" class="form-control">
                                </div>
                                  <div class="form-group">
                                    <label for="">GR Number</label>
                                    <input type="text" name="gr_number" id="" class="form-control">
                                </div>

                                  <div class="form-group">
                                    <label for="">SRV </label>
                                    <input type="text" name="srv" id="" class="form-control">
                                </div>

                                  <!-- <div class="form-group">
                                    <label for="">Book Value </label>
                                    <input type="text" name="srv" id="" class="form-control">
                                </div> -->
                                  <div class="form-group">
                                    <label for="">Serial number </label>
                                    <input type="text" name="serial_no" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tag</label>
                                    <input type="text" name="tag" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                
                                      <div class="form-group">
                                     <label for="">Asset Category</label>
                                    <select type="select" name="asset_category" id="" class="form-control" >
                                   <option value="">----- Select Asset  Category here -----</option>
                                   <?php echo e($asset_categories=App\PPECategory::all()); ?>  
                                    <?php $__currentLoopData = $asset_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->p_p_e_type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                        <label for="">Asset Sub Category</label>
                                    <select type="select" name="asset_sub_category" id="" class="form-control" >
                                   <option value="" >----- Select Asset Sub Category here -----</option>
                                    <?php echo e($asset_categories=App\AssetItem::all()); ?> 
                                    <?php $__currentLoopData = $asset_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sub_category->id); ?>"><?php echo e($sub_category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                      <div class="form-group">
                                    <label for="">Custudian</label>
                                     <select type="select" name="custudian" id="" class="form-control" >
                                     <option value="">----- Select Custudian here -----
                                     </option>
                                      <?php
                                           $j =0
                                         ?> 
                                    <?php $__currentLoopData = $Employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                                        <option value="<?php echo e($emp->id); ?>">
                                         <?php for($i=$j; $i <=$j; $i++): ?> 
                                            <?php echo e($emp_name[$i]); ?>

                                            <?php endfor; ?>                                       
                                        </option>   
                                         <?php
                                     $j =$j+1
                                     ?>                                                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                    
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Cost Center</label>
                                    <select type="select" name="cost_center" id="" class="form-control" >
                                    <option value="">----- Select Cost Center here -----
                                     </option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <textarea name="remarks" id="" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="disposed">Disposed</label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-success btn-block">
                                </div>
                                
                            </div>
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