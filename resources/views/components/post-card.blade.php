 @props([
    'post',
    'canClick'
])

<div class="border border-gray-300 rounded p-3 mb-4 ">

    <a
        @if($canClick) href="{{ route('posts.show', $post) }}" @endif
        class="@if($canClick) hover:opacity-75 hover:cursor-pointer @endif">
        <h2 class="font-bold @if($canClick) hover:font-bold hover:underline @endif">{{ $post->title }}</h2>
    </a>
    <p class="text-sm">{{ $post->summary }}</p>
    @if($canClick)
    <div class="mt-4 text-xs">
         <p>posted by <a href="{{ route('user.view', $post->user) }}" class="text-amber-900 font-bold">{{ $post->user->username }}</a> on {{ $post->created_at_formatted() }}</p>
    </div>
    @endif
    <div>
        <p class="text-xs text-right">Categories: @foreach($post->categories as $category)
                <a href="" class="text-blue-500 hover:underline">{{ $category->title }}</a> @endforeach</p>
    </div>
</div>
