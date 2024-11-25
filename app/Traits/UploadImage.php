<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

trait UploadImage
{
    public function singleImg($request, string $field, string $path, $model): void
    {
        if ($request->file($field)) {
            if ($model->{$field} && Storage::exists('public/' . $model->{$field})) {
                Storage::delete('public/' . $model->{$field});
            }
            $request->{$field}->store($path, 'public');
            $model->{$field} = $request->{$field}->hashName();
        }
    }

    /**
     * @throws JsonException
     */
    public function multipleImgs($request, $model, string $field, string $path)
    {
        if ($request->hasFile($field)) {
            $existingImages = $model->{$field} ? json_decode($model->{$field}, true, 512, JSON_THROW_ON_ERROR) : [];
            $newImages = [];
            foreach ($request->file($field) as $image) {
                $id = Str::uuid();
                $image->store($path, 'public');
                $newImages[] = [
                    'id' => $id,
                    'image' => $image->hashName()
                ];
            }
            $allImages = array_merge($existingImages, $newImages);
            $model->{$field} = json_encode($allImages, JSON_THROW_ON_ERROR);
        }
    }
}
