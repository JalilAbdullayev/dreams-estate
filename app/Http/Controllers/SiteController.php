<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\FAQ;
use App\Models\Property;
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
        $blogs = Blog::active()->get();
        return view('blog', compact('blogs'));
    }

    public function property(string $slug): View {
        $property = Property::active()->whereSlug($slug)->first();
        return view('property', compact('property'));
    }

    public function sales(): View {
        $properties = Property::active()->get();
        return view('sales', compact('properties'));
    }
}
