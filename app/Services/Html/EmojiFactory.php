<?php
declare(strict_types=1);

namespace App\Services\Html;


class EmojiFactory
{
    public static function happy(): string
    {
       $codes = [
           '&#128125;', // 👽
           '&#128512;', // 😀
           '&#128514;', // 😂
           '&#127752;', // 🌈
           '&#x1F31D;', // 🌝
           '&#x1F44D;', // 👍

       ];
       $key = array_rand($codes);

       return $codes[$key];
    }
}
