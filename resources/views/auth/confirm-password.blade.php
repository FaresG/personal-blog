@extends('layout')
@section('title', 'Confirm Your Password')

@section('content')
    <h3>You need to confirm your password before accessing your intended destination!</h3>
    <form action="{{ route('password.confirm.post') }}" method="post">
        @csrf
        <x-form-input name="password">
            <label for="">Password:</label>
            <input name="password" type="password" class="w-full p-2 @error('title') border border-red-900 @enderror">
        </x-form-input>

        <button type="submit" class="p-4 bg-yellow-500 border rounded">Confirm</button>
    </form>
@endsection
