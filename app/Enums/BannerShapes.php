<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class BannerShapes extends Enum
{
    public const SQUARE = 1;
    public const RECTANGLE_WIDE = 2;
    public const RECTANGLE_WIDE_LARGE = 3;
    public const RECTANGLE_TALL = 4;

    public static function getShape(int $width, int $height): int
    {
        if ($width > $height) {
            return self::RECTANGLE_WIDE;
        }
        if ($width < $height) {
            return self::RECTANGLE_TALL;
        }
        return self::SQUARE;
    }
}
