<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Platforms extends Enum
{
    public const NINTENDO_65 = 4;
    public const WII = 5;
    public const WII_U = 41;
    public const NES = 18;
    public const SNES = 19;
    public const NINTENDO_DS = 20;
    public const NINTENDO_3DS = 37;

    public const GAMECUBE = 21;
    public const GAME_BOY = 33;
    public const GAME_BOY_COLOR = 22;
    public const GAME_BOY_ADVANCE = 24;

    public const SEGA_MEGA_DRIVE = 29;
    public const SEGA_32X = 21;
    public const SEGA_SATURN = 21;
    public const SEGA_GAME_GEAR = 35;

    public const LINUX = 3;
    public const PC = 6;
    public const PC_DOS = 13;
    public const MAC = 14;


    public const STADIA = 170;

    public const ANDROID = 34;
    public const IOS = 39;




    public const COMMODORE_64 = 15;
    public const AMIGA = 16;
    public const N_GAGE = 42;

    public const PLAYSTATION = 7;
    public const PLAYSTATION_PORTABLE = 38;
    public const PLAYSTATION_2 = 8;
    public const PLAYSTATION_3 = 9;
    public const PLAYSTATION_4 = 48;

    public const XBOX = 11;
    public const XBOX_360 = 12;
    public const XBOX_LIVE_ARCADE = 36;
    public const XBOX_ONE = 49;
}
