@extends('layouts.app')

@section('content')
    <div class="container flex flex-col mx-auto relative">

        <x-account-notifications />

        <h1 class="mb-5 mx-auto">Change password</h1>

        <form action="{{ route('auth.changePassword') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">New Password</label>
            <input name="password" type="password" class="text-input focus:outline-none focus:shadow-outline mb-2" autofocus
                   required placeholder="New password">

            <label class="mb-2">Confirm password</label>
            <input name="passwordConfirmation" type="password" class="text-input focus:outline-none focus:shadow-outline" required
                   placeholder="Confirm password">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Change password">
        </form>

        <div class="mx-auto text-sm">
            Go back to your
            <a href="{{ route('account.index') }}" class="underline hover:text-gray-400">account</a>.
        </div>
    </div>

@endsection
