<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * تسجيل مستخدم جديد أو تحديثه بناءً على المنطق الحالي في usercontroller.
     */
    public function registerOrUpdate(array $data)
    {
        $userExists = User::where('username', $data['username'])->exists();

        if ($userExists) {
            $user = User::where('username', $data['username'])->first();

            if (Hash::check($data['password'], $user->password)) {
                return [
                    'status' => 'exists',
                    'user' => $user
                ];
            }
        }

        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return [
            'status' => 'created',
            'user' => $user
        ];
    }

    /**
     * محاولة تسجيل الدخول.
     */
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user;
        }

        return null;
    }

    /**
     * إنشاء رمز الوصول (Sanctum Token) للواحدات المتنقلة أو C#.
     */
    public function createToken(User $user, $deviceName = 'API Token')
    {
        return $user->createToken($deviceName)->plainTextToken;
    }
}
