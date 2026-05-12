@extends('layouts.app')

@section('title', 'البحث عن المفقودات - نبذه عنا')

@section('header')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>نبذه عنا! </h1>
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* إضافة هذه التنسيقات فقط إلى ملف styles.css أو في <style> */

/* تحسينات تفاعلية للمقالات - بدون تعديل الهيكل */

/* تأثيرات للهيدر */
.masthead {
    transition: all 0.4s ease;
}

.masthead:hover {
    transform: scale(1.01);
}

.page-heading h1 {
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.page-heading h1::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 50%;
    transform: translateX(50%);
    width: 0;
    height: 3px;
    background: linear-gradient(to right, #007bff, #00bcd4);
    transition: width 0.5s ease;
}

.masthead:hover .page-heading h1::after {
    width: 100px;
}

/* تأثيرات تفاعلية للفقرات */
.container .row .col-md-10 p {
    position: relative;
    padding: 25px 30px;
    margin-bottom: 30px;
    border-radius: 8px;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    line-height: 1.8;
    text-align: justify;
    cursor: pointer;
    overflow: hidden;
}

/* تأثير hover على الفقرات */
.container .row .col-md-10 p:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-right: 3px solid #007bff;
}

/* تأثيرات مختلفة لكل فقرة */
.container .row .col-md-10 p:nth-child(1):hover {
    border-right-color: #007bff;
    background: linear-gradient(to left, rgba(0, 123, 255, 0.02), transparent);
}

.container .row .col-md-10 p:nth-child(2):hover {
    border-right-color: #28a745;
    background: linear-gradient(to left, rgba(40, 167, 69, 0.02), transparent);
}

.container .row .col-md-10 p:nth-child(3):hover {
    border-right-color: #fd7e14;
    background: linear-gradient(to left, rgba(253, 126, 20, 0.02), transparent);
}

/* تأثير النص عند hover */
.container .row .col-md-10 p:hover {
    color: #333;
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
}

/* تأثيرات التمرير التدريجي */
.container .row .col-md-10 p {
    opacity: 0.95;
}

.container .row .col-md-10 p:hover {
    opacity: 1;
}

/* تأثيرات النقر */
.container .row .col-md-10 p:active {
    transform: translateY(-2px) scale(0.995);
    transition: transform 0.1s ease;
}

/* تأثيرات الصندوق الداخلي */
.container .row .col-md-10 p::before {
    content: '';
    position: absolute;
    top: 0;
    right: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: right 0.6s ease;
}

.container .row .col-md-10 p:hover::before {
    right: 100%;
}

/* تحسينات للهوامش والمسافات */
.container .row .col-md-10 p {
    margin-top: 15px;
    margin-bottom: 25px;
}

.container .row .col-md-10 p:first-child {
    margin-top: 0;
}

.container .row .col-md-10 p:last-child {
    margin-bottom: 0;
}

/* تأثيرات للخطوط */
.container .row .col-md-10 p {
    font-size: 1.05rem;
    letter-spacing: 0.3px;
}

/* تأثيرات للشاشات الصغيرة */
@media (max-width: 768px) {
    .container .row .col-md-10 p {
        padding: 20px;
        margin-bottom: 20px;
    }

    .container .row .col-md-10 p:hover {
        transform: translateY(-3px);
    }
}

/* تأثيرات بسيطة للزر لو وجد */
.btn-primary {
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

/* تأثيرات لفواصل الصفحة لو وجدت */
hr {
    transition: all 0.3s ease;
}

hr:hover {
    height: 3px;
    background: linear-gradient(to right, #007bff, #28a745);
}
        </style>
    </header>
@endsection

@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>مركز البحث عن المفقودات هو منصة متخصصة تساعد الأفراد والأسر في العثور على ذويهم المفقودين. تأسس المركز بهدف تقديم خدمات بحث احترافية ومتطورة باستخدام أحدث التقنيات والأساليب العلمية في البحث والتحري.</p>
                    <p>نحن نعمل على مدار الساعة لمساعدة الأسر المتعثرة في العثور على أحبائهم، ونستعين بفريق من الخبراء والمتخصصين في مجال البحث والتحري. كما نحتفظ بقاعدة بيانات شاملة تضم جميع حالات الإبلاغ عن المفقودين لتسهيل عملية البحث والمقارنة.</p>
                    <p>خدماتنا مجتمعية بالدرجة الأولى، ونؤمن بأن إعادة المفقودين إلى ذويهم هو واجب إنساني وأخلاقي. نسعى دائماً لتطوير أساليبنا وتوسيع شبكة عملائنا لنكون خير عون للأسر في أوقات الحاجة والضيق.</p>
                </div>
            </div>
        </div>
    </main>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // تأثيرات بسيطة للفقرات
    const paragraphs = document.querySelectorAll('.container .row .col-md-10 p');

    paragraphs.forEach(paragraph => {
        // تأثير عند مرور الماوس
        paragraph.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
        });

        paragraph.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
        });

        // تأثير بسيط عند النقر
        paragraph.addEventListener('click', function() {
            this.style.transform = 'translateY(-2px) scale(0.995)';
            setTimeout(() => {
                this.style.transform = 'translateY(-5px)';
            }, 100);
        });
    });

    // تأثير بسيط للهيدر
    const masthead = document.querySelector('.masthead');
    if (masthead) {
        masthead.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
        });

        masthead.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }

    // تأثير ظهور تدريجي للفقرات
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1
    });

    // تطبيق تأثير الظهور
    paragraphs.forEach((paragraph, index) => {
        paragraph.style.opacity = '0';
        paragraph.style.transform = 'translateY(20px)';
        paragraph.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        paragraph.style.transitionDelay = (index * 0.1) + 's';

        observer.observe(paragraph);
    });
});
</script>
@endsection

