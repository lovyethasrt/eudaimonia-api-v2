<?php

namespace App\Enums;

enum Roles: string
{
    case Admin = 'admin';
    case Buyer = 'buyer';

    public function abilities(): array
    {
        return match ($this) {
            self::Admin => [
                'products:manage',
                'vouchers:manage'
            ],
            self::Buyer => [
                'purchases:write_self',
            ]
        };
    }
}
