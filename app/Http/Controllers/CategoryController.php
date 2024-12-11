<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller {
    use SetData;

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $categories = Category::orderBy('order')->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse {
        Category::create([
            'name' => $request->name,
            'status' => $request->status ? 1 : 0,
            'order' => Category::count() > 0 ? Category::latest('order')->first()->order + 1 : 1
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): Response {
        $category->update([
            'name' => $request->name
        ]);
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse {
        $category->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): void {
        $this->changeStatus($request, Category::class);
    }

    public function sort(CategoryRequest $request): void {
        $this->changeOrder($request, Category::class);
    }
}
