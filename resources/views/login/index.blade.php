@extends('layout')
@section('title', 'Login Form')

@section('content')
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <x-form-input name="email">
            <label class="min-w-[150px]" for="">Email:</label>
            <input name="email" type="text" placeholder="your@email.com" class="w-full p-2 @error('title') border border-red-900 @enderror" value="{{ old('email') }}">
        </x-form-input>

        <x-form-input name="password">
            <label class="min-w-[150px]" for="">Password:</label>
            <input name="password" type="password" class="w-full p-2 @error('title') border border-red-900 @enderror">
        </x-form-input>
        <x-form-input name="remember_me">
            <label class="min-w-[150px]" for="">Remember Me:</label>
            <input type="hidden" name="remember_me" value="0">
            <input type="checkbox" name="remember_me" value="1">
        </x-form-input>

        <div class="flex justify-between items-center">
            <button type="submit" class="p-4 bg-yellow-500 border rounded min-w-[8rem]">Login</button>
            <p>Not registered yet? <a class="underline decoration-1 decoration-amber-900 text-amber-900" href="{{ route('auth.register') }}">Register</a></p>
        </div>
    </form>
@endsection
