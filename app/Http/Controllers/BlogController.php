<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use JsonException;

class BlogController extends Controller {
    use UploadImage, SetData;

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        if(auth()->user()->isAdmin()) {
            $blogs = Blog::orderBy('order')->get();
        } else {
            $blogs = auth()->user()->blogs()->get();
        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        $categories = Category::active()->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws JsonException
     */
    public function store(BlogRequest $request): RedirectResponse {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->keywords = $request->keywords;
        $blog->text = $request->text;
        $blog->order = Blog::count() > 0 ? Blog::latest('order')->first()->order + 1 : 1;
        $blog->status = $request->status ? 1 : 0;
        $blog->category_id = $request->category_id;
        $blog->user_id = auth()->user()->id;
        $this->singleImg($request, 'image', 'blog', $blog);
        $this->multipleImgs($request, $blog, 'images', 'blog');
        $blog->save();
        return redirect()->route('admin.blog.index')->withSuccess('Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View {
        if(auth()->user()->cannot('update', $blog)) {
            abort(403);
        }
        $categories = Category::active()->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @throws JsonException
     */
    public function update(BlogRequest $request, Blog $blog): RedirectResponse {
        if(auth()->user()->cannot('update', $blog)) {
            abort(403);
        }
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->keywords = $request->keywords;
        $blog->text = $request->text;
        $blog->status = $request->status ? 1 : 0;
        $blog->category_id = $request->category_id;
        $this->singleImg($request, 'image', 'blog', $blog);
        $this->multipleImgs($request, $blog, 'images', 'blog');
        $blog->save();
        return redirect()->route('admin.blog.index')->withSuccess('Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): JsonResponse {
        if(auth()->user()->cannot('delete', $blog)) {
            abort(403);
        }
        $blog->delete();
        return response()->json();
    }

    public function status(BlogRequest $request): void {
        $this->changeStatus($request, Blog::class);
    }

    public function order(BlogRequest $request): void {
        $this->changeOrder($request, Blog::class);
    }

    /**
     * @throws JsonException
     */
    public function deleteImage(int $blogId, string $id): JsonResponse {
        $blog = auth()->user()->blogs()->findOrFail($blogId)->first();
        $images = json_decode($blog->images, true, 512, JSON_THROW_ON_ERROR);
        foreach($images as $key => $image) {
            if($image['id'] === $id) {
                unset($images[$key]);
            }
        }
        $blog->images = json_encode($images, JSON_THROW_ON_ERROR);
        $blog->save();
        return response()->json();
    }
}
