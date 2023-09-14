@extends('layout')
@section('title', 'Registration Form')

@section('content')
    <form action="{{ route('auth.register.post') }}" method="post">
        @csrf
        <x-form-input name="email">
            <label class="min-w-[150px]" for="">Email:</label>
            <input name="email" type="email" placeholder="your@email.com" class="w-full p-2 @error('title') border border-red-900 @enderror" value="{{ old('email') }}">
        </x-form-input>

        <x-form-input name="username">
            <label class="min-w-[150px]" for="">Username:</label>
            <input name="username" type="text" class="w-full p-2 @error('username') border border-red-900 @enderror" value="{{ old('username') }}">
        </x-form-input>

        <x-form-input name="firstname">
            <label class="min-w-[150px]" for="">First Name:</label>
            <input name="firstname" type="text" class="w-full p-2 @error('firstname') border border-red-900 @enderror" value="{{ old('firstname') }}">
        </x-form-input>

        <x-form-input name="lastname">
            <label class="min-w-[150px]" for="">Last Name:</label>
            <input name="lastname" type="text" class="w-full p-2 @error('lastname') border border-red-900 @enderror" value="{{ old('lastname') }}">
        </x-form-input>

        <x-form-input name="password">
            <label class="min-w-[150px]" for="">Password:</label>
            <input name="password" type="password" class="w-full p-2 @error('password') border border-red-900 @enderror">
        </x-form-input>

        <x-form-input name="password_confirmation">
            <label class="min-w-[150px]" for="">Confirm Password:</label>
            <input name="password_confirmation" type="password" class="w-full p-2 @error('password_confirmation') border border-red-900 @enderror">
        </x-form-input>

        <div class="flex justify-between items-center">
            <button type="submit" class="p-4 bg-yellow-500 border rounded min-w-[8rem]">Register</button>
            <p>Already registered? <a class="underline decoration-1 decoration-amber-900 text-amber-900" href="{{ route('login') }}">Login</a></p>
        </div>
    </form>

@endsection
