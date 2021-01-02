@extends('layouts.app')

@section('content')

    <div class="container flex flex-col mx-auto">


        <x-registration-notifications />

        <h1 class="mb-5 mx-auto">Create Account</h1>

        <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">Name</label>
            <input name="name" placeholder="Full name" autofocus required
                   class="text-input focus:outline-none focus:shadow-outline mb-2" value="{{ old('name') }}">

            <label class="mb-2">Email</label>
            <input name="email" type="email" placeholder="email" required
                   class="text-input focus:outline-none focus:shadow-outline mb-2" value="{{ old('email') }}">

            <label class="mb-2">Password</label>
            <input name="password" type="password" placeholder="password" required
                   class="text-input focus:outline-none focus:shadow-outline">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Register">
        </form>

        <div class="mx-auto text-sm">
            Already a member? Login
            <a href="{{ route('auth.showLogin') }}" class="underline hover:text-gray-400">here</a>.
        </div>
    </div>

@endsection
