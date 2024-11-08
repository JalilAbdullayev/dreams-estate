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

    public function faq(): View {
        return view('faq');
    }

    public function blog(): View {
        return view('blog');
    }

    public function property(): View {
        return view('property');
    }

    public function sales(): View {
        return view('sales');
    }
}
