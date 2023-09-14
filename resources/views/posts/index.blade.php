@extends('layout')
@section('title', 'Blog Posts')

@section('content')
    <div class="px-4 py-2 border rounded mb-10">
        <form action="" class="flex gap-4" method="get">
            <p class="text-amber-900 font-bold py-4">Search by</p>
            <div>
                <div class="flex gap-4 p-3 items-center">
                    <label class="min-w-[80px]" for="">Title:</label>
                    <input
                        type="text"
                        name="title" value="{{ $searchInput['title'] ?? '' }}"
                    />
                </div>
                <div class="flex gap-4 p-3 items-center">
                    <label class="min-w-[80px]" for="">Category:</label>
                    <select id="select-post-category" name="category" class="p-1">
                        <option selected disabled
                        >Choose category</option>
                        @foreach($categories as $category)
                            <option
                                @selected($category->id == ($searchInput['category'] ?? '-1'))
                                value="{{ $category->id }}"
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <x-partials.button class="px-1 py-1">Go</x-partials.button>
                <a href="{{ route('posts.index') }}" class="px-1 py-1 text-amber-900 hover:underline">Clear</a>
            </div>
        </form>
    </div>

    @if(empty($posts))
        <p>No posts available yet!</p>
    @else
        <div class="flex flex-col">
            @foreach($posts as $post)
                <x-post-card :post="$post" :canClick="true"/>
            @endforeach
        </div>
        {{ $posts->onEachSide(0)->links() }}
    @endif
@endsection

