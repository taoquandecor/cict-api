<table>
    <tbody>
    <tr>
        <td><b><?php echo e(__("Execution date/time")); ?></b></td>
        <td><?php echo e(now()); ?></td>
    </tr>
    <?php $__currentLoopData = $Parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><b><?php echo e($key); ?></b></td>
            <td><?php echo e($value); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php  ?>
