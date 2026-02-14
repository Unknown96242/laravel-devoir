<?php

namespace App\Helpers;

class ColorHelper
{
    protected static $colors = [
        'from-blue-500 to-blue-700',
        'from-purple-500 to-purple-700',
        'from-amber-500 to-amber-700',
        'from-accent-500 to-accent-700',
        'from-red-500 to-red-700',
        'from-indigo-500 to-indigo-700',
        'from-green-500 to-green-700',
        'from-pink-500 to-pink-700',
        'from-teal-500 to-teal-700',
        'from-orange-500 to-orange-700',
    ];

    public static function getAvatarColor(string $identifier): string
    {
        $index = crc32($identifier) % count(self::$colors);
        return self::$colors[$index];
    }
}
