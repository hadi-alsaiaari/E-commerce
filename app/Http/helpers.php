<?php

if (!function_exists('apiResponse')) {
    function getModel(string $type)
    {
        return match ($type) {
            'user' => App\Models\User::class,
            'admin' => App\Models\Admin::class,
            default => null,
        };
    }
}
