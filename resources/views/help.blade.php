@extends('layouts.app')

@section('title', 'البحث عن المفقودات - تواصل معنا')

@section('header')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url("{{ asset('assets/img/contact-bg.jpg') }}")>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>تواصل معنا</h1>
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
        <style>
/* تصميم تفاعلي للهيدر - حالة العثور على شيء */
.masthead {
    background: linear-gradient(rgba(40, 167, 69, 0.85), rgba(23, 162, 184, 0.9)),
                url("{{ asset('assets/img/contact-bg.jpg') }}") no-repeat center center;
    background-size: cover;
    height: 400px;
    position: relative;
    overflow: hidden;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

/* تأثير نجمة العثور */
.found-star {
    position: absolute;
    top: 50%;
    right: 50%;
    transform: translate(50%, -50%);
    width: 200px;
    height: 200px;
    background: radial-gradient(circle,
                rgba(255, 255, 255, 0.8) 0%,
                rgba(255, 215, 0, 0.6) 30%,
                rgba(255, 165, 0, 0.4) 60%,
                transparent 80%);
    border-radius: 50%;
    animation: star-glow 3s ease-in-out infinite;
    filter: blur(10px);
    z-index: 2;
}

@keyframes star-glow {
    0%, 100% {
        opacity: 0.6;
        transform: translate(50%, -50%) scale(1);
    }
    50% {
        opacity: 0.9;
        transform: translate(50%, -50%) scale(1.1);
    }
}

/* تأثير أشعة الضوء */
.light-rays {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.ray {
    position: absolute;
    top: 50%;
    right: 50%;
    width: 2px;
    height: 200px;
    background: linear-gradient(to bottom,
                transparent,
                rgba(255, 255, 255, 0.8),
                transparent);
    transform-origin: top center;
    animation: ray-rotate 20s linear infinite;
}

.ray:nth-child(1) { animation-delay: 0s; transform: rotate(0deg); }
.ray:nth-child(2) { animation-delay: -2.5s; transform: rotate(45deg); }
.ray:nth-child(3) { animation-delay: -5s; transform: rotate(90deg); }
.ray:nth-child(4) { animation-delay: -7.5s; transform: rotate(135deg); }
.ray:nth-child(5) { animation-delay: -10s; transform: rotate(180deg); }
.ray:nth-child(6) { animation-delay: -12.5s; transform: rotate(225deg); }
.ray:nth-child(7) { animation-delay: -15s; transform: rotate(270deg); }
.ray:nth-child(8) { animation-delay: -17.5s; transform: rotate(315deg); }

@keyframes ray-rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* تأثير النص */
.page-heading {
    position: relative;
    z-index: 10;
    padding-top: 120px;
    text-align: center;
    transform-style: preserve-3d;
}

.page-heading h1 {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    margin-bottom: 15px;
    letter-spacing: 1px;
    position: relative;
    display: inline-block;
    animation: title-float 4s ease-in-out infinite;
}

@keyframes title-float {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.02); }
}

.page-heading h1::before {
    content: '🎯';
    position: absolute;
    top: -20px;
    right: -50px;
    font-size: 2.5rem;
    animation: target-bounce 2s ease-in-out infinite;
    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
}

@keyframes target-bounce {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-10px) rotate(-10deg); }
    50% { transform: translateY(0) rotate(0deg); }
    75% { transform: translateY(-5px) rotate(10deg); }
}

.page-heading .subheading {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.95);
    text-shadow: 0 1px 8px rgba(0, 0, 0, 0.3);
    animation: subtitle-shine 3s ease-in-out infinite;
    background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.15),
                transparent);
    padding: 12px 25px;
    border-radius: 25px;
    display: inline-block;
    backdrop-filter: blur(5px);
}

@keyframes subtitle-shine {
    0%, 100% {
        background-position: -200% center;
    }
    100% {
        background-position: 200% center;
    }
}

/* تأثير العناصر التي تم العثور عليها */
.found-items {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 3;
}

.found-item {
    position: absolute;
    font-size: 28px;
    opacity: 0;
    filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.4));
    animation: found-float 20s linear infinite;
}

