@extends('admin.layout')
@section('title', 'Create Category')
@section('content')
<div>
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="1">
        <x-form-input name="title">
            <label for="">Title:</label>
            <input name="title" type="text" placeholder="your title" class="w-full p-2 @error('title') border border-red-900 @enderror" value="{{ old('title') }}">
        </x-form-input>

        <x-form-input name="meta_title">
            <label for="">Meta Title:</label>
            <textarea name="meta_title" cols="3" placeholder="Type something interesting here..." class="w-full p-2 @error('meta_title') border border-red-900 @enderror">{{ old('meta_title') }}</textarea>
        </x-form-input>
        <x-partials.button>Create</x-partials.button>
    </form>
</div>
@endsection
