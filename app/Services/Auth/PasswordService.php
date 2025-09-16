<?php

namespace App\Services\Auth;

use App\Notifications\SendOtpNotify;
use App\Repositories\Auth\PasswordRepository;

class PasswordService
{
    public $password_repository;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->password_repository = new PasswordRepository;
    }

    public function sendOtp($model, $field, $value)
    {
        $admin = $this->password_repository->getUserBy($model, $field, $value);
        if (!$admin)
            return false;

        $admin->notify(new SendOtpNotify());

        return $admin;
    }

    public function verifyOtpCode($email, $code)
    {
        $otp = $this->password_repository->verifyOtpCode($email, $code);
        return $otp->status;
    }

    public function resetPassword($model, $field, $value, $password)
    {
        return $this->password_repository->resetPassword($model, $field, $value, $password);
    }
}