.found-item:nth-child(1) {
    top: 25%;
    right: 15%;
    animation-delay: 0s;
    content: '💰';
    font-size: 32px;
}
.found-item:nth-child(2) {
    top: 45%;
    right: 75%;
    animation-delay: 4s;
    content: '📱';
}
.found-item:nth-child(3) {
    top: 65%;
    right: 25%;
    animation-delay: 8s;
    content: '🔑';
}
.found-item:nth-child(4) {
    top: 35%;
    right: 55%;
    animation-delay: 12s;
    content: '💎';
    font-size: 30px;
}
.found-item:nth-child(5) {
    top: 75%;
    right: 45%;
    animation-delay: 16s;
    content: '💼';
}

@keyframes found-float {
    0% {
        transform: translateY(100px) translateX(0) rotate(0deg) scale(0.5);
        opacity: 0;
    }
    10% {
        opacity: 1;
        transform: translateY(80px) translateX(10px) rotate(10deg) scale(1);
    }
    30% {
        transform: translateY(40px) translateX(-10px) rotate(-10deg) scale(1.1);
    }
    50% {
        transform: translateY(0) translateX(10px) rotate(10deg) scale(1);
    }
    70% {
        transform: translateY(-40px) translateX(-10px) rotate(-10deg) scale(0.9);
    }
    90% {
        opacity: 1;
        transform: translateY(-80px) translateX(10px) rotate(10deg) scale(0.8);
    }
    100% {
        transform: translateY(-100px) translateX(0) rotate(0deg) scale(0.5);
        opacity: 0;
    }
}

/* تأثير الإشعار الإيجابي */
.positive-notice {
    position: absolute;
    top: 20px;
    left: 20px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    padding: 12px 25px;
    border-radius: 12px;
    font-weight: bold;
    animation: positive-bounce 2s ease-in-out infinite;
    transform: rotate(5deg);
    z-index: 100;
    box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

@keyframes positive-bounce {
    0%, 100% {
        transform: rotate(5deg) translateY(0);
    }
    50% {
        transform: rotate(5deg) translateY(-10px);
        box-shadow: 0 12px 25px rgba(40, 167, 69, 0.4);
    }
}

/* تأثير شكر المساعدة */
.thank-you {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 15px 20px;
    border-radius: 15px;
    color: white;
    animation: thank-you-sparkle 3s ease-in-out infinite;
    backdrop-filter: blur(10px);
    font-size: 0.9rem;
}

@keyframes thank-you-sparkle {
    0%, 100% {
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.2);
    }
    50% {
        border-color: rgba(255, 215, 0, 0.6);
        box-shadow: 0 0 20px 5px rgba(255, 215, 0, 0.3);
    }
}

/* تأثيرات تفاعلية عند hover */
.masthead:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(40, 167, 69, 0.2);
}

.masthead:hover .found-star {
    animation-duration: 1.5s;
    filter: blur(5px) brightness(1.2);
}

.masthead:hover .page-heading h1 {
    text-shadow: 0 0 25px rgba(255, 255, 255, 0.7);
    color: #fff;
}

/* تأثيرات النموذج للعثور على شيء */
#contactForm {
    transition: all 0.4s ease;
    background: rgba(255, 255, 255, 0.98);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(40, 167, 69, 0.1);
}

#contactForm:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(40, 167, 69, 0.15);
    border: 2px solid rgba(40, 167, 69, 0.1);
}

/* تأثيرات لحقول النموذج - لون أخضر للعثور */
.form-floating input:focus,
.form-floating textarea:focus,
.form-control:focus {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.2) !important;
    border-color: #28a745 !important;
    background-color: rgba(40, 167, 69, 0.05);
}

