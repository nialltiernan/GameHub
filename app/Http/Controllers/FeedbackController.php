<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    function index()
    {
        $feedbacks = Feedback::all()->sortByDesc('id');
        return view('feedback.index', ['feedbacks' => $feedbacks]);
    }


    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $feedback = new Feedback();
        $feedback->email = $request->input('email');
        $feedback->comment = $request->input('comment');
        $feedback->save();

        return redirect()->route('gamehub.index')->with('feedbackReceived', 'Thanks for the feedback!');
    }
}
