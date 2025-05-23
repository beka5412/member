<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> &dash; <?php echo e(config('app.name')); ?></title>
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/favicon.png'))); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>">
</head>
<?php
    $user = \Auth::user();
?>
<body>
<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('js/site.core.js')); ?>"></script>
<script src="<?php echo e(asset('js/site.js')); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/resources/views/errors/minimal.blade.php ENDPATH**/ ?>