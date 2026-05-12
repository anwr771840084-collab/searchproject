<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $__env->yieldContent('title', 'مدونة نظيفة - قالب Start Bootstrap'); ?></title>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/favicon.ico')); ?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet" />

        <style>
            /* تنسيقات ثلاثية الأبعاد للنافبار */

            :root {
                --nav-primary: #1a237e;
                --nav-secondary: #3949ab;
                --nav-accent: #00bcd4;
                --nav-light: #f5f5f5;
                --nav-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            /* النافبار الأساسي */
            #mainNav {
                background: linear-gradient(135deg, var(--nav-primary) 0%, var(--nav-secondary) 100%);
                box-shadow: var(--nav-shadow);
                padding: 15px 0;
                transform-style: preserve-3d;
                transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                position: relative;
                z-index: 1000;
                border-bottom: 3px solid var(--nav-accent);
                perspective: 1000px;
            }

            /* تأثير التمرير للنافبار */
            #mainNav.scrolled {
                padding: 8px 0;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
                background: linear-gradient(135deg, var(--nav-primary) 0%, rgba(25, 35, 126, 0.95) 100%);
                backdrop-filter: blur(10px);
                transform: translateZ(20px);
            }

            /* تأثير ثلاثي الأبعاد للشعار */
            .navbar-brand {
                font-size: 1.8rem;
                font-weight: 700;
                color: white !important;
                position: relative;
                transform-style: preserve-3d;
                transition: all 0.4s ease;
                padding: 10px 15px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.1);
                overflow: hidden;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .navbar-brand::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transform: translateX(-100%) translateZ(-10px);
                transition: transform 0.6s ease;
            }

            .navbar-brand:hover {
                transform: translateZ(15px) scale(1.05);
                background: rgba(255, 255, 255, 0.2);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .navbar-brand:hover::before {
                transform: translateX(100%) translateZ(-10px);
            }

            .navbar-brand i {
                font-size: 1.5rem;
                transform: translateZ(5px);
                transition: transform 0.3s ease;
            }

            .navbar-brand:hover i {
                transform: translateZ(10px) rotate(15deg);
            }

            /* تأثيرات ثلاثية الأبعاد لعناصر القائمة */
            .navbar-nav {
                transform-style: preserve-3d;
                perspective: 1000px;
            }

            .nav-item {
                position: relative;
                transform-style: preserve-3d;
                margin: 0 5px;
            }

            .nav-link {
                font-family: 'Noto Sans Arabic', 'Arial', sans-serif;
                font-size: 1.1rem;
                font-weight: 500;
                color: white !important;
                position: relative;
                padding: 12px 20px !important;
                border-radius: 8px;
                transform-style: preserve-3d;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                overflow: hidden;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
            }

            /* تأثير الخلفية المتحركة */
            .nav-link::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, var(--nav-accent), rgba(0, 188, 212, 0.7));
                transform: translateY(100%) translateZ(-10px);
                transition: transform 0.4s ease;
                z-index: -1;
                border-radius: 8px;
            }

            /* تأثير الظل ثلاثي الأبعاد */
            .nav-link::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.1);
                transform: translateZ(-15px);
                opacity: 0;
                transition: opacity 0.3s ease, transform 0.3s ease;
                border-radius: 8px;
            }

            .nav-link:hover {
                transform: translateY(-5px) translateZ(15px);
                color: white !important;
            }

            .nav-link:hover::before {
                transform: translateY(0) translateZ(-5px);
            }

            .nav-link:hover::after {
                opacity: 1;
                transform: translateZ(-5px);
            }

            /* تأثيرات الأيقونات */
            .nav-link i {
                font-size: 1.2rem;
                transition: all 0.3s ease;
                transform: translateZ(5px);
            }

            .nav-link:hover i {
                transform: translateZ(10px) rotate(15deg);
                color: white;
            }

            /* تأثيرات خاصة لكل عنصر */
            .nav-item:nth-child(1) .nav-link::before {
                background: linear-gradient(45deg, #4CAF50, #8BC34A);
            }

            .nav-item:nth-child(2) .nav-link::before {
                background: linear-gradient(45deg, #2196F3, #03A9F4);
            }

            .nav-item:nth-child(3) .nav-link::before {
                background: linear-gradient(45deg, #FF9800, #FFB74D);
            }

            .nav-item:nth-child(4) .nav-link::before {
                background: linear-gradient(45deg, #E91E63, #F06292);
            }

            /* تأثير ثلاثي الأبعاد للزر المتحرك */
            .navbar-toggler {
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.2);
                color: white;
                padding: 10px 15px;
                border-radius: 8px;
                transform-style: preserve-3d;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .navbar-toggler:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateZ(10px) scale(1.05);
                border-color: var(--nav-accent);
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.3);
                transform: translateZ(5px);
            }

            /* تأثيرات ثلاثية الأبعاد للقائمة المنسدلة */
            .navbar-collapse {
                transform-style: preserve-3d;
            }

            /* تأثيرات خاصة للشاشات الصغيرة */
            @media (max-width: 992px) {
                .navbar-nav {
                    background: rgba(25, 35, 126, 0.95);
                    padding: 20px;
                    border-radius: 15px;
                    margin-top: 15px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
                    transform: translateZ(30px);
                    backdrop-filter: blur(10px);
                }

                .nav-item {
                    margin: 10px 0;
                }

                .nav-link {
                    justify-content: right;
                    padding: 15px 20px !important;
                    border-radius: 10px;
                }

                .nav-link:hover {
                    transform: translateX(-10px) translateZ(10px);
                }
            }

            /* تأثيرات المؤشر التفاعلي */
            .nav-cursor-effect {
                position: absolute;
                width: 60px;
                height: 60px;
                background: radial-gradient(circle, rgba(0, 188, 212, 0.3) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 9999;
                transform: translate(-50%, -50%) translateZ(50px);
                opacity: 0;
                transition: opacity 0.3s ease;
                mix-blend-mode: screen;
            }

            /* تأثيرات الشريط العلوي المتحرك */
            .nav-progress {
                position: absolute;
                top: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(to left, var(--nav-accent), #4CAF50);
                transform-origin: right;
                transform: scaleX(0);
                transition: transform 0.3s ease;
                z-index: 1001;
            }

            /* تأثيرات النشاط */
            .nav-item.active .nav-link {
                transform: translateY(-5px) translateZ(20px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                background: rgba(255, 255, 255, 0.15);
            }

            .nav-item.active .nav-link::before {
                transform: translateY(0) translateZ(-3px);
            }

            /* تأثيرات الصفحة الحالية */
            .nav-link.current-page {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0%, 100% { transform: translateY(-5px) translateZ(15px); }
                50% { transform: translateY(-5px) translateZ(20px) scale(1.05); }
            }

            /* تأثيرات الظل المتحركة */
            .nav-shadow-effect {
                position: absolute;
                bottom: -10px;
                right: 10%;
                width: 80%;
                height: 20px;
                background: radial-gradient(ellipse at center, rgba(0,0,0,0.3) 0%, transparent 70%);
                border-radius: 50%;
                transform: translateZ(-30px);
                opacity: 0.5;
                transition: all 0.3s ease;
            }

            #mainNav:hover .nav-shadow-effect {
                opacity: 0.8;
                transform: translateZ(-20px) scale(1.2);
            }
        </style>
    </head>
    <body>
        <!-- تأثير المؤثل ثلاثي الأبعاد -->
        <div class="nav-cursor-effect" id="navCursor"></div>

        <!-- شريط التقدم ثلاثي الأبعاد -->
        <div class="nav-progress" id="navProgress"></div>

        <!-- تأثير الظل المتحرك -->
        <div class="nav-shadow-effect"></div>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
              <a class="navbar-brand" href="<?php echo e(url('/login')); ?>"><i class="fas fa-cogs"></i> الاداره</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                    <span>القائمة</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav me-auto py-4 py-lg-0">
                       <li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo e(url('/')); ?>">
        <i class="fas fa-home"></i>
        الرئيسية
    </a>
</li>
<li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo e(url('/about')); ?>">
        <i class="fas fa-info-circle"></i>
        نبذه عنا
    </a>
</li>
<li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo e(url('/contact')); ?>">
        <i class="fas fa-search"></i>
        اخبرنا اذا فقدت شيء
    </a>
</li>
<li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo e(url('/help')); ?>">
        <i class="fas fa-hands-helping"></i>
        اخبرنا اذا حصلت على شيء
    </a>
</li>

                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('header'); ?>

        <!-- Main Content-->
        <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">حقوق النشر &copy; موقعك 2025</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo e(asset('js/scriptss.js')); ?>"></script>

        <!-- JavaScript للنافبار التفاعلي ثلاثي الأبعاد -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const navbar = document.getElementById('mainNav');
                const navLinks = document.querySelectorAll('.nav-link');
                const navCursor = document.getElementById('navCursor');
                const navProgress = document.getElementById('navProgress');

                // تأثير التمرير للنافبار
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }

                    // تحديث شريط التقدم
                    const winHeight = window.innerHeight;
                    const docHeight = document.documentElement.scrollHeight;
                    const scrolled = window.scrollY;
                    const progress = (scrolled / (docHeight - winHeight)) * 100;

                    navProgress.style.transform = `scaleX(${progress / 100})`;
                });

                // تأثير المؤثل ثلاثي الأبعاد
                navbar.addEventListener('mousemove', function(e) {
                    if (navCursor) {
                        const rect = navbar.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;

                        navCursor.style.left = `${x}px`;
                        navCursor.style.top = `${y}px`;
                        navCursor.style.opacity = '1';
                    }
                });

                navbar.addEventListener('mouseleave', function() {
                    if (navCursor) {
                        navCursor.style.opacity = '0';
                    }
                });

                // تأثيرات ثلاثية الأبعاد لعناصر القائمة
                navLinks.forEach(link => {
                    link.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;

                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;

                        const rotateY = ((x - centerX) / 15).toFixed(2);
                        const rotateX = ((centerY - y) / 15).toFixed(2);

                        this.style.transform = `
                            translateY(-5px)
                            translateZ(15px)
                            rotateX(${rotateX}deg)
                            rotateY(${rotateY}deg)
                        `;

                        // تأثير الضوء المتحرك
                        const shadowX = (x / rect.width) * 20 - 10;
                        const shadowY = (y / rect.height) * 20 - 10;

                        this.style.boxShadow = `
                            ${shadowX}px ${shadowY}px 20px rgba(0, 0, 0, 0.2),
                            inset 0 0 20px rgba(255, 255, 255, 0.1)
                        `;
                    });

                    link.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0) translateZ(0) rotateX(0deg) rotateY(0deg)';
                        this.style.boxShadow = 'none';
                    });

                    // تأثير النقر
                    link.addEventListener('click', function() {
                        // إزالة النشاط من جميع العناصر
                        navLinks.forEach(item => {
                            item.parentElement.classList.remove('active');
                            item.classList.remove('current-page');
                        });

                        // إضافة النشاط للعنصر الحالي
                        this.parentElement.classList.add('active');
                        this.classList.add('current-page');

                        // تأثير النقر ثلاثي الأبعاد
                        this.style.transform = 'translateY(-5px) translateZ(25px) scale(0.95)';

                        setTimeout(() => {
                            this.style.transform = 'translateY(-5px) translateZ(15px) scale(1)';
                        }, 150);
                    });
                });

                // تحديد الصفحة الحالية
                const currentUrl = window.location.pathname;
                navLinks.forEach(link => {
                    if (link.getAttribute('href') === currentUrl) {
                        link.parentElement.classList.add('active');
                        link.classList.add('current-page');
                    }
                });

                // تأثيرات ثلاثية الأبعاد للزر المتحرك
                const navbarToggler = document.querySelector('.navbar-toggler');
                if (navbarToggler) {
                    navbarToggler.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left;

                        const rotate = ((x / rect.width) * 20 - 10).toFixed(2);

                        this.style.transform = `
                            translateZ(10px)
                            scale(1.05)
                            rotate(${rotate}deg)
                        `;
                    });

                    navbarToggler.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateZ(0) scale(1) rotate(0deg)';
                    });
                }

                // تأثير فتح وإغلاق القائمة المنسدلة
                const navbarCollapse = document.getElementById('navbarResponsive');
                if (navbarCollapse) {
                    navbarCollapse.addEventListener('show.bs.collapse', function() {
                        navbar.style.transform = 'translateZ(50px)';
                        navbar.style.boxShadow = '0 30px 60px rgba(0, 0, 0, 0.3)';
                    });

                    navbarCollapse.addEventListener('hide.bs.collapse', function() {
                        navbar.style.transform = 'translateZ(0)';
                        navbar.style.boxShadow = 'var(--nav-shadow)';
                    });
                }

                // تأثير التحميل الأولي
                setTimeout(() => {
                    navbar.style.opacity = '1';
                    navbar.style.transform = 'translateY(0)';
                }, 100);
            });
        </script>

        <?php echo $__env->yieldContent('scriptss'); ?>
    </body>
</html>
<?php /**PATH C:\Users\hp\Desktop\search-project\resources\views/layouts/app.blade.php ENDPATH**/ ?>