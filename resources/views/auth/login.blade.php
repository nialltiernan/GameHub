@extends('layouts.app')

@section('content')
    <div class="container flex justify-evenly">
        <div>
            @if (session('failure'))
                <div>
                    {{ session('failure') }}
                </div>
            @endif

            <h1 class="text-blue-500 uppercase tracking-wide font-semibold">Login</h1>
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input name="email" type="email" class="text-black" autofocus placeholder="email" value="{{ old('email') }}"><br>
                            @error('email')
                                <div class="text-red-200">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input name="password" type="password" class="text-black" placeholder="password"><br>
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
