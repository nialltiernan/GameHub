@extends('layouts.app')

@section('content')
    <div class="container flex flex-col mx-auto relative">

        <x-account-notifications />

        <h1 class="mb-2 mx-auto">Change username,</h1>
        <h1 class="mb-5 mx-auto normal-case">{{ Auth::user()->username }}</h1>

        <form action="{{ route('auth.changeUsername') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">Username</label>
            <input name="username" class="text-input focus:outline-none focus:shadow-outline mb-2" autofocus
                   required placeholder="New username">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Change username">
        </form>

        <div class="mx-auto text-sm">
            Go back to your
            <a href="{{ route('account.index') }}" class="underline hover:text-gray-400">account</a>.
        </div>
    </div>

@endsection
