@extends('layouts.app')

@section('title', 'البحث عن المفقودات')

@section('header')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>مركز البحث عن المفقودات</h1>
                        <span class="subheading">نساعد في إعادة المفقودين إلى ذويهم</span>
                    </div>
                </div>
            </div>
        </div>
        <style>

            /* إضافة تأثيرات 3D تفاعلية مع الحفاظ على التصميم الأصلي */

/* تأثيرات عامة للصفحة */
body {
    perspective: 2000px;
    transform-style: preserve-3d;
    min-height: 100vh;
    overflow-x: hidden;
    background-color: #f8f9fa;
    font-family: 'Cairo', sans-serif;
}

/* تأثير 3D للهيدر */
.masthead {
    position: relative;
    transform-style: preserve-3d;
    transition: transform 0.5s ease;
    overflow: hidden;
}

.masthead::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center,
                rgba(255,255,255,0.1) 0%,
                rgba(255,255,255,0) 70%);
    transform: translateZ(-100px) scale(1.5);
    opacity: 0.5;
    pointer-events: none;
    transition: opacity 0.5s ease;
}

.masthead:hover::before {
    opacity: 0.8;
}

.site-heading {
    transform: translateZ(50px);
    transition: transform 0.5s ease;
    text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    animation: floatHeader 6s ease-in-out infinite;
}

@keyframes floatHeader {
    0%, 100% { transform: translateZ(50px) translateY(0); }
    50% { transform: translateZ(50px) translateY(-10px); }
}

/* تأثيرات 3D للمقالات */
.post-preview {
    background: white;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transform-style: preserve-3d;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    cursor: pointer;
    border: 1px solid rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.post-preview::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg,
                rgba(13, 110, 253, 0.05) 0%,
                rgba(13, 110, 253, 0) 70%);
    transform: translateZ(-20px);
    opacity: 0;
    transition: opacity 0.4s ease, transform 0.4s ease;
    border-radius: 12px;
    z-index: 0;
}

.post-preview:hover {
    transform: translateY(-15px) translateZ(20px) rotateX(2deg);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(13, 110, 253, 0.1);
}

.post-preview:hover::before {
    opacity: 1;
    transform: translateZ(-10px);
}

/* تأثير 3D للعناوين */
.post-title {
    position: relative;
    display: inline-block;
    transition: all 0.4s ease;
    transform-origin: right center;
    z-index: 1;
}

.post-title::after {
    content: '';
    position: absolute;
    bottom: -5px;
    right: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(to left, #0d6efd, #00bcd4);
    border-radius: 2px;
    transition: width 0.5s ease;
    transform: translateZ(10px);
}

.post-preview:hover .post-title::after {
    width: 100%;
}

.post-preview:hover .post-title {
    transform: translateX(5px) translateZ(10px);
    color: #0d6efd;
}

/* تأثير 3D للعناوين الفرعية */
.post-subtitle {
    transition: all 0.4s ease 0.1s;
    position: relative;
    z-index: 1;
}

.post-preview:hover .post-subtitle {
    transform: translateX(10px) translateZ(15px);
    color: #495057;
}

/* تأثير 3D لبيانات النشر */
.post-meta {
    transition: all 0.4s ease 0.2s;
    position: relative;
    z-index: 1;
}

.post-preview:hover .post-meta {
    transform: translateX(5px) translateZ(10px);
}

.post-meta a {
    position: relative;
    transition: all 0.3s ease;
}

.post-meta a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    right: 0;
    width: 0;
    height: 1px;
    background-color: #0d6efd;
    transition: width 0.3s ease;
}

.post-preview:hover .post-meta a::after {
    width: 100%;
}

/* تأثير 3D للفواصل */
hr.my-4 {
    height: 2px;
    background: linear-gradient(to left,
                rgba(13, 110, 253, 0.3),
                rgba(13, 110, 253, 0.1),
                transparent);
    border: none;
    margin: 50px 0;
    position: relative;
    transform-style: preserve-3d;
    transition: all 0.5s ease;
}

hr.my-4::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(to left,
                #0d6efd,
                rgba(0, 188, 212, 0.7));
    transform: translateZ(10px);
    transition: width 0.8s ease;
}

.post-preview:hover + hr.my-4::before,
hr.my-4:hover::before {
    width: 100%;
}

/* تأثير 3D للزر */
.btn-primary {
    position: relative;
    overflow: hidden;
    transform-style: preserve-3d;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: none;
    padding: 12px 30px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg,
                rgba(255,255,255,0.2) 0%,
                rgba(255,255,255,0) 70%);
    transform: translateZ(-15px);
    transition: transform 0.4s ease;
    border-radius: inherit;
}

.btn-primary::after {
    content: '';
    position: absolute;
    top: 0;
    right: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg,
                transparent,
                rgba(255,255,255,0.3),
                transparent);
    transform: translateZ(-10px);
    transition: right 0.6s ease;
}

.btn-primary:hover {
    transform: translateY(-5px) translateZ(15px) scale(1.05);
    box-shadow: 0 15px 30px rgba(13, 110, 253, 0.3),
                0 0 0 1px rgba(13, 110, 253, 0.2);
}

.btn-primary:hover::before {
    transform: translateZ(-5px);
}

.btn-primary:hover::after {
    right: 100%;
}

