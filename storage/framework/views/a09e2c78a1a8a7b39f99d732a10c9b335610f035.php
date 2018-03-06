<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Branch List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >Home</a></li>
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">Branch</li>
            </ol>
            <?php if(session('success')!=null): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">Branch
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

                   
                    <a href="/branch/create" class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        New</a>
                   
                
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/branch">
                     <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                           
                            <div class="form-group">
                                <label for="branch_code">Branch Code</label>
                                <input type="text" class="form-control" id="branch_code" name="branch_code"  placeholder="Branch code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="branch_name">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name"  placeholder="Branch name">
                            </div>
                        </div>
                    </div>
                    
                       
                        

                        <button type="submit" class="btn btn-success">Save</button>
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