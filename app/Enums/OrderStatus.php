<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case DELIVERED = 'delivered';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function options(): array
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->label()];
        })->toArray();
    }

    public function label(): string
    {
        return __('words.' . $this->value);
    }
}