/* تأثيرات الطبقات ثلاثية الأبعاد */
.container.px-4.px-lg-5 {
    transform-style: preserve-3d;
}

.row.gx-4.gx-lg-5.justify-content-center {
    transform-style: preserve-3d;
}

.col-md-10.col-lg-8.col-xl-7 {
    transform-style: preserve-3d;
    transition: transform 0.5s ease;
}

/* تأثيرات متقدمة للماوس */
.mouse-tilt-effect {
    transition: transform 0.3s ease;
}

/* تأثيرات مختلفة لكل مقالة */
.post-preview:nth-child(1) {
    border-right: 5px solid #0d6efd;
}

.post-preview:nth-child(2) {
    border-right: 5px solid #00bcd4;
}

.post-preview:nth-child(3) {
    border-right: 5px solid #20c997;
}

.post-preview:nth-child(4) {
    border-right: 5px solid #fd7e14;
}

/* تأثيرات للشاشات الكبيرة */
@media (min-width: 992px) {
    .post-preview {
        transform: perspective(1500px) rotateY(0deg);
    }

    .post-preview:hover {
        transform: perspective(1500px)
                   rotateY(-3deg)
                   translateY(-15px)
                   translateZ(30px);
    }

    .post-preview:nth-child(even):hover {
        transform: perspective(1500px)
                   rotateY(3deg)
                   translateY(-15px)
                   translateZ(30px);
    }
}

/* تأثيرات للشاشات الصغيرة */
@media (max-width: 768px) {
    .post-preview:hover {
        transform: translateY(-10px) translateZ(10px);
    }

    .site-heading {
        animation: none;
    }
}

/* تأثيرات التمرير */
.scroll-animation {
    opacity: 0;
    transform: translateY(30px) translateZ(-50px);
    transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.scroll-animation.visible {
    opacity: 1;
    transform: translateY(0) translateZ(0);
}

/* تأثيرات النص ثلاثي الأبعاد */
.text-3d {
    text-shadow:
        1px 1px 0 rgba(0,0,0,0.1),
        2px 2px 0 rgba(0,0,0,0.05),
        3px 3px 0 rgba(0,0,0,0.05);
}

/* تأثيرات الظل ثلاثي الأبعاد */
.shadow-3d {
    box-shadow:
        0 10px 20px rgba(0,0,0,0.1),
        0 6px 6px rgba(0,0,0,0.05),
        0 0 0 1px rgba(0,0,0,0.05);
}

/* تأثيرات خلفية ثلاثية الأبعاد */
.bg-3d {
    background: linear-gradient(145deg,
                #ffffff 0%,
                #f8f9fa 50%,
                #e9ecef 100%);
    border-radius: 15px;
    box-shadow:
        20px 20px 60px rgba(0,0,0,0.1),
        -20px -20px 60px rgba(255,255,255,0.8);
}

/* تأثيرات التركيز */
:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.3);
}

/* تأثيرات الانتقال */
* {
    scroll-behavior: smooth;
}

/* تنسيق كارد المفقود للموبايل والشاشات الكبيرة */
.post-preview-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 18px !important;
    overflow: hidden;
}
.post-preview-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}
.post-card-img {
    height: 350px;
    object-fit: cover;
    width: 100%;
}
@media (max-width: 767.98px) {
    .post-card-img {
        height: 250px;
    }
    .post-preview-card .card-body {
        padding: 1.5rem !important;
    }
    .post-preview-card .card-title {
        font-size: 1.3rem !important;
    }
}
@media (max-width: 575.98px) {
    .post-card-img {
        height: 200px;
    }
    .post-preview-card .card-body {
        padding: 1.25rem !important;
    }
    .post-preview-card .card-text {
        font-size: 1rem !important;
    }
}
        </style>
    </header>
@endsection

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if(isset($posts) && $posts->count() > 0)
                    @foreach($posts as $post)
                        <!-- Post Card Design -->
                        <div class="card post-preview-card mb-5 shadow-sm border-0 bg-white">
                            @if($post->image)
                                <img src="{{ asset($post->image) }}" class="card-img-top post-card-img" alt="صورة المفقود">
                            @endif
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="card-title h4 mb-0 fw-bold">{{ $post->name }}</h2>
                                    @if($post->is_delivered)
                                        <span class="badge bg-success px-3 py-2 rounded-pill shadow-sm"><i class="fas fa-check-circle me-1"></i> تم التسليم</span>
                                    @else
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm"><i class="fas fa-clock me-1"></i> قيد الانتظار</span>
                                    @endif
                                </div>
                                <p class="card-text text-muted mb-4 fs-5" style="line-height: 1.6;">{{ $post->massage }}</p>
                                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center border-top pt-3 mt-3 gap-2">
                                    <div class="text-muted small">
                                        <i class="fas fa-user-circle me-1 text-primary"></i> بواسطة: <a href="#!" class="text-decoration-none text-muted">{{ $post->email }}</a>
                                    </div>
                                    <div class="text-muted small">
                                        <i class="fas fa-calendar-alt me-1 text-primary"></i> {{ $post->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <p class="lead">لا توجد مفقودات مسجلة حالياً.</p>
                    </div>
                @endif
                
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ url('/contact') }}">→ أبلغ عن الشيء المفقود </a></div>
            </div>
        </div>
    </div>
    
@endsection
