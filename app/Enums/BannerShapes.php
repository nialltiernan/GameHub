<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class BannerShapes extends Enum
{
    public const SQUARE_SMALL = 1;
    public const SQUARE_MEDIUM = 2;
    public const SQUARE_LARGE = 3;

    public const RECTANGLE_HORIZONTAL_SMALL = 4;
    public const RECTANGLE_HORIZONTAL_MEDIUM = 5;
    public const RECTANGLE_HORIZONTAL_LARGE = 6;

    public const RECTANGLE_VERTICAL = 8;

    public static function getShape(int $width, int $height): int
    {
        if ($width > $height) {
            if ($width <= 200) {
                return self::RECTANGLE_HORIZONTAL_SMALL;
            }
            if ($width >= 500) {
                return self::RECTANGLE_HORIZONTAL_LARGE;
            }
            return self::RECTANGLE_HORIZONTAL_MEDIUM;
        }
        if ($width < $height) {
            return self::RECTANGLE_VERTICAL;
        }
        if ($width >= 400) {
            return self::SQUARE_LARGE;
        }
        return self::SQUARE_MEDIUM;
    }

    public static function getShapeName(int $shape): string
    {
        $enum = new self($shape);
        return $enum->getKey();
    }
}
