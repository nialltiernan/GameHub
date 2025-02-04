@extends('layouts.app')

@section('content')

    <div class="container flex flex-col mx-auto">


        <x-registration-notifications />

        <h1 class="mb-5 mx-auto">Join the club!</h1>

        <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">Username</label>
            <input name="username" placeholder="Username" autofocus required
                   class="text-input focus:outline-none focus:shadow-outline mb-2" value="{{ old('username') }}">

            <label class="mb-2">Password</label>
            <input name="password" type="password" placeholder="Password" required
                   class="text-input focus:outline-none focus:shadow-outline">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Register">
        </form>

        <div class="mx-auto text-sm">
            Already a member? Login
            <a href="{{ route('auth.showLogin') }}" class="underline hover:text-gray-400">here</a>.
        </div>
    </div>

@endsection
