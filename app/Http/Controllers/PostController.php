<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPostsRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(SearchPostsRequest $request): View
    {
        $query = Post::query();

        if ($title = $request->validated('title'))
        {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        if ($category = $request->validated('category'))
        {
            $query = $query->leftJoin('category_post', 'posts.id', '=', 'category_post.post_id')
                            ->where('category_post.category_id', '=', $category);
        }

        return view('posts.index', [
            'posts' => $query->with(['user', 'categories'])->orderBy('posts.created_at', 'desc')->paginate(10),
            'categories' => Category::all(),
            'searchInput' => $request->validated()
        ]);
    }

    public function create(): View
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        // Create post and save it to the database
        $post = new Post([
            'user_id' => $request->user()->id,
            'title' => $request->validated('title'),
            'summary' => $request->validated('summary'),
            'slug' => Str::slug($request->validated('title'))
        ]);
        // Persist to DB
        $post->save();

        // Add Category relationship
        $post->categories()->attach($request->validated('categories'));

        return to_route('posts.show', ['post' => $post])->with('success', 'Post successfully added!');
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Request $request, Post $post): View|RedirectResponse
    {
        if ($request->user()->cannot('update', $post)) {
            return to_route('posts.index')->withErrors([
                'message' => 'You are not allowed to edit this post!'
            ]);
        }

        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('title', 'id')
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        $post->categories()->sync($request->validated('categories'));
        $post->update([
            'title' => $request->validated('title'),
            'slug' => Str::slug($request->validated('title')),
            'summary' => $request->validated('summary'),
            'published' => $request->validated('published')
        ]);
        return to_route('posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('title', 'id')
        ])->with('success', 'Post successfully updated!');
    }

    public function destroy(Request $request, Post $post): RedirectResponse
    {
        if ($request->user()->cannot('delete', $post)) {
            return to_route('posts.index')->withErrors([
                'message' => 'You are not allowed to delete this post!'
            ]);
        }

        $post->delete();
        return to_route('posts.index')->with('success', "Post $post->title has been deleted!");
    }
}
