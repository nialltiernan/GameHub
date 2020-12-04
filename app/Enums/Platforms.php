<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Platforms extends Enum
{
    public const PC = ['display_name' => 'PC', 'id' => 4];
    public const PLAYSTATION_4 = ['display_name' => 'PlayStation 4', 'id' => 18];
    public const PLAYSTATION_5 = ['display_name' => 'PlayStation 5', 'id' => 187];
    public const XBOX_ONE = ['display_name' => 'Xbox One', 'id' => 1];
    public const NINTENDO_SWITCH = ['display_name' => 'Nintendo Switch', 'id' => 7];
}
