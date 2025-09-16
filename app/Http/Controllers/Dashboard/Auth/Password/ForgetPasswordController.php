<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\ForgetPasswordRequest;
use App\Services\Auth\PasswordService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ForgetPasswordController extends Controller implements HasMiddleware
{
    public $password_service;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->password_service = new PasswordService;
    }

    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin'),
            new Middleware(middleware: 'throttle:3', only: ['sendOtp']),
        ];
    }

    public function showEmailForm()
    {
        return view('dashboard.auth.passwords.email');
    }

    public function sendOtp(ForgetPasswordRequest $request)
    {
        $admin = $this->password_service->sendOtp('admin', 'email', $request->only('email'));
        if (!$admin)
            return redirect()->back()->withErrors(['email' => __('auth.failed')]);

        return redirect()->route('dashboard.password.verify', ['email' => $admin->email]);
    }
}
