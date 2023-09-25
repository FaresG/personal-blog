<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::paginate(10);
        $rowsValues = [];
        $columnTitles = ['Title', 'Meta Title', 'Created At'];
        foreach($categories as $category) {
            $rowsValues[] = [
                $category->title,
                $category->meta_title,
                $category->created_at_formatted()
            ];
        }
        return view('admin.categories.index', [
            'categories' => $categories,
            'columnTitles' => $columnTitles,
            'rowsValues' => $rowsValues
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $category = new Category([
            'title' => $request->validated('title'),
            'meta_title' => $request->validated('meta_title')
        ]);
        $category->save();

        return to_route('admin.categories.index')->with('success', 'Category ' . $category->title . ' is created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
