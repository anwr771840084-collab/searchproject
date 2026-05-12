<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create(){
        return view('auth.accountlogin');

    }
    public function store(Request $request)  {
        // 1. التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $result = $this->authService->registerOrUpdate($validatedData);

        if ($result['status'] === 'exists') {
            return back()->withErrors([
                'username' => 'هذا المستخدم موجود بالفعل بنفس كلمة المرور.',
            ])->withInput();
        }

        // 5. إعادة توجيه المستخدم إلى صفحة أخرى مع رسالة نجاح
        return redirect('/dashboard')->with('success', 'تم تسجيل المستخدم بنجاح!');
    }
    public function dash()
    {
       $users = User::select('id', 'username', 'password', 'created_at')->get();

        // تمرير البيانات إلى الـ view الموجود في مجلد admin
        return view('admin.index', compact('users'));

    }
}


