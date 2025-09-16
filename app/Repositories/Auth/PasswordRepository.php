<?php

namespace App\Repositories\Auth;

use Ichtrojan\Otp\Otp;

class PasswordRepository
{
    public $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function getUserBy($model, $field, $value)
    {
        $user = getModel($model);
        return $user::where($field, $value)->first();
    }

    public function verifyOtpCode($email, $code)
    {
        return $this->otp->validate($email, $code);
    }

    public function resetPassword($model, $field, $value, $password)
    {
        $user = self::getUserBy($model, $field, $value);
        if (!$user)
            return false;

        $user = $user->update([
            'password' => $password,
        ]);
        return $user;
    }
}
