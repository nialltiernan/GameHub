<?php
declare(strict_types=1);

namespace App\Services\HTML;


class TitleCreator
{
    public function execute(): string
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

        if (request()->routeIs('genres.index')) {
            return 'Genres';
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
