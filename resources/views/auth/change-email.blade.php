@extends('layouts.app')

@section('content')
    <div class="container flex flex-col mx-auto relative">

        <x-account-notifications />

        <h1 class="mb-5 mx-auto">Change email address</h1>

        <form action="{{ route('auth.changeEmail') }}" method="POST" class="flex flex-col mx-auto mb-2">
            @csrf

            <label class="mb-2">New Email</label>
            <input name="email" type="email" class="text-input focus:outline-none focus:shadow-outline mb-2" autofocus
                   required placeholder="New email">

            <label class="mb-2">Confirm email</label>
            <input name="emailConfirmation" type="email" class="text-input focus:outline-none focus:shadow-outline" required
                   placeholder="Confirm email">

            <input type="submit" class="button-primary hover:bg-blue-700 mt-5" value="Change email">
        </form>

        <div class="mx-auto text-sm">
            Go back to your
            <a href="{{ route('account.index') }}" class="underline hover:text-gray-400">account</a>.
        </div>
    </div>

@endsection
