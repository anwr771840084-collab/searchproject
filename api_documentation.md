# 📘 توثيق الـ API (نسخة V1)

هذا الدليل يشرح كيفية التعامل مع واجهة برمجة التطبيقات (API) الخاصة بمشروع البحث عن المفقودات، والتي تم تصميمها لتخدم تطبيقات الموبايل (Flutter/React Native) ولوحات التحكم.

---

## 🔐 التحقق من الهوية (Authentication)
المشروع يستخدم **Laravel Sanctum** للتحقق من الهوية عبر الـ Tokens.

- **قاعدة الروابط:** `http://your-domain.com/api/v1`
- **Headers المطلوبة للعمليات المحمية:**
  - `Accept: application/json`
  - `Authorization: Bearer {YOUR_TOKEN}`

---

## 📑 روابط العمليات (Endpoints)

### 1. المصادقة (Auth)
| العملية | الرابط | الوصف | الخصائص المطلوبة |
| :--- | :--- | :--- | :--- |
| **POST** | `/auth/login` | تسجيل الدخول | `username`, `password` |
| **GET** | `/auth/me` | بيانات المستخدم الحالي | (محمي بـ Token) |
| **POST** | `/auth/logout` | تسجيل الخروج | (محمي بـ Token) |

### 2. المفقودات (Posts)
| العملية | الرابط | الوصف | الخصائص المطلوبة |
| :--- | :--- | :--- | :--- |
| **GET** | `/posts` | جلب كافة المفقودات | (عام) |
| **POST** | `/posts` | إضافة مفقود جديد | `name`, `email`, `phone`, `address`, `message`, `image` |
| **POST** | `/posts/{id}/toggle-delivery` | تغيير حالة التسليم | (محمي - للمسؤولين) |
| **DELETE** | `/posts/{id}` | حذف منشور | (محمي - للمسؤولين) |

### 3. المحصولات/المساعدات (Helps)
| العملية | الرابط | الوصف | الخصائص المطلوبة |
| :--- | :--- | :--- | :--- |
| **POST** | `/helps` | إضافة طلب مساعدة/محصول | `name`, `email`, `phone`, `address`, `message`, `image` |
| **GET** | `/helps` | عرض قائمة طلبات المساعدة | (محمي - للمسؤولين) |
| **POST** | `/helps/{id}/toggle-delivery` | تغيير حالة التسليم | (محمي - للمسؤولين) |
| **DELETE** | `/helps/{id}` | حذف طلب مساعدة | (محمي - للمسؤولين) |

---

## 📦 هيكل البيانات (Data Structure)

### مثال لطلب إضافة (POST request for Helps/Posts):
```json
{
    "name": "أحمد محمد",
    "email": "ahmed@example.com",
    "phone": "0590000000",
    "address": "غزة - الرمال - شارع الجلاء",
    "message": "وجدت محفظة سوداء بالقرب من المسجد",
    "image": (اختياري - صورة بصيغة Multipart/form-data)
}
```

### مثال لاستجابة ناجحة (Successful Response):
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "أحمد محمد",
        "email": "ahmed@example.com",
        "phone": "0590000000",
        "address": "غزة - الرمال - شارع الجلاء",
        "image_url": "http://domain.com/images2/167890123.jpg",
        "message": "وجدت محفظة سوداء...",
        "is_delivered": false,
        "created_at": "2024-04-19 23:10:00"
    },
    "message": "Help request created successfully."
}
```

---

## ⚠️ ملاحظات هامة:
1. **الصور:** عند إرسال الصور عبر الـ API، يجب استخدام `multipart/form-data`.
2. **التحقق من البيانات (Validation):** جميع الحقول (Name, Email, Phone, Address, Message) هي حقول **إجبارية**، بينما الصورة اختيارية.
3. **حقل العنوان:** تم تفعيل حقل `address` برمجياً في الـ API ليعمل بالتوازي مع الموقع الإلكتروني، مما يضمن مزامنة كاملة للبيانات.

---

> [!TIP]
> إذا كنت تقوم بالتطوير باستخدام Flutter، تأكد من استخدام مكتبة `http` أو `dio` وإرسال الـ `Authorization Bearer Token` في جميع الروابط المحمية.
