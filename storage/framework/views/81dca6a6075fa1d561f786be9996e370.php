<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>تسجيل الدخول | <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Bootstrap 5.3 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
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
            background: linear-gradient(to left, var(--primary-color), var(--secondary-color));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 50px;
            text-align: center;
        }

        .icon-container {
            font-size: 80px;
            line-height: 1;
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
            margin-bottom: 10px;
        }

        .auth-form-section .form-text {
            color: #888;
            margin-bottom: 35px;
        }

        .input-group {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .input-group:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.1);
        }

        .form-control {
            border: none;
            height: 55px;
        }
        .form-control:focus {
            box-shadow: none;
        }

        .input-group-text {
            background-color: #fff;
            border: none;
            padding: 0 15px;
            color: #aaa;
        }

        .btn-primary {
            background: linear-gradient(to left, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.3);
        }

        .signup-link {
            text-align: center;
            margin-top: 25px;
        }
        .signup-link a {
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
                max-width: 450px;
                min-height: auto;
            }
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <!-- Image Section with Icon -->
        <div class="auth-image-section">
            <div class="icon-container">
                <i class="fas fa-user-shield"></i>
            </div>
            <h3>وصول آمن وسلس</h3>
            <p>بوابتك إلى منصتنا. نحن نولي اهتماماً لأمانك وخصوصيتك.</p>
        </div>

        <!-- Form Section -->
        <div class="auth-form-section">
            <h2>تسجيل الدخول</h2>
            <p class="form-text">مرحباً بعودتك! يرجى إدخال بياناتك.</p>

            <form id="login-frm" action="/accountlogin" method="post">
                <?php echo csrf_field(); ?>

                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" value="<?php echo e(old('username')); ?>" required>
                </div>
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger mb-2" style="font-size: 0.875em;"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger mb-2" style="font-size: 0.875em;"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary">دخول</button>
                </div>
            </form>

            <div class="login-link">
                <div class="small"><a href="<?php echo e(route("login")); ?>">لديك حساب؟ اذهب لتسجيل الدخول</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <?php if(file_exists(public_path('js/scriptss.js' ))): ?>
        <script src="<?php echo e(asset('js/scriptss.js')); ?>"></script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\auth\accountlogin.blade.php ENDPATH**/ ?>