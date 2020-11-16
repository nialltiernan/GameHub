<?php

namespace App\ViewModels;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class GameViewModel extends ViewModel
{

    private const LINK_OFFICIAL = 1;
    private const LINK_WIKIA = 2;
    private const LINK_WIKIPEDIA = 3;
    private const LINK_FACEBOOK = 4;
    private const LINK_TWITTER = 5;
    private const LINK_TWITCH = 6;
    private const LINK_INSTAGRAM = 8;
    private const LINK_YOUTUBE = 9;
    private const LINK_STEAM = 13;
    private const LINK_REDDIT = 14;
    private const LINK_DISCORD = 18;

    
    private $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function data()
    {
        return collect($this->game)->merge([
            'coverImageUrl' => self::convertUrlThumbnailToBigCover($this->game),
            'rating' => self::formatRating($this->game),
            'publisher' => $this->getPublisher(),
            'genres' => $this->getGenres(),
            'platforms' => self::formatPlatforms($this->game),
            'screenshots' => $this->getScreenshots(),
            'similar_games' => $this->getSimilarGames(),
            'social_links' => $this->getSocialLinks()
        ])->toArray();
    }

    private static function convertUrlThumbnailToBigCover($game)
    {
        return isset($game['cover']['url']) ?
            Str::replaceFirst('t_thumb', 't_cover_big', $game['cover']['url']) : '/images/game-not-found.png';
    }

    private static function formatRating($game)
    {
        return isset($game['rating']) ? $game['rating'] / 100 : '';
    }

    private static function formatPlatforms($game)
    {
        return isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : '';
    }

    private function getPublisher()
    {
        return isset($this->game['involved_companies'][0]['company']['name']) ?
            $this->game['involved_companies'][0]['company']['name'] :
            '';
    }

    private function getGenres(): string
    {
        return isset($this->game['genres']) ? collect($this->game['genres'])->pluck('name')->implode(', ') : '';
    }

    private function getScreenshots()
    {
        return isset($this->game['screenshots']) ?
            collect($this->game['screenshots'])->map(function ($screenshot) {
                return collect($screenshot)->merge([
                    'url' => Str::replaceFirst('t_thumb', 't_720p', $screenshot['url']),
                ]);
            }) : [];
    }

    private function getSimilarGames()
    {
        return isset($this->game['similar_games']) ?
            collect($this->game['similar_games'])->map(function ($similarGame) {
                return collect($similarGame)->merge([
                    'url' => self::convertUrlThumbnailToBigCover($similarGame),
                    'rating' => self::formatRating($similarGame),
                    'platforms' => self::formatPlatforms($similarGame)
                ]);
            }) : [];
    }

    private function getSocialLinks()
    {
        if (!isset($this->game['websites'])) {
            return [];
        }
        $linkCategories = collect($this->game['websites'])->pluck('url', 'category')->sortKeys();

        $links = [];
        foreach ($linkCategories as $category => $link) {
            if ($category === self::LINK_OFFICIAL) {
                $links['home'] = $link;
            } elseif ($category === self::LINK_WIKIA) {
                $links['wikia'] = $link;
            } elseif ($category === self::LINK_WIKIPEDIA) {
                $links['wikipedia'] = $link;
            } elseif ($category === self::LINK_FACEBOOK) {
                $links['facebook'] = $link;
            } elseif ($category === self::LINK_TWITTER) {
                $links['twitter'] = $link;
            } elseif ($category === self::LINK_TWITCH) {
                $links['twitch'] = $link;
            } elseif ($category === self::LINK_INSTAGRAM) {
                $links['instagram'] = $link;
            } elseif ($category === self::LINK_YOUTUBE) {
                $links['youtube'] = $link;
            } elseif ($category === self::LINK_STEAM) {
                $links['steam'] = $link;
            } elseif ($category === self::LINK_REDDIT) {
                $links['reddit'] = $link;
            } elseif ($category === self::LINK_DISCORD) {
                $links['discord'] = $link;
            }
        }

        return $links;

    }
}
