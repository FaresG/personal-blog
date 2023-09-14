@extends('layout')
@section('title', $post->title)

@section('content')
    <div class="flex">
        <x-post-card :post="$post" :canClick="false" />
    </div>
    <div class="flex gap-4 items-center">
        <a href="{{ route('posts.edit', $post) }}" class="px-5 py-4 border border-yellow-300 bg-yellow-300 rounded">Edit Post</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post" class="m-0">
            @csrf
            @method('delete')
            <x-partials.button color="red">Delete</x-partials.button>
        </form>
    </div>
@endsection
