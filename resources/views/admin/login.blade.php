<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>تسجيل الدخول | {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5.3 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">


    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* --- Main Design Variables --- */
        :root {
            --primary-color: #4a00e0;
            --secondary-color: #8e2de2;
            --background-color: #f0f2f5;
            --card-background: #ffffff;
            --text-color: #333;
            --input-border: #ced4da;
            --input-focus-border: #8e2de2;
            --font-family: 'Poppins', sans-serif;
        }

        /* --- Base Body Settings --- */
        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /* --- Main Page Container --- */
        .login-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            min-height: 550px;
            background-color: var(--card-background);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* --- Form Section (Right Side) --- */
        .login-form-section {
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form-section h2 {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .login-form-section .form-text {
            color: #777;
            margin-bottom: 30px;
        }

        /* --- Input Field Design --- */
        .form-control {
            height: 50px;
            border: 1px solid var(--input-border);
            border-radius: 10px;
            padding-right: 15px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--input-focus-border);
            box-shadow: 0 0 0 3px rgba(142, 45, 226, 0.15);
        }

        /* --- Error Messages --- */
        .invalid-feedback {
            text-align: right;
        }

        /* --- Login Button Design --- */
        .btn-primary {
            background: linear-gradient(-45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(74, 0, 224, 0.25);
        }

        /* --- Sign Up Link --- */
        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        /* --- Image Section (Left Side) --- */
        .login-image-section {
            width: 50%;
            background: linear-gradient(-45deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 40px;
            text-align: center;
        }
        .login-image-section img {
            max-width: 80%;
            margin-bottom: 20px;
        }
        .login-image-section h3 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
                min-height: auto;
                box-shadow: none;
            }
            .login-form-section, .login-image-section {
                width: 100%;
            }
            .login-image-section {
                display: none;
            }
            body {
                padding: 20px 0;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Image Section (Left Side) -->
        <div class="login-image-section">
            <div>
                <i class="fas fa-user" style="font-size: 80px;"></i>
                <h3>مرحباً بعودتك!</h3>
                <p>سجل دخولك للوصول إلى لوحة التحكم وإدارة كل شيء في مكان واحد.</p>
            </div>
        </div>

        <!-- Form Section (Right Side) -->
        <div class="login-form-section">
            <h2>تسجيل الدخول</h2>
            <p class="form-text">أدخل اسم المستخدم وكلمة المرور للمتابعة.</p>

            <form id="login-frm" action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="اسم المستخدم" value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة المرور" required>
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">دخول</button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
