<?php
declare(strict_types=1);

namespace App\Services\HTML;

use App\Enums\Genres;
use App\Enums\Platforms;

class TitleFactory
{
    public function create(): string
    {
        if (request()->routeIs('gamehub.index')) {
            return 'Homepage';
        }

        if (request()->routeIs('game.show')) {
            return 'Game details';
        }

        if (request()->routeIs('platforms.index')) {
            return 'Platforms';
        }

        if (request()->routeIs('platforms.show')) {
            $platformId = (int) request()->segment(2);
            return Platforms::getDisplayName($platformId);
        }

        if (request()->routeIs('genres.index')) {
            return 'Genres';
        }

        if (request()->routeIs('genres.show')) {
            $genreId = (int) request()->segment(2);
            return Genres::getDisplayName($genreId);
        }

        if (request()->routeIs('auth.showLogin')) {
            return 'Login';
        }

        if (request()->routeIs('auth.showRegister')) {
            return 'Registration';
        }

        if (request()->routeIs('feedback.create')) {
            return 'Feedback';
        }

        return 'GameList';
    }
}
