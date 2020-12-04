<?php

namespace App\Http\Controllers;

use App\Enums\Platforms;
use App\ViewModels\PlatformsViewModel;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $viewModel = new PlatformsViewModel();

        return view('platforms.index', ['platforms' => $viewModel->getPlatforms()]);
    }

    public function show(Request $request, int $id)
    {
        $viewModel = new PlatformsViewModel();

        return view('platforms.show', [
            'platforms' => $viewModel->getPlatforms(),
            'title' => $this->getTitle($id),
            'platformId' => $id,
            'limit' => (int) $request->input('limit', 12),
            'limitOptions' => [12, 24, 48],
            'order' => $request->input('order', '-rating'),
            'orderOptions' => ['rating' => 'Worst', '-rating' => 'Best']
        ]);
    }

    private function getTitle(int $id): string
    {
        if (request()->input('order', '-rating') === '-rating') {
            return sprintf('Most loved games of %s', Platforms::getPlatformName($id));
        }
        return sprintf('Least loved games of %s', Platforms::getPlatformName($id));
    }
}
