<?php

namespace App\Enums;

class Role
{
    const ADMIN = 'admin';
    const USER = 'user';
    const GUEST = 'guest';

    public static function all()
    {
        return [
            self::ADMIN,
            self::USER,
            self::GUEST,
        ];
    }
}
