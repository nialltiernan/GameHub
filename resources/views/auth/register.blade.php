@extends('layouts.app')

@section('content')

<div class="container flex justify-evenly">
    <div>
        <h1 class="mb-2">Create Account</h1>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input name="name" placeholder="Full name" autofocus required class="text-input focus:outline-none focus:shadow-outline"  value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input name="email" type="email" placeholder="email" required class="text-input focus:outline-none focus:shadow-outline"  value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-200">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input name="password" type="password" placeholder="password" required class="text-input focus:outline-none focus:shadow-outline" >
                        @error('password')
                            <div class="text-red-200">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="button-primary hover:bg-blue-700 ">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection
