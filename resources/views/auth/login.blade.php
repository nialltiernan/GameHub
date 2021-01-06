@extends('layouts.app')

@section('content')
    <div class="container flex flex-col mx-auto">

        <x-login-notifications/>

        <h1 class="mb-5 mx-auto">Log back into {{ Config::get('app.name') }}</h1>

        <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">Username</label>
            <input name="username" type="text" class="text-input focus:outline-none focus:shadow-outline mb-2" autofocus
                   required placeholder="Username" value="{{ old('username') }}">

            <label class="mb-2">Password</label>
            <input name="password" type="password" class="text-input focus:outline-none focus:shadow-outline" required
                   placeholder="Password">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Login">
        </form>

        <div class="mx-auto text-sm">
            Not already a member? Register
            <a href="{{ route('auth.showRegister') }}" class="underline hover:text-gray-400">here</a>.
        </div>
    </div>

@endsection
