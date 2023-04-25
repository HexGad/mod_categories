<?php

namespace HexGad\Categories\Http\Controllers;

use App\Exceptions\ApiException;
use HexGad\Categories\Http\DataTables\CategoriesDataTable;
use HexGad\Categories\Http\Requests\CreateCategoryRequest;
use HexGad\Categories\Http\Requests\EditCategoryRequest;
use HexGad\Categories\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('categories::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categories::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateCategoryRequest $request
     * @return Renderable
     */
    public function store(CreateCategoryRequest $request)
    {
        if ($category = Category::create($request->validated()))
            return response()->json($category);

        throw new ApiException;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categories::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        return view('categories::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        if ($category->update($request->validated()))
            return response()->json($category);

        throw new ApiException;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        if ($category->delete())
            return response()->json($category);

        throw new ApiException;
    }
}
