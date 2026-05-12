<?php $__env->startSection("title", "404 Error - SB Admin"); ?>
<?php $__env->startSection("body_class", "bg-primary"); ?>

<?php $__env->startSection("content"); ?>
<div id="layoutError">
    <div id="layoutError_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <img class="mb-4 img-error" src="<?php echo e(asset("assets/img/error-404-monochrome.svg")); ?>" />
                            <p class="lead">This requested URL was not found on this server.</p>
                            <a href="<?php echo e(route("dashboard")); ?>">
                                <i class="fas fa-arrow-left me-1"></i>
                                Return to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutError_footer">
        <?php echo $__env->make("layouts.partials.footer", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush("scriptss"); ?>
<!-- يمكن إضافة أي سكريبتات خاصة بهذه الصفحة هنا -->
<?php $__env->stopPush(); ?>


<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\admin\404.blade.php ENDPATH**/ ?>