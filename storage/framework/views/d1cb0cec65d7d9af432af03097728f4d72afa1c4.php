<?php echo $__env->make('Export::Excel.Header', ['ReportName' => $ReportName], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('Export::Excel.Parameters', ['Parameters' => $Parameters], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('Export::Excel.Content', ['ListData' => $ListData, 'Header' => $Header], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
?>
