<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?php echo $__env->yieldContent('description', ''); ?>" />
        <meta name="author" content="<?php echo $__env->yieldContent('author', ''); ?>" />
        <title><?php echo $__env->yieldContent('title', 'SB Admin'); ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?php echo e(asset('css/styless.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <?php echo $__env->yieldPushContent('styless'); ?>
    </head>
    <body class="sb-nav-fixed <?php echo $__env->yieldContent('body_class', ''); ?>">
        <?php echo $__env->make('layouts.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div id="layoutSidenav">
            <?php echo $__env->make('layouts.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div id="layoutSidenav_content">
                <main>
                    <?php echo $__env->yieldContent('content'); ?>
                </main>
                <?php echo $__env->make('layouts.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('js/scriptss.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('scriptss'); ?>
    </body>
</html>

<?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\layouts\master.blade.php ENDPATH**/ ?>