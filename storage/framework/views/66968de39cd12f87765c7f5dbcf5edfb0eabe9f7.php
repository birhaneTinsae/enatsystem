<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Notification</h5>
                <p class="panel-text">For any tasks that need any form of information transmittion</p>
                <a href="sms-password-notification" class="btn btn-primary">Notification</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Vehicle Managment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional</p>
                <a href="#" class="btn btn-primary">VMS</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Foreign Currency</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="fcy" class="btn btn-primary">FCY</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Fixed Asset</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="fixed-asset" class="btn btn-primary">Fixed Asset</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Human Resource</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="hr" class="btn btn-primary">HR</a>
                </div>
            </div>
        </div>
       
    </div>
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-sms')): ?>
        <div class="col-md-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Notification</div>
                <div class="panel-body">
                <p class="panel-text">For any tasks that need any form of information transmittion</p>
                <a href="sms-password-notification" class="btn btn-primary btn-block">Notification</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-vms')): ?>
        <div class="col-md-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Vehicle Managment</div>
                <div class="panel-body">
                <p class="panel-text">With supporting text below as a natural lead-in to additional</p>
                <a href="#" class="btn btn-primary btn-block">VMS</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-fcy')): ?>
        <div class="col-md-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Foreign Currency</div>
                <div class="panel-body">
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="fcy" class="btn btn-primary btn-block">FCY</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-fam')): ?>
        <div class="col-md-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Fixed Asset</div>
                <div class="panel-body">
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="fixed-asset" class="btn btn-primary btn-block">Fixed Asset</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-hr')): ?>
        <div class="col-md-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Human Resource</div>
                <div class="panel-body">
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="hr" class="btn btn-primary btn-block">HR</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
       
    </div>
    <!-- <div class="row">
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="sms-password-notification" class="btn btn-primary">Notification</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">VMS</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">FCY</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Fixed Asset</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-body">
                <h5 class="panel-title">Special title treatment</h5>
                <p class="panel-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">HR</a>
                </div>
            </div>
        </div>
       
    </div>
    </div> -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>