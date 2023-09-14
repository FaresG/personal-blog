@extends('layout')
@section('title', $user->name)
@section('content')
    <h2 class="mt-8 mb-2 bold text-xl text-blue-500">General Information</h2>
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('put')
        <x-form-input name="firstname">
            <label class="min-w-[150px]" for="">First Name:</label>
            <input name="firstname" type="text" class="w-full p-2 @error('firstname') border border-red-900 @enderror" value="{{ $user->firstname }}">
        </x-form-input>
        <x-form-input name="lastname">
            <label class="min-w-[150px]" for="">Last Name:</label>
            <input name="lastname" type="text" class="w-full p-2 @error('lastname') border border-red-900 @enderror" value="{{ $user->lastname }}">
        </x-form-input>
        <x-form-input name="mobile">
            <label  class="min-w-[150px]" for="">Phone Number:</label>
            <input name="mobile" type="text" class="w-full p-2 @error('mobile') border border-red-900 @enderror" value="{{ $user->mobile }}">
        </x-form-input>
        <button type="submit" class="p-3 bg-yellow-300 border rounded border-yellow-300 min-w-[100px]">Update</button>
    </form>

    <form action="{{ route('password.update') }}" method="post">
        @csrf
        @method('put')

        <h2 class="mt-8 mb-2 bold text-xl text-blue-500">Change password</h2>
        <x-form-input name="current_password">
            <label class="min-w-[150px]" for="">Current Password:</label>
            <input name="current_password" type="password" class="w-full p-2 @error('current_password') border border-red-900 @enderror">
        </x-form-input>

        <x-form-input name="password">
            <label class="min-w-[150px]" for="">New Password:</label>
            <input name="password" type="password" class="w-full p-2 @error('password') border border-red-900 @enderror">
        </x-form-input>

        <x-form-input name="password_confirmation">
            <label class="min-w-[150px]" for="">Confirm Password:</label>
            <input name="password_confirmation" type="password" class="w-full p-2 @error('password_confirmation') border border-red-900 @enderror">
        </x-form-input>
        <button type="submit" class="p-3 bg-yellow-300 border rounded border-yellow-300 min-w-[100px]">Change Password</button>
    </form>

@endsection
