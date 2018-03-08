<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style>
      
        /* Media Queries ------------------------------ */
     /*    @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        } */
#employees {
    border-collapse: collapse;
    width: 100%;
    height:50px
}

#employees td, #employees th {
    text-align: left;
    padding: 8px;
}

#employees tr:nth-child(even){background-color: #f2f2f2;}

#employees tr:hover {background-color: #ddd;}

#employees th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4682B4;
    color: white;
}
#p1{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
     font-family: Arial, Helvetica, sans-serif;
}
    </style>
</head>

<?php ($style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',    
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    'anchor' => 'color: #3869D4;',
    'email-body_table'=>'width: 10%; margin: 0; padding: 0;background-color: #f5f5f5;font:15px arial, sans-serif;',
    'email-body_table-thead'=>'border-collapse: collapse;border-spacing:0;width: 100%;
    border: 1px solid #ddd;text-align: left;  padding: 16px;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
        background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
        text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
]); ?>

<?php ($fontFaimly = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'); ?>

<body style="<?php echo e($style['body']); ?>">
    <table  width="100%" cellpadding="0" cellspacing="0">

        <tr>
            <td style="<?php echo e($style['email-wrapper']); ?>" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="<?php echo e($style['email-masthead']); ?>">
                            <a style="<?php echo e($fontFaimly); ?> <?php echo e($style['email-masthead_name']); ?>" href="<?php echo e(url('/')); ?>" target="_blank">
                               Enat Bank
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="<?php echo e($style['email-body']); ?>" width="100%">
                            <table style="<?php echo e($style['email-body_inner']); ?>" align="center" width="100" cellpadding="0" cellspacing="0"
                             >
                                <tr>
                                    <td style="<?php echo e($fontFaimly); ?> <?php echo e($style['email-body_cell']); ?>">
                                        <!-- Greeting -->
                                          
                                        <h1 style="<?php echo e($style['header-1']); ?>">
                                            <?php if($level == 'error'): ?>
                                                Whoops!
                                            <?php else: ?>                                                
                                                      <br><br>
                                              
                                                        </h1>
                                     
                       
                        <div >
                        <table >
                        <thead >
                <p id="p1">
                 List Of Employees who serves more than five month as Acting
</p>
                 <table id="employees">
                            <tr>                    
                                
                                <th>Employee name</th>
                                <th>Permanent Position</th>
                                <th>Acting Position</th>
                                <th>Home Branch</th>
                                <th>Temporary Branch</th>
                                <th>Starting Date</th>
                                <th>End date</th>
                                  <th>Duration</th>                    
                            </tr>                        
      <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aemp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
	<tr >
		
		<td><span>
        <?php echo e($aemp->full_name); ?>

		</span></td>
		
		<td><span>
			   <?php echo e($aemp->job_name); ?>


		</span></td>
    <td><span>
        	<?php echo e($aemp->acting_job_position_name); ?>

			

		</span></td>
        <?php echo e($aemp->branch_name); ?>

        <td><span>
		

		</span></td>
        <td><span>
			<?php echo e($aemp->acting_branch_name); ?>


		</span></td>
        <td><span>
			<?php echo e($aemp->start_date); ?>


		</span></td>
        <td><span>
			<?php echo e($aemp->end_date); ?>


		</span></td>
        <td><span>
			About <?php echo e($aemp->duration); ?> Month

		</span></td>
    
    </tr>        
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<br><br>
For detail information click here
    <a  href="http://localhost:8000/actingemployee/" target="_blank">
                    More
                                                            </a>
</div>
                                            <?php endif; ?>
                                

                                        <!-- Intro -->
                                        <?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p style="<?php echo e($style['paragraph']); ?>">
                                                <?php echo e($line); ?>

                                            </p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <!-- Action Button -->
                                        <?php if(isset($actionText)): ?>
                                            <table style="<?php echo e($style['body_action']); ?>" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="center">
                                                        <?php
                                                            switch ($level) {
                                                                case 'success':
                                                                    $actionColor = 'button--green';
                                                                    break;
                                                                case 'error':
                                                                    $actionColor = 'button--red';
                                                                    break;
                                                                default:
                                                                    $actionColor = 'button--blue';
                                                            }
                                                        ?>

                                                        <a href="<?php echo e($actionUrl); ?>"
                                                            style="<?php echo e($fontFaimly); ?> <?php echo e($style['button']); ?> <?php echo e($style[$actionColor]); ?>"
                                                            class="button"
                                                            target="_blank">
                                                            <?php echo e($actionText); ?>

                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>

                                        <!-- Outro -->
                                        <?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p style="<?php echo e($style['paragraph']); ?>">
                                                <?php echo e($line); ?>

                                            </p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <!-- Salutation -->
                                        <p style="<?php echo e($style['paragraph']); ?>">
                                            Regards,<br>ISD
                                        </p>

                                        <!-- Sub Copy -->
                                        <?php if(isset($actionText)): ?>
                                            <table style="<?php echo e($style['body_sub']); ?>">
                                                <tr>
                                                    <td style="<?php echo e($fontFaimly); ?>">
                                                        <p style="<?php echo e($style['paragraph-sub']); ?>">
                                                            If you’re having trouble clicking the  http://localhost:8000/actingemployee/  button,
                                                            copy and paste the URL below into your web browser:
                                                        </p>

                                                        <p style="<?php echo e($style['paragraph-sub']); ?>">
                                                            <a style="<?php echo e($style['anchor']); ?>" href="<?php echo e($actionUrl); ?>" target="_blank">
                                                                <?php echo e($actionUrl); ?>

                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="<?php echo e($style['email-footer']); ?>" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="<?php echo e($fontFaimly); ?> <?php echo e($style['email-footer_cell']); ?>">
                                        <p style="<?php echo e($style['paragraph-sub']); ?>">
                                            &copy; <?php echo e(date('Y')); ?>

                                            <a style="<?php echo e($style['anchor']); ?>" href="<?php echo e(url('/')); ?>" target="_blank">Information System Department</a>.
                                            All rights reserved.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>