<?php $__env->startSection('sidebar'); ?>
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="" >Employee List</a></li>
                            <li class="list-group-item"><a href="actingemployee" >Acting Employee List</a></li>
                            <li class="list-group-item"><a href="transferpromotionrequest" >Employee Transfer/Position Change Request</a></li>
                            <li class="list-group-item"><a href="transfer" >Employee Transfer/Promotion </a></li>                        
                            
                            <li class="list-group-item"><a href="branch" >Branch</a></li>
                            <li class="list-group-item"><a href="job" >JOB</a></li>
                             
                            <li class="list-group-item"><a href="home" >Home</a></li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view',App\Role::class)): ?>
                            <li class="list-group-item"><a href="role" >Role</a></li>
                            <?php endif; ?>
                        </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <!--col-md-offset-1-->
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">HR</li>
            </ol>
               <form action="searchemployee" method="get">
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
                <div class="panel-heading">Human Resource
                  
                   <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-excel"></i>
                    Excel</a>
                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="far fa-file-pdf"></i>
                    Pdf</a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete')): ?>
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Employee::class)): ?>
                    <a href="hr/create" class="text-right pull-right panel-menu-item"><i class="far fa-plus-square"></i>
                        New</a>
                    <?php endif; ?>
                
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($employees->isNotEmpty()): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($employee->full_name); ?></td>
                                <td><?php echo e($employee->email); ?></td>
                              
                                <td>
                                <a href="/hr/detail/<?php echo e($employee->id); ?>" class="btn-success btn-sm">
                                 <i class="fa fa-info-circle"></i> </a>                                 
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',App\Employee::class)): ?>
                                <td>
                               <a href="<?php echo e(route('hr.edit', $employee->id)); ?>" class="btn-warning btn-sm" >
                                <i class="fa fa-edit"></i></a></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>

                    <?php echo e($employees->links()); ?>

                    <?php else: ?>
                    <div class="jumbotron ">
                        <div class="container">
                          <h1 class="display-4">Employee Empty</h1>
                          <p class="lead">No Employee yet.</p>
                        </div>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="panel-footer">
                  
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>