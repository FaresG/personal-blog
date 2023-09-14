@extends('layout')
@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf
        @method('put')

        <x-form-input name="title">
            <label for="">Title:</label>
            <input name="title" type="text" placeholder="your title" class="w-full p-2 @error('title') border border-red-900 @enderror" value="{{ $post->title }}">
        </x-form-input>

        <x-form-input name="summary">
            <label for="">summary:</label>
            <textarea name="summary" cols="3" placeholder="Type something interesting here..." class="w-full p-2 @error('summary') border border-red-900 @enderror">{{ $post->summary }}</textarea>
        </x-form-input>

        <x-form-input name="published">
            <label for="">Publish:</label>
            <input type="hidden" value="0" name="published">
            <input type="checkbox" @checked($post->published) name="published" value="1"/>
        </x-form-input>

        <x-form-input name="categories">
            <label for="">Categories:</label>
            <select name="categories[]" multiple id="select-categories">
                @foreach($categories as $category_id => $category_title)
                    <option
                        @selected($post->categories()->pluck('id')->contains($category_id))
                        value="{{ $category_id }}"
                    >{{ $category_title }}</option>
                @endforeach
            </select>
        </x-form-input>

        <x-partials.button>Update</x-partials.button>
    </form>
    @push('scripts')
        <script type="module">
            new TomSelect('#select-categories', {plugins: {remove_button: {title: 'Remove'}}})
        </script>
    @endpush
@endsection
