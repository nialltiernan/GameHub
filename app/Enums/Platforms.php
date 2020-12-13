<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Platforms extends Enum
{
    public const PC = ['display_name' => 'PC', 'id' => 4];
    public const MAC_OS = ['display_name' => 'macOS', 'id' => 5];
    public const LINUX = ['display_name' => 'Linux', 'id' => 6];

    public const PLAYSTATION = ['display_name' => 'PlayStation', 'id' => 27];
    public const PLAYSTATION_2 = ['display_name' => 'PlayStation 2', 'id' => 15];
    public const PLAYSTATION_3 = ['display_name' => 'PlayStation 3', 'id' => 16];
    public const PLAYSTATION_4 = ['display_name' => 'PlayStation 4', 'id' => 18];
    public const PLAYSTATION_5 = ['display_name' => 'PlayStation 5', 'id' => 187];
    public const PLAYSTATION_PORTABLE = ['display_name' => 'PSP', 'id' => 17];
    public const PLAYSTATION_VITA = ['display_name' => 'PS Vita', 'id' => 19];

    public const XBOX = ['display_name' => 'Xbox', 'id' => 80];
    public const XBOX_360 = ['display_name' => 'Xbox 360', 'id' => 14];
    public const XBOX_ONE = ['display_name' => 'Xbox One', 'id' => 1];
    public const XBOX_SERIES_X = ['display_name' => 'Xbox Series S/X', 'id' => 186];

    public const NINTENDO_64 = ['display_name' => 'Nintendo 64', 'id' => 83];
    public const GAME_CUBE = ['display_name' => 'GameCube', 'id' => 105];
    public const GAMEBOY = ['display_name' => 'Game Boy', 'id' => 26];
    public const GAMEBOY_COLOR = ['display_name' => 'Game Boy Color', 'id' => 43];
    public const GAMEBOY_ADVANCE = ['display_name' => 'Game Boy Advance', 'id' => 24];
    public const NINTENDO_DS = ['display_name' => 'Nintendo DS', 'id' => 9];
    public const NINTENDO_3DS = ['display_name' => 'Nintendo 3DS', 'id' => 8];
    public const NINTENDO_DSI = ['display_name' => 'Nintendo DSi', 'id' => 13];
    public const WII = ['display_name' => 'Wii', 'id' => 11];
    public const WII_U = ['display_name' => 'Wii U', 'id' => 10];
    public const NINTENDO_SWITCH = ['display_name' => 'Nintendo Switch', 'id' => 7];

    public const IOS = ['display_name' => 'iOS', 'id' => 3];
    public const ANDROID = ['display_name' => 'Android', 'id' => 21];

    public const MACINTOSH = ['display_name' => 'Classic Macintosh', 'id' => 55];
    public const APPLE_II = ['display_name' => 'Apple II', 'id' => 41];

    public const COMMODORE = ['display_name' => 'Commodore / Amiga', 'id' => 166];
    public const SNES = ['display_name' => 'SNES', 'id' => 79];
    public const NES = ['display_name' => 'Nintendo 64', 'id' => 49];
    public const DREAMCAST = ['display_name' => 'Dreamcast', 'id' => 106];
    public const THREE_D_0 = ['display_name' => '3DO', 'id' => 111];
    public const JAGUAR = ['display_name' => 'Jaguar', 'id' => 112];
    public const GAME_GEAR = ['display_name' => 'Game Gear', 'id' => 77];
    public const NEO_GEO = ['display_name' => 'Neo Geo', 'id' => 12];

    public const ATARI_7800 = ['display_name' => 'Atari 7800', 'id' => 28];
    public const ATARI_5200 = ['display_name' => 'Atari 5200', 'id' => 31];
    public const ATARI_2600 = ['display_name' => 'Atari 2600', 'id' => 23];
    public const ATARI_FLASHBACK = ['display_name' => 'Atari Flashback', 'id' => 22];
    public const ATARI_8_BIT = ['display_name' => 'Atari 8-bit', 'id' => 25];
    public const ATARI_ST = ['display_name' => 'Atari ST', 'id' => 34];
    public const ATARI_LYNX = ['display_name' => 'Atari Lynx', 'id' => 46];
    public const ATARI_XEGS = ['display_name' => 'Atari XEGS', 'id' => 50];

    public const SEGA_SATURN = ['display_name' => 'SEGA Saturn', 'id' => 107];
    public const SEGA_CD = ['display_name' => 'SEGA CD', 'id' => 119];
    public const SEGA_32X = ['display_name' => 'SEGA 32X', 'id' => 117];
    public const SEGA_MASTER_SYSTEM = ['display_name' => 'SEGA Master System', 'id' => 74];

    public static function getDisplayName($id): string
    {
        foreach (self::values() as $enum) {
            $platform = $enum->getValue();
            if ($platform['id'] === $id) {
                return $platform['display_name'];
            }
        }
        return '';
    }

    public static function getIdToNameMappings(): array
    {
        $platforms = [];
        foreach (self::values() as $enum) {
            $platform = $enum->getValue();
            $platforms[$platform['id']] = $platform['display_name'];
        }
        return $platforms;
    }
}
