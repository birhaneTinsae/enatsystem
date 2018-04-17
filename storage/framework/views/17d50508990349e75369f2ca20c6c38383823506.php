<?php $__env->startSection('sidebar'); ?>
                        <!-- <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="/fixed-asset" >PPE</a></li>
                            <li class="list-group-item"><a href="/asset-category" >Asset Item</a></li>
                            <li class="list-group-item"><a href="/asset" >Asset </a></li>
                            <li class="list-group-item"><a href="#" >Additional Cost</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>  
                <li> <a href="/fixed-asset">FAM</a></li>
                <li class="active">Disposed  Assets</li>                                                         
            </ol>
              <form action="searchdisposedassets" method="get">
                <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="queryemp" name="queryemp" placeholder="Search Disposed Assets" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon">
                    <button type="submit" class="fa fa-search">  </button>                  
                    </span>
                </div>
                </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Disposed Asset
                    <!-- <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                         Close</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         Update</a>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                         Delete</a> -->
                    <!-- <a href="/asset/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                         New</a> -->
                </div>

                <div class="panel-body">
                <?php if($assets->isNotEmpty()): ?>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset Name</th>
                            <th>Disposal date</th>
                            <th>Remark</th>
                            <!-- <th>Detail</th> -->
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($asset->Asset->asset_name); ?></td>
                            <td><?php echo e($asset->effective_date); ?></td>
                            <td><?php echo e($asset->remarks); ?></td>
                            <!-- <td><a href="/asset/<?php echo e($asset->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a></td> -->
                            <td><a href="<?php echo e(route('dispose.edit', $asset->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <?php else: ?>
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4">ASSET Empty</h1>
                      <p class="lead">No ASSET yet.</p>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>