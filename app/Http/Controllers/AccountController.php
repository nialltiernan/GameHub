<?php

namespace App\Http\Controllers;

use Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index', ['user' => Auth::user()]);
    }

    public function delete()
    {
        $user = Auth::user();
        Auth::logout();

        $user->delete();

        return redirect()->route('gamehub.index')->with('accountDeleted', 'You have deleted your account. We are sad to see you go');
    }
}
