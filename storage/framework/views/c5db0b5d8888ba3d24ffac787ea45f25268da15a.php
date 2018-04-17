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

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sms')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    <?php endif; ?>
                
                </div>

                <div class="panel-body">
               

                    <form action="/sms-password-notification/send" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch">Branch</label>
                                <select id="branch" class="form-control" name="branch">
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($branch); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee">Employee</label>
                                <select  id="employee" class="form-control" name="employee" >
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                        
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone-no">Phone Number</label>
                                <input type="text" class="form-control" id="phone-no" name="phone_no" placeholder="0911******" readonly>
                            </div>
                         </div>
                         <div class="col-md-6">
                               <label for="notification-new-password">New Password</label>
                            <div class="input-group">
                                <!--  -->
                                <input type="text" class="form-control" id="notification-new-password" name="password" placeholder="password" >
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="password_generate">
                                    <i class="fa fa-cogs"></i>
                                    </button>
                                </div>
                            </div>
                         </div>
                     </div>
                       
                       
                        <div class="form-group">
                            <label for="msg-templete">Message Templete</label>
                            <select name="msg-templete"  class="form-control" id="msg-templete" >
                            <option value="">--Select Templete--</option>
                            <?php $__currentLoopData = $msg_templetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$msg_templete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>"><?php echo e($msg_templete); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="msg">Message</label>
                            <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-md">Send</button>
                    </form>
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