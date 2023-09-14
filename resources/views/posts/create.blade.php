@extends('layout')
@section('title', 'Create New Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="1">
        <x-form-input name="title">
            <label for="">Title:</label>
            <input name="title" type="text" placeholder="your title" class="w-full p-2 @error('title') border border-red-900 @enderror" value="{{ old('title') }}">
        </x-form-input>

        <x-form-input name="summary">
            <label for="">summary:</label>
            <textarea name="summary" cols="3" placeholder="Type something interesting here..." class="w-full p-2 @error('summary') border border-red-900 @enderror">{{ old('summary') }}</textarea>
        </x-form-input>
        <x-form-input name="categories">
            <label for="select-category">Category:</label>
            <select name="categories[]" id="select-categories" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </x-form-input>
        <x-partials.button>Create</x-partials.button>
    </form>

    @push('scripts')
        <script type="module">
            new TomSelect('#select-categories', {plugins: {remove_button: {title: 'Remove'}}})
        </script>
    @endpush
@endsection
