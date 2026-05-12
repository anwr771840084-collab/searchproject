<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">الموقع</div>
                <a class="nav-link" href="<?php echo e(route("index")); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    الرئيسية
                </a>
                <div class="sb-sidenav-menu-heading">الأساسي</div>
                <a class="nav-link" href="<?php echo e(route("dashboard")); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    لوحة التحكم
                </a>
                <div class="sb-sidenav-menu-heading">الواجهة</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    العرض
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo e(route("layout-static")); ?>">المفقودات</a>
                        <a class="nav-link" href="<?php echo e(route("layout-sidenav-light")); ?>">  المحصولات</a>
                    </nav>
                </div>

                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">

<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                        </div>
                        </a>



                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">مسجل الدخول باسم:</div>
            <?php echo e(auth()->user()->username ?? 'غير معروف'); ?>

        </div>
    </nav>
</div>
<?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\layouts\partials\sidebar.blade.php ENDPATH**/ ?>