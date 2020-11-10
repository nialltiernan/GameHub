@extends('layouts.app')

@section('content')
    <div class="flex">
        <ul>
            <?php
            $genres = [
                'Fighting' => 4,
                'Shooter' => 5,
                'Music' => 7,
                'Platform' => 8,
                'Puzzle' => 9,
                'Racing' => 10,
                'Real time strategy' => 11,
                'Simulator' => 12,
                'Turn based strategy' => 16,
                'Tactical' => 24,
                'Quiz' => 26,
                'Hack and slash' => 25,
                'Pinball' => 30,
                'Adventure' => 31,
                'Arcade' => 33,
                'Visual Novel' => 34,
                'Indie' => 32,
                'Card and board game' => 35,
                'MOBA' => 36,
                'Point-and-click' => 2,
            ];
            ?>
            @foreach($genres as $genre => $id)
                <li class="hover:text-blue-600 transform hover:translate-x-5">

                </li>
            @endforeach
        </ul>
    </div> {{--end container--}}
@endsection
