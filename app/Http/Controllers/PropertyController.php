<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyImage;
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
        $this->setData($request, $property);
        $this->setSlug($request, $property);
        $property->user_id = auth()->user()->id;
        $this->singleImg($request, 'image', 'properties', $property);
        $property->save();
        $this->uploadImages($request, $property);
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
        $this->setData($request, $property);
        if($property->title !== $request->title) {
            $this->setSlug($request, $property);
        }
        $this->singleImg($request, 'image', 'properties', $property);
        $this->uploadImages($request, $property);
        $property->save();
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
        $property = Property::findOrFail($request->id);
        $verified = $property->verified;
        $property->verified = $verified ? 0 : 1;
        $property->verified_at = $verified ? null : now();
        $property->save();
        return response()->json(['success' => true]);
    }

    protected function uploadImages(PropertyRequest $request, Property $property): void {
        if($request->file('images')) {
            foreach($request->file('images') as $image) {
                $propertyImage = new PropertyImage;
                $propertyImage->property_id = $property->id;
                $propertyImage->image = $image->store('properties', 'public');
                $propertyImage->order = PropertyImage::count() > 0 ? PropertyImage::latest('order')->first()->order + 1 : 1;
                $propertyImage->save();
            }
        }
    }

    protected function setSlug(PropertyRequest $request, Property $property): void {
        if(Property::whereSlug(Str::slug($request->title))->exists()) {
            $count = Property::whereSlug('like' . Str::slug($request->title) . '-%')->count();
            $property->slug = Str::slug($request->title) . '-' . ($count + 1);
        } else {
            $property->slug = Str::slug($request->title);
        }
    }

    protected function setData(PropertyRequest $request, Property $property): void {
        $property->title = $request->title;
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
    }
}
