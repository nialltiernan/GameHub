<?php
declare(strict_types=1);

namespace App\Services\RAWG;

class UrlConverter
{
    public static function cropImage600x400($url): string
    {
        $url = str_replace('/media/games/','/media/crop/600/400/games/', $url);
        return str_replace('/media/screenshots/', '/media/crop/600/400/screenshots/', $url);
    }
}
