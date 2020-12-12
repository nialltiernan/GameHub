<?php

namespace App\Http\Controllers;

use App\Enums\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index', ['genres' => Genres::getIdToNameMappings()]);
    }

    public function show(Request $request, int $id)
    {
        return 'TODO';
    }

}
