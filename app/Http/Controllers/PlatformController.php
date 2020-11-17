<?php

namespace App\Http\Controllers;

use App\ViewModels\PlatformsViewModel;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $viewModel = new PlatformsViewModel();

        return view('platforms.index', [
            'platforms' => $viewModel->getPlatforms()
        ]);
    }

    public function show(Request $request, int $id)
    {
        $viewModel = new PlatformsViewModel();


        return view('platforms.show', [
            'platforms' => $viewModel->getPlatforms(),
            'selectedPlatform' => $viewModel->getSelectedPlatform($id),
            'platformId' => $id,
            'limit' => $request->input('limit', 12),
            'limitOptions' => [12, 24, 48],
            'sort' => $request->input('sort', 'aggregated_rating'),
            'sortOptions' => ['aggregated_rating' => 'Critic review', 'rating' => 'User review'],
            'order' => $request->input('order', 'desc'),
            'orderOptions' => ['asc' => 'Worst', 'desc' => 'Best']
        ]);
    }
}
