@extends('layout')
@section('title', $user->fullname())
@section('content')
    <div class="flex flex-col gap-4">
        <h2 class="text-amber-900 text-xl">@if($user->id === auth()->user()->id) My @endif Personal Information</h2>
        <div class="flex gap-4 items-center">
            <p>Username:</p>
            <p>{{ $user->username }}</p>
        </div>
        <div class="flex gap-4 items-center">
            <p>Email:</p>
            <p>{{ $user->email }}</p>
        </div>
        <div class="flex gap-4 items-center">
            <p>First Name:</p>
            <p>{{ $user->firstname }}</p>
        </div>
        <div class="flex gap-4 items-center">
            <p>Last Name:</p>
            <p>{{ $user->lastname }}</p>
        </div>
        <div class="flex gap-4 items-center">
            <p>Mobile:</p>
            <p>{{ $user->mobile }}</p>
        </div>

    </div>


    <div class="flex flex-col gap-4 mt-10 border-t border-b-gray-400 pt-10">
        <h2 class="text-amber-900 text-xl">@if($user->id === auth()->user()->id) My @else Other @endif Blog Posts @if(count($user->posts)) ({{ count($user->posts) }}) @endif</h2>
        @if(!count($user->posts))
            <p>No posts published yet. <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create a blog post</a></p>
        @else
            @foreach($user->posts()->orderBy('updated_at', 'desc')->get() as $post)
                <div class="flex gap-4 items-center ">
                    <p><a class="hover:text-blue-500 hover:underline" href="{{ route('posts.show', $post) }}" target="_blank">{{ $post->title }}</a></p>
                    <p class="text-xs">(Last modified: {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }})</p>
                </div>
            @endforeach
        @endif
    </div>
@endsection
