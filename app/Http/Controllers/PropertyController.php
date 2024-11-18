<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Category;
use App\Models\Property;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PropertyController extends Controller {
    use SetData, UploadImage;

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        if(auth()->user()->isAdmin()) {
            $properties = Property::all();
        } else {
            $properties = auth()->user()->properties()->get();
        }
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        $categories = Category::active()->get();
        return view('admin.properties.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request): RedirectResponse {
        $property = new Property;
        $property->title = $request->title;
        if(Property::whereSlug(Str::slug($request->title))->exists()) {
            $count = Property::whereSlugLike(Str::slug($request->title) . '-%')->count();
            $property->slug = Str::slug($request->title) . '-' . ($count + 1);
        } else {
            $property->slug = Str::slug($request->title);
        }
        $property->description = $request->description;
        $property->keywords = $request->keywords;
        $property->text = $request->text;
        $property->address = $request->address;
        $property->city = $request->city;
        $property->region = $request->region;
        $property->area = $request->area;
        $property->floor = $request->floor;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->garage = $request->garage;
        $property->garage_size = $request->garage_size;
        $property->year = $request->year;
        $property->status = $request->status ? 1 : 0;
        $property->sale_type = $request->sale_type ? 1 : 0;
        $property->type = $request->type ? 1 : 0;
        $property->price = $request->price;
        $property->category_id = $request->category_id;
        $property->user_id = auth()->user()->id;
        $this->singleImg($request, 'image', 'properties', $property);
        $property->save();
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property): View {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View {
        if(auth()->user()->cannot('update', $property)) {
            abort(403);
        }
        $categories = Category::active()->get();
        return view('admin.properties.edit', compact('property', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property): RedirectResponse {
        if(auth()->user()->cannot('update', $property)) {
            abort(403);
        }
        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'region' => $request->region,
            'area' => $request->area,
            'floor' => $request->floor,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'year' => $request->year,
            'status' => $request->status ? 1 : 0,
            'sale_type' => $request->sale_type ? 1 : 0,
            'type' => $request->type ? 1 : 0,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.properties.index')->withSuccess('Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): JsonResponse {
        if(auth()->user()->cannot('delete', $property)) {
            abort(403);
        }
        $property->delete();
        return response()->json(['success' => true]);
    }

    public function status(PropertyRequest $request): void {
        $this->changeStatus($request, Property::class);
    }

    public function verify(PropertyRequest $request): JsonResponse {
        $data = Property::findOrFail($request->id);
        $verified = $data->verified;
        $data->verified = $verified ? 0 : 1;
        $data->save();
        return response()->json(['success' => true]);
    }
}
