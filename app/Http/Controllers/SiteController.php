<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\FAQ;
use Illuminate\View\View;

class SiteController extends Controller {
    public function index(): View {
        return view('index');
    }

    public function contact(): View {
        return view('contact');
    }

    public function about(): View {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function faq(): View {
        $faqs = FAQ::active()->get();
        return view('faq', compact('faqs'));
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
