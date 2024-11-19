<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyImageRequest;
use App\Models\PropertyImage;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class PropertyImageController extends Controller {
    use SetData;

    public function index(int $id): View {
        $propertyImage = PropertyImage::wherePropertyId($id)->first();
        if(auth()->user()->cannot('view', $propertyImage)) {
            abort(403);
        }
        $images = PropertyImage::wherePropertyId($id)->orderBy('order')->get();
        return view('admin.properties.images', compact('images'));
    }

    public function store(PropertyImageRequest $request, int $id) {
        if($request->file('images')) {
            foreach($request->file('images') as $image) {
                $propertyImage = new PropertyImage;
                $propertyImage->property_id = $id;
                $propertyImage->image = $image->store('properties', 'public');
                $propertyImage->order = PropertyImage::count() > 0 ? PropertyImage::latest('order')->first()->order + 1 : 1;
                $propertyImage->save();
            }
            return back()->withSuccess('Image(s) uploaded successfully!');
        }
    }

    public function delete(int $id): JsonResponse {
        $propertyImage = PropertyImage::findOrFail($id);
        if(auth()->user()->cannot('delete', $propertyImage)) {
            abort(403);
        }
        $propertyImage->delete();
        return response()->json(['success' => true]);
    }

    public function status(PropertyImageRequest $request): void {
        $this->changeStatus($request, PropertyImage::class);
    }

    public function sort(PropertyImageRequest $request): void {
        $this->changeOrder($request, PropertyImage::class);
    }
}
