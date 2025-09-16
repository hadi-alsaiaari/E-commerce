<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\ResetPasswordRequest;
use App\Services\Auth\PasswordService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ResetPasswordController extends Controller implements HasMiddleware
{
    public $password_service;

    public function __construct()
    {
        $this->password_service = new PasswordService;
    }

    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin'),
            new Middleware(middleware: 'throttle:10', only: ['sendOtp']),
        ];
    }

    public function showResetForm($email)
    {
        return view('dashboard.auth.passwords.reset', ['email' => $email]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $validated_data = $request->validated();

        $otp = $this->password_service->verifyOtpCode($validated_data['email'], $validated_data['code']);
        if ($otp == false)
            return redirect()->back()->withErrors(['code' => __('auth.invalid_code')]);

        $admin = $this->password_service->resetPassword('admin', 'email', $validated_data['email'], $validated_data['password']);
        if (!$admin)
            return redirect()->back()->withErrors(['email' => __('auth.failed')]);

        return redirect()->route('dashboard.login')->with('success', __('auth.reset_success'));
    }
}
