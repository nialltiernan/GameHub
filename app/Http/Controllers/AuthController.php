<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('gamehub.index')
                ->with('loggedIn', sprintf('Welcome back, %s', Auth::user()->username));
        }
        return redirect()->route('auth.showLogin')->with('failure', 'You have entered invalid credentials');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        return redirect()->route('gamehub.index')->with('accountCreated', 'Great, you have registered an account!');
    }

    public function showChangeUsername()
    {
        return view('auth.change-username');
    }

    public function changeUsername(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|unique:users',
        ]);

        $user = Auth::user();

        $user->username = $request->username;
        $user->save();

        return redirect()->route('account.index')->with('usernameChanged', 'Username changed');
    }

    public function showChangeEmail()
    {
        return view('auth.change-email');
    }

    public function changeEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'emailConfirmation' => 'same:email',
        ]);

        $user = Auth::user();

        $user->email = $request->email;
        $user->save();

        return redirect()->route('account.index')->with('emailChanged', 'Email address changed');
    }

    public function showChangePassword()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|min:6',
            'passwordConfirmation' => 'same:password',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('account.index')->with('passwordChanged', 'Password changed');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('gamehub.index')->with('loggedOut', 'You have logged out');
    }
}
