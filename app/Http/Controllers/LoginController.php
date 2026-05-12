<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
 return view('admin.login');
    }


    /**
     * التعامل مع طلب المصادقة.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // 1. التحقق من صحة المدخلات (Validation)
        $credentials = $request->validate([
            'username' => ['required'], // اسم الحقل يجب أن يطابق اسم الحقل في نموذج HTML
            'password' => ['required'],
        ]);

        // 2. محاولة تسجيل دخول المستخدم
        if (Auth::attempt($credentials)) {
            // 3. إذا نجحت المصادقة
            $request->session()->regenerate(); // إعادة إنشاء الجلسة للحماية من هجمات Session Fixation

            // 4. توجيه المستخدم إلى لوحة التحكم
            return redirect()->intended('dashboard'); // 'dashboard' هو المسار الذي تريد توجيه المستخدم إليه بعد النجاح
        }

        // 5. إذا فشلت المصادقة
        return back()->withErrors([
            'username' => 'البيانات غير صحيحة.',
        ])->onlyInput('username');
    }
}

