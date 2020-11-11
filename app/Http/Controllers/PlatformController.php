<?php

namespace App\Http\Controllers;

use App\ViewModels\PlatformsViewModel;

class PlatformController extends Controller
{
    public function index()
    {
        $viewModel = new PlatformsViewModel();

        return view('platforms.index', [
            'platforms' => $viewModel->getPlatforms()
        ]);
    }

    public function show(int $id)
    {
        $viewModel = new PlatformsViewModel();

        return view('platforms.show', [
            'platforms' => $viewModel->getPlatforms(),
            'selectedPlatform' => $viewModel->getSelectedPlatform($id),
            'platformId' => $id
        ]);
    }
}
