<?php

namespace App\Http\Controllers;

use App\Rawg\Filters\PaginationFilter;
use App\Services\Rawg\ClientRetriever;

class AchievementController extends Controller
{
    private const PAGE_SIZE = 200;

    public function show($id, ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();

        $paginationFilter = new PaginationFilter();
        $paginationFilter->setPageSize(self::PAGE_SIZE);

        $achievements = $client->games()->getAchievements($id, $paginationFilter)->getData()['results'];

        return view('achievements.show', ['gameId' => $id, 'achievements' => $achievements]);
    }
}
