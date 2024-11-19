<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller {
    use UploadImage;

    public function index(): View {
        return view('admin.settings');
    }

    public function update(SettingsRequest $request): RedirectResponse {
        $settings = Settings::first();
        $settings->title = $request->title;
        $settings->author = $request->author;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $this->singleImg($request, 'logo', 'settings', $settings);
        $this->singleImg($request, 'favicon', 'settings', $settings);
        $settings->save();
        return back()->withSuccess('Settings updated successfully');
    }
}
