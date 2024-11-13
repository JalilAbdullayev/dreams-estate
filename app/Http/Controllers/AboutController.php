<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use JsonException;

class AboutController extends Controller {
    use UploadImage;

    public function index(): View {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    /**
     * @throws JsonException
     */
    public function update(AboutRequest $request): RedirectResponse {
        $about = About::first();
        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->text = $request->text;
        $about->section_status = $request->section_status ? 1 : 0;
        $about->section_title = $request->section_title;
        $about->section_text = $request->section_text;
        if($request->hasFile('images')) {
            $existingImages = $about->images ? json_decode($about->images, true, 512, JSON_THROW_ON_ERROR) : [];
            $newImages = [];
            foreach($request->file('images') as $image) {
                $name = explode('.', $image->getClientOriginalName());
                $date = date('Y_m_d_H_i_s');
                $id = Str::uuid();
                $img = Str::slug($name[0]) . '_' . $date . '.' . $image->extension();
                $image->move('storage/about/', $img);
                $newImages[] = [
                    'id' => $id,
                    'image' => $img
                ];
            }
            $allImages = array_merge($existingImages, $newImages);
            $about->images = json_encode($allImages, JSON_THROW_ON_ERROR);
        }
        if($request->hasFile('section_image')) {
            $this->singleImg($request, 'section_image', 'about', $about);
        }
        $about->save();
        return back()->withSuccess('About updated successfully');
    }

    /**
     * @throws JsonException
     */
    public function deleteImage(string $id): JsonResponse {
        $about = About::first();
        $images = json_decode($about->images, true, 512, JSON_THROW_ON_ERROR);
        foreach($images as $key => $image) {
            if($image['id'] === $id) {
                unset($images[$key]);
            }
        }
        $about->images = json_encode($images, JSON_THROW_ON_ERROR);
        $about->save();
        return response()->json();
    }
}