/* تأثير زر الإرسال للعثور */
.btn-primary {
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    padding: 15px 40px;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-primary:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 30px rgba(40, 167, 69, 0.4);
    background: linear-gradient(45deg, #20c997, #28a745);
    animation: button-success 0.5s ease;
}

@keyframes button-success {
    0% { transform: translateY(-5px) scale(1.05); }
    50% { transform: translateY(-5px) scale(1.1); }
    100% { transform: translateY(-5px) scale(1.05); }
}

.btn-primary::before {
    content: '✅';
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: all 0.3s ease;
}

.btn-primary:hover::before {
    opacity: 1;
    transform: translateY(-50%) rotate(360deg);
}

.btn-primary::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.btn-primary:hover::after {
    transform: translateX(100%);
}

/* تأثيرات خاصة لحقل رفع الصورة للعثور */
.input-group {
    transition: all 0.4s ease;
    border-radius: 10px;
    overflow: hidden;
}

.input-group:hover {
    transform: translateX(-5px);
    box-shadow: 0 10px 25px rgba(40, 167, 69, 0.15);
}

.input-group-text {
    transition: all 0.4s ease;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
    border: none;
    font-weight: bold;
}

.input-group:hover .input-group-text {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
}

/* تأثيرات للشاشات الصغيرة */
@media (max-width: 768px) {
    .masthead {
        height: 300px;
    }

    .page-heading h1 {
        font-size: 2.5rem;
    }

    .page-heading h1::before {
        font-size: 2rem;
        right: -40px;
        top: -15px;
    }

    .found-star {
        width: 150px;
        height: 150px;
    }

    .positive-notice {
        font-size: 0.9rem;
        padding: 8px 15px;
        left: 10px;
        top: 10px;
    }

    .thank-you {
        font-size: 0.8rem;
        padding: 10px 15px;
        bottom: 10px;
        right: 10px;
    }

    #contactForm {
        padding: 20px;
    }
}

/* تأثير تلميخ النجاح للنموذج */
.success-flash {
    animation: success-flash 2s ease;
}

@keyframes success-flash {
    0% { background-color: rgba(40, 167, 69, 0.1); }
    50% { background-color: rgba(40, 167, 69, 0.3); }
    100% { background-color: rgba(40, 167, 69, 0.1); }
}

/* تأثيرات إضافية للتعليمات */
.form-text {
    transition: all 0.3s ease;
    color: #28a745;
    font-weight: 500;
}

.form-control:focus ~ .form-text {
    transform: translateX(5px);
    color: #20c997;
}
        </style>
    </header>
@endsection

@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>هل تريد التواصل معنا؟ املأ النموذج أدناه لإرسال رسالتك وسنرد عليك في أقرب وقت ممكن!</p>
                    <div class="my-5">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" action="{{url('/help')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                            <div class="form-floating">
                                <input class="form-control" id="name" type="text" name="name" placeholder="أدخل اسمك..." data-sb-validations="required" />
                                <label for="name">الاسم</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">الاسم مطلوب.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" type="email"  name="email" placeholder="أدخل بريدك الإلكتروني..." data-sb-validations="required" />
                                <label for="email">البريد الإلكتروني</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">البريد الإلكتروني مطلوب.</div>
                                {{-- <div class="invalid-feedback" data-sb-feedback="email:email">البريد الإلكتروني غير صالح.</div> --}}
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="أدخل رقم هاتفك..." data-sb-validations="required" />
                                <label for="phone">رقم الهاتف</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">رقم الهاتف مطلوب.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="address" name="address" type="text" placeholder="أدخل العنوان..." data-sb-validations="required" />
                                <label for="address">العنوان</label>
                                <div class="invalid-feedback" data-sb-feedback="address:required">العنوان مطلوب.</div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">صورة الشيء المحصول</label>
                                <div class="input-group">
    <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
    <input class="form-control" id="image" name="image" type="file" accept="image/*" />
</div>
                                <div class="form-text">يرجى إرفاق صورة واضحة للشيء المحصول للمساعدة  </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="massage" name="message" placeholder="أدخل رسالتك هنا..." style="height: 12rem" data-sb-validations="required"></textarea>
                                <label for="massage">الرسالة</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">الرسالة مطلوبة.</div>
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">تم إرسال النموذج بنجاح!</div>
                                    لتفعيل هذا النموذج، سجل في
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">خطأ في إرسال الرسالة!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scriptss')
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
