<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>إنشاء حساب | <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Bootstrap 5.3 CDN for modern components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet">

    <!-- Google Fonts: Poppins for a modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-color: #2575fc;
            --secondary-color: #6a11cb;
            --background-color: #f4f7f6;
            --card-background: #ffffff;
            --font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .auth-container {
            display: flex;
            width: 100%;
            max-width: 950px;
            min-height: 600px;
            background-color: var(--card-background);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border-radius: 25px;
            overflow: hidden;
        }

        .auth-image-section {
            width: 50%;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 50px;
            text-align: center;
        }
        .auth-image-section .icon-container {
            font-size: 80px;
            margin-bottom: 30px;
            width: 160px;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        .auth-image-section h3 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .auth-form-section {
            width: 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-form-section h2 {
            font-weight: 700;
            color: #333;
            margin-bottom: 35px;
        }

        .form-floating > .form-control {
            height: calc(3.5rem + 2px);
            line-height: 1.25;
        }
        .form-floating > label {
            padding: 1rem 1.25rem;
        }
        .form-floating > .form-control:focus ~ label {
            color: var(--primary-color);
        }
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 4px rgba(37, 117, 252, 0.15);
        }

        .btn-primary {
            background: linear-gradient(to left, var(--secondary-color), var(--primary-color));
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.25);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
        }
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .auth-image-section {
                display: none;
            }
            .auth-form-section {
                width: 100%;
            }
            .auth-container {
                max-width: 480px;
                min-height: auto;
            }
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <!-- Image/Icon Section -->
        <div class="auth-image-section">
            <div class="icon-container">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3>انضم إلى مجتمعنا</h3>
            <p>قم بإنشاء حسابك للبدء. الأمر مجاني ولا يستغرق سوى دقيقة.</p>
        </div>

        <!-- Form Section -->
        <div class="auth-form-section">
            <h2 class="text-center">إنشاء حساب جديد</h2>

            <form method="POST" action="/accountlogin"
                <?php echo csrf_field(); ?>

                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="text" name="username" required />
                    <label for="inputEmail">اسم المستخدم</label>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPassword" type="password"  placeholder="إنشاء كلمة مرور" name="password" required />
                            <label for="inputPassword">كلمة المرور</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">إنشاء حساب</button></div>
                </div>
            </form>

            <div class="login-link">
                <div class="small"><a href="<?php echo e(route("login")); ?>">لديك حساب؟ اذهب لتسجيل الدخول</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <?php if(file_exists(public_path('js/scripts.js' ))): ?>
        <script src="<?php echo e(asset("js/scripts.js")); ?>"></script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\auth\register.blade.php ENDPATH**/ ?>