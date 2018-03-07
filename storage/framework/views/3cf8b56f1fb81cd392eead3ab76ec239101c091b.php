<?php $__env->startComponent('mail::message'); ?>
# Introduction

<?php $__env->startComponent('mail::panel'); ?>
The following table show list of employees whoes acting period reaches 5 months and above.
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::table'); ?>
| Employee           | Branch        | Position                            | From Date | Duration        |
|:------------------:|:-------------:|:-----------------------------------:|:---------:|:---------------:|
<?php $__currentLoopData = $actingEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aE): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| <?php echo e($aE->employee->user->name); ?> | <?php echo e($aE->employee->user->branch_id); ?>          | <?php echo e($aE->job_position->name); ?>  | <?php echo e($aE->from_date->toFormattedDateString()); ?>| <?php echo e($aE->from_date->diffForHumans()); ?> |

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Show Detail
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
