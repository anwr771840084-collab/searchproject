<?php $__env->startSection("title", "layout-static - SB Admin"); ?>
<?php $__env->startSection("body_class", ""); ?> 

<?php $__env->startSection("content"); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">المفقودات</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo e(route("dashboard")); ?>">لوحة التحكم</a></li>
        <li class="breadcrumb-item active">المفقودات</li>
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

<h1 style="text-align:center">جدول المفقودات</h1>

<table>
  <tr>
    <th>الاسم</th>
    <th>البريد الالكتروني</th>
    <th>رقم الهاتف</th>
    <th>المفقود</th>
    <th>رساله</th>
    <th>الحالة</th>
    <th>التاريخ</th>
    <th>الإجراءات</th>
  </tr>
<?php if(@isset($data) and !@empty($data)): ?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($info->name); ?></td>
     <td><?php echo e($info->email); ?></td>
     <td><?php echo e($info->phone); ?></td>
     <td>
        <?php if($info->image): ?>
            <img src="<?php echo e(asset($info->image)); ?>" alt="صورة الشيء المفقود" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
        <?php else: ?>
            <span style="color: #999;">لا توجد صورة</span>
        <?php endif; ?>
     </td>
      <td><?php echo e($info->massage); ?></td>
      <td>
        <?php if($info->is_delivered): ?>
            <span class="badge bg-success text-white p-2 rounded">تم التسليم</span>
        <?php else: ?>
            <span class="badge bg-warning text-dark p-2 rounded">قيد الانتظار</span>
        <?php endif; ?>
      </td>
      <td><?php echo e($info->created_at); ?></td>
      <td>
        <form action="<?php echo e(route('posts.toggle-delivery', $info->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn <?php echo e($info->is_delivered ? 'btn-danger' : 'btn-success'); ?> btn-sm text-white" style="border-radius: 20px; padding: 5px 15px;">
                <?php echo e($info->is_delivered ? 'إلغاء التسليم' : 'تسليم'); ?>

            </button>
        </form>
      </td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
</table>


</body>
</html>



<?php $__env->stopSection(); ?>

<?php $__env->startPush("scriptss"); ?>
<!-- يمكن إضافة أي سكريبتات خاصة بهذه الصفحة هنا -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Desktop\search-project\resources\views\admin\layout-static.blade.php ENDPATH**/ ?>