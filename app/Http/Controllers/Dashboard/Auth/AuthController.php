<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    protected $auth_service;

    public function __construct()
    {
        $this->auth_service = new AuthService();
    }

    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
            new Middleware(middleware: 'auth:admin', only: ['logout']),
        ];
    }

    public function loginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if($seconds = $this->auth_service->checkRateLimiter('login-' . $request->ip(), 3))
            return redirect()->back()->withErrors(['email' => __('auth.throttle', ['seconds' => $seconds])]);

        if (!$this->auth_service->login('admin', $request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->back()->withErrors(['email' => __('auth.failed')]);
        }

        return redirect()->intended(route('dashboard.index'));
    }

    public function logout()
    {
        $this->auth_service->logout('admin');
        return redirect()->route('dashboard.login');
    }
}
