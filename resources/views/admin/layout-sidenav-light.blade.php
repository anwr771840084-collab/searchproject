@extends("layouts.master")

@section("title", "layout-sidenav-light - SB Admin")
@section("body_class", "") {{-- Remove sb-nav-fixed class for static navigation --}}

@section("content")
<div class="container-fluid px-4">
    <h1 class="mt-4">المحصولات</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">لوحة التحكم</a></li>
        <li class="breadcrumb-item active">المحصولات</li>
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

<h1 style="text-align:center">جدول المحصولات</h1>

<table>
   <tr>
    <th>الاسم</th>
    <th>البريد الالكتروني</th>
    <th>رقم الهاتف</th>
    <th>العنوان</th>
    <th>المحصول</th>
    <th>رساله</th>
    <th>الحالة</th>
    <th>التاريخ</th>
    <th>الإجراءات</th>
  </tr>
@if (@isset($data) and !@empty($data))

@foreach ($data as $db )
<tr>
    <td>{{ $db->name }}</td>
     <td>{{ $db->email}}</td>
     <td>{{ $db->phone}}</td>
     <td>{{ $db->address }}</td>
     <td>
        @if($db->image)
            <img src="{{ asset($db->image) }}" alt="صورة الشيء المحصول" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
        @else
            <span style="color: #999;">لا توجد صورة</span>
        @endif
     </td>
      <td>{{ $db->message}}</td>
      <td>
        @if($db->is_delivered)
            <span class="badge bg-success text-white p-2 rounded">تم التسليم</span>
        @else
            <span class="badge bg-warning text-dark p-2 rounded">قيد الانتظار</span>
        @endif
      </td>
      <td>{{ $db->created_at}}</td>
      <td>
        <form action="{{ route('helps.toggle-delivery', $db->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn {{ $db->is_delivered ? 'btn-danger' : 'btn-success' }} btn-sm text-white" style="border-radius: 20px; padding: 5px 15px;">
                {{ $db->is_delivered ? 'إلغاء التسليم' : 'تسليم' }}
            </button>
        </form>
      </td>

</tr>

@endforeach

@endif
</table>


</body>
</html>



@endsection

@push("scriptss")
<!-- يمكن إضافة أي سكريبتات خاصة بهذه الصفحة هنا -->
@endpush
