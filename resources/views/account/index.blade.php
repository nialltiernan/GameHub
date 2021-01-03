@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 relative">

        <x-account-notifications />

        <h1>My Account</h1>
        <h2>Hello, {{ $user->username }}</h2>

        <div class="flex mt-10 flex-col md:flex-row">
            <label class="md:w-1/3">Username</label>
            <input disabled value="{{ $user->username }}"
                   class="text-input focus:outline-none focus:shadow-outline my-2 md:my-0 w-1/2 md:w-1/3">
            <a href="{{ route('auth.showChangeUsername') }}"
               class="bg-blue-500 text-white font-semibold px-2 py-1 hover:bg-blue-600 rounded md:ml-2 w-1/2 md:w-1/3">
                Change username</a>
        </div>

        <div class="flex flex-col md:flex-row my-5">
            <label class="md:w-1/3">Email address</label>
            <input disabled value="{{ $user->email }}"
                   class="text-input focus:outline-none focus:shadow-outline my-2 md:my-0 w-1/2 md:w-1/3">
            <a href="{{ route('auth.showChangeEmail') }}"
               class="bg-blue-500 text-white font-semibold px-2 py-1 hover:bg-blue-600 rounded md:ml-2 w-1/2 md:w-1/3">
                Change email</a>
        </div>

        <div class="flex flex-col md:flex-row my-5">
            <label class="md:w-1/3">Password</label>
            <input type="password" disabled value="xxxxxxxxx"
                   class="text-input focus:outline-none focus:shadow-outline my-2 md:my-0 w-1/2 md:w-1/3">
            <a href="{{ route('auth.showChangePassword')}}"
               class="bg-blue-500 text-white font-semibold px-2 py-1 hover:bg-blue-600 rounded md:ml-2 w-1/2 md:w-1/3">
                Change password</a>
        </div>

        <div class="flex flex-col md:flex-row-reverse my-5">
            <a href="{{ route('account.delete') }}"
               class="bg-red-500 text-white font-semibold px-2 py-1 hover:bg-red-600 rounded w-1/2 md:w-1/3"
               onclick="return confirm('Are you really sure you want to delete your account?');">
                Delete account
            </a>
        </div>

    </div>
@endsection
