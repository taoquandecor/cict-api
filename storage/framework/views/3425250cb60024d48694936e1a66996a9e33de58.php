<table>
    <thead>
    <tr>
        <?php $__currentLoopData = $Header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th style="border:1px solid black"><b><?php echo e($h); ?></b></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $ListData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php for($i = 0; $data = array_values((array)$data), $length = count($data), $i < $length; $i++): ?>
                <td><?php echo e($data[$i]); ?></td>
            <?php endfor; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php  ?>
