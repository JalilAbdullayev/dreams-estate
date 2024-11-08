<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SiteController extends Controller {
    public function index(): View {
        return view('index');
    }

    public function contact(): View {
        return view('contact');
    }

    public function about(): View {
        return view('about');
    }
}
