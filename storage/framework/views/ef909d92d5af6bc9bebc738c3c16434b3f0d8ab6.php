<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >List</a></li>
                            <li class="list-group-item"><a href="#" >SMS</a></li>
                            <li class="list-group-item"><a href="#" >Email</a></li>
                            <li class="list-group-item"><a href="home" >Home</a></li>
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Notification</li>
            </ol>
            <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('close-role')): ?>                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-role')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <?php endif; ?>

                    
                    <a href="/msg-templete/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                    
                
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Msg Templete</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                        <?php $__currentLoopData = $msg_templetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg_templete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($msg_templete->name); ?></td>
                            <td><a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#" data-id="<?php echo e($msg_templete->id); ?>"><i class="fa fa-info-circle"></i></a></td>
                            <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#" data-id="<?php echo e($msg_templete->id); ?>"><i class="fa fa-edit"></i></a></td>
                           
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                   
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