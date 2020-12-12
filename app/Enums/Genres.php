<?php
declare(strict_types=1);

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Genres extends Enum
{
    public const ACTION = ['display_name' => 'Action', 'id' => 4];
    public const INDIE = ['display_name' => 'Indie', 'id' => 51];
    public const ADVENTURE = ['display_name' => 'Adventure', 'id' => 3];
    public const RPG = ['display_name' => 'RPG', 'id' => 5];
    public const STRATEGY = ['display_name' => 'Strategy', 'id' => 10];
    public const SHOOTER = ['display_name' => 'Shooter', 'id' => 2];
    public const CASUAL = ['display_name' => 'Casual', 'id' => 40];
    public const SIMULATION = ['display_name' => 'Simulation', 'id' => 14];
    public const PUZZLE = ['display_name' => 'Puzzle', 'id' => 7];
    public const ARCADE = ['display_name' => 'Arcade', 'id' => 11];
    public const PLATFORM = ['display_name' => 'Platform', 'id' => 83];
    public const RACING = ['display_name' => 'Racing', 'id' => 1];
    public const SPORTS = ['display_name' => 'Sports', 'id' => 15];
    public const MASSIVELY_MULTIPLAYER = ['display_name' => 'Massively Multiplayer', 'id' => 59];
    public const FIGHTING = ['display_name' => 'Fighting', 'id' => 6];
    public const FAMILY = ['display_name' => 'Family', 'id' => 19];
    public const BOARD_GAMES = ['display_name' => 'Board Games', 'id' => 28];
    public const EDUCATIONAL = ['display_name' => 'Educational', 'id' => 34];
    public const CARD = ['display_name' => 'Card', 'id' => 17];

    public static function getIdToNameMappings(): array
    {
        $genres = [];
        foreach (self::values() as $enum) {
            $genre = $enum->getValue();
            $genres[$genre['id']] = $genre['display_name'];
        }
        return $genres;
    }
}
