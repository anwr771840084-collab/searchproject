@extends("layouts.master")

@section("title", "لوحة التحكم - SB Admin")

@push("styless")
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
@endpush

@section("content")
<div class="container-fluid px-4">
    <h1 class="mt-4">لوحة التحكم</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">لوحة التحكم</li>
    </ol>

    <!DOCTYPE html>
    <html>
    <head>
    <style>
    /* --- بداية كود CSS الحديث --- */

    /* إعدادات الخطوط والمتغيرات اللونية */
    :root {
        --primary-color: #6a11cb;
        --secondary-color: #2575fc;
        --row-hover-color: #f1f5f9;
        --table-border-color: #e2e8f0;
        --font-family: 'Poppins', sans-serif; /* خط عصري، يمكنك استبداله بخط النظام */
    }

    /* عنوان الجدول */
    h1 {
        font-family: var(--font-family);
        color: #333;
        font-weight: 600;
    }

    /* تصميم الجدول الرئيسي */
    table {
      font-family: var(--font-family), Arial, Helvetica, sans-serif;
      border-collapse: separate; /* مهم للزوايا الدائرية */
      border-spacing: 0;
      width: 100%;
      margin-top: 1.5rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border-radius: 12px; /* زوايا دائرية للجدول بالكامل */
      overflow: hidden; /* لإخفاء الزوايا الحادة للخلايا */
    }

    /* تصميم خلايا الرأس والبيانات */
    td, th {
      padding: 16px;
      text-align: center; /* توسيط النص في كل الخلايا */
      border-bottom: 1px solid var(--table-border-color);
      border-right: 1px solid var(--table-border-color);
      transition: background-color 0.3s ease;
    }
    /* إزالة الحدود المكررة */
    td:last-child, th:last-child {
        border-right: none;
    }
    tr:last-child td {
        border-bottom: none;
    }

    /* تصميم رأس الجدول */
    th {
      background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
      color: white;
      font-weight: 600;
      text-transform: uppercase; /* لجعل الحروف كبيرة */
      letter-spacing: 0.5px;
      border-top: none;
    }

    /* تصميم صفوف البيانات */
    tr {
        background-color: #fff;
    }

    /* تأثير المرور على الصفوف */
    tr:hover {
        background-color: var(--row-hover-color);
    }

    /* إزالة تأثير المرور من رأس الجدول */
    thead tr:hover {
        background-color: transparent;
    }

    /* --- نهاية كود CSS الحديث --- */
    </style>
    </head>
    <body>

    <h1 style="text-align:center">جدول المسؤولين</h1>

    <table>
      <tr>
        <th>رقم</th>
        <th>اسم المستخدم</th>
        <th>تاريخ الإنشاء</th>
      </tr>
                @forelse ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->username }}</th>
                        <th>{{ $user->created_at}}</th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">لا يوجد مستخدمون لعرضهم.</td>
                    </tr>
                @endforelse
    </table>

    </body>
    </html>

</div>
@endsection

@push("scriptss")
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset("assets/demo/chart-area-demo.js") }}"></script>
<script src="{{ asset("assets/demo/chart-bar-demo.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset("js/datatables-simple-demo.js") }}"></script>
@endpush
