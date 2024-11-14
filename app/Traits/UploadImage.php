<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

trait UploadImage {
    public function singleImg($request, string $field, ?string $path = null, $model): void {
        if($request->file($field)) {
            if($model->{$field} && Storage::exists('public/' . $model->{$field})) {
                Storage::delete('public/' . $model->{$field});
            }
            $name = explode('.', $request->{$field}->getClientOriginalName());
            $date = date('Y_m_d_H_i_s');
            $img = Str::slug($name[0]) . "_{$date}." . $request->{$field}->extension();
            if($path) {
                $request->{$field}->move("storage/{$path}/", $img);
            } else {
                $request->{$field}->move('storage/', $img);
            }
            $model->{$field} = $img;
        }
    }

    /**
     * @throws JsonException
     */
    public function multipleImgs($request, $model, string $field, string $path) {
        if($request->hasFile($field)) {
            $existingImages = $model->{$field} ? json_decode($model->{$field}, true, 512, JSON_THROW_ON_ERROR) : [];
            $newImages = [];
            foreach($request->file($field) as $image) {
                $name = explode('.', $image->getClientOriginalName());
                $date = date('Y_m_d_H_i_s');
                $id = Str::uuid();
                $img = Str::slug($name[0]) . "_{$date}." . $image->extension();
                $image->move("storage/{$path}/", $img);
                $newImages[] = [
                    'id' => $id,
                    'image' => $img
                ];
            }
            $allImages = array_merge($existingImages, $newImages);
            $model->{$field} = json_encode($allImages, JSON_THROW_ON_ERROR);
        }
    }
}
