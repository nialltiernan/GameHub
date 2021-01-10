<?php
declare(strict_types=1);

namespace App\Enums;

use App\Exceptions\CouldNotGetShapeException;
use MyCLabs\Enum\Enum;

class BannerShapes extends Enum
{
    public const SQUARE_SMALL = 1;
    public const SQUARE_MEDIUM = 2;
    public const SQUARE_LARGE = 3;

    public const RECTANGLE_WIDE_SMALL = 4;
    public const RECTANGLE_WIDE_MEDIUM = 5;
    public const RECTANGLE_WIDE_LARGE = 6;

    public const RECTANGLE_TALL_SMALL = 7;
    public const RECTANGLE_TALL_MEDIUM = 8;
    public const RECTANGLE_TALL_LARGE = 9;

    /**
     * @param int $width
     * @param int $height
     * @return int
     * @throws \App\Exceptions\CouldNotGetShapeException
     */
    public static function getShape(int $width, int $height): int
    {
        if ($width === $height) {
            return self::SQUARE_MEDIUM;
        }
        if ($width > $height) {
            return self::RECTANGLE_WIDE_MEDIUM;
        }
        if ($width < $height) {
            return self::RECTANGLE_TALL_MEDIUM;
        }
        throw new CouldNotGetShapeException();
    }
}
