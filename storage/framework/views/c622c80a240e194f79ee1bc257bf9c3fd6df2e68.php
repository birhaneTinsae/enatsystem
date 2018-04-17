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
                <li><a href="/home">Home</a></li>               
                <li class="active">Notification</li>
            </ol>
            <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">SMS Password Notification
                                  
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   

                    
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a>
                   

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-role')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sms')): ?>
                    <a href="/sms-password-notification/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    <?php endif; ?>
                
                </div>

                <div class="panel-body">
                  <?php if($notifications->isNotEmpty()): ?>
                    <table class="table table-striped">
                        <thead>
                       
                            <tr>
                                <th>#</th>
                                <th>Message</th>
                                <th>Sender</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e(str_limit($notification->message,30)); ?></td>
                                <td><?php echo e($notification->sender); ?></td>
                                <td><?php echo e($notification->created_at->toDayDateTimeString()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                  <?php else: ?>
                  <div class="jumbotron ">
                    <div class="container">
                      <h1 class="display-4">Notification Empty</h1>
                      <p class="lead">No Notification yet.</p>
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