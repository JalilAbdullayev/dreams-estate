<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use App\Traits\UploadImage;

class SettingsController extends Controller {
    use UploadImage;

    public function index() {
        return view('admin.settings');
    }

    public function update(SettingsRequest $request) {
        $settings = Settings::first();
        $settings->title = $request->title;
        $settings->author = $request->author;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $this->singleImg($request, 'logo', null, $settings);
        $this->singleImg($request, 'favicon', null, $settings);
        $settings->save();
        return redirect()->route('admin.settings')->withSuccess('Settings updated successfully');
    }
}
