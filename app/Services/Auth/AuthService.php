<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;
use Illuminate\Support\Facades\RateLimiter;

class AuthService
{
    protected $auth_repository;

    public function __construct()
    {
        $this->auth_repository = new AuthRepository();
    }

    public function login($guard, $credenstials, $remember = false)
    {
        return $this->auth_repository->login($guard, $credenstials, $remember);
    }

    public function logout($guard)
    {
        return $this->auth_repository->logout($guard);
    }

    public function checkRateLimiter(string $throttle_key, int $num_attempts)
    {
        if (RateLimiter::tooManyAttempts($throttle_key, $num_attempts)) {
            $seconds = RateLimiter::availableIn($throttle_key);
            return $seconds;
        }
        RateLimiter::hit($throttle_key);
        return false;
    }
}
