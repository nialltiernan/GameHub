@extends('layouts.app')

@section('content')

<div class="container flex justify-evenly">
    <div>
        <h1 class="text-blue-500 uppercase tracking-wide font-semibold">Create Account</h1>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input name="name" placeholder="Full name" autofocus required class="text-black"  value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input name="email" type="email" placeholder="email" required class="text-black"  value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-200">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input name="password" type="password" placeholder="password" required class="text-black" >
                        @error('password')
                            <div class="text-red-200">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

@endsection
