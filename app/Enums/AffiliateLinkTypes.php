<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class AffiliateLinkTypes extends Enum
{
    public const TEXT = 1;
    public const BANNER = 2;

    public static function getLinkType(string $linkType): int
    {
        $linkType = strtoupper($linkType);
        $enum = self::$linkType();
        return $enum->getValue();
    }
}
