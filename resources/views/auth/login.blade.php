@extends('layouts.app')

@section('content')
    <div class="container flex justify-evenly">
        <div class="relative">

            <x-login-notifications />

            <h1 class="mb-2">Login</h1>
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input name="email" type="email" class="text-input focus:outline-none focus:shadow-outline" autofocus required placeholder="email" value="{{ old('email') }}"><br>
                            @error('email')
                                <div class="text-red-200">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input name="password" type="password" class="text-input focus:outline-none focus:shadow-outline" required placeholder="password"><br>
                            @error('password')
                                <div class="text-red-200">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="button-primary hover:bg-blue-700">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

@endsection
