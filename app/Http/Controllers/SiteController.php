<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\FAQ;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function about(): View
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function faq(): View
    {
        $faqs = FAQ::active()->get();
        return view('faq', compact('faqs'));
    }

    public function blog(): View
    {
        $blogs = Blog::active()->get();
        return view('blog', compact('blogs'));
    }

    public function property(string $slug): View
    {
        $property = Property::active()->whereSlug($slug)->first();
        return view('property', compact('property'));
    }

    public function sales(): View
    {
        $properties = Property::active()->get();
        return view('sales', compact('properties'));
    }

    public function search(Request $request): View|RedirectResponse
    {
        $query = array_filter($request->only(['keyword', 'sale_type', 'min_price', 'max_price']), function ($value) {
            return $value !== null && $value !== '';
        });

        if (count($query) !== count($request->all())) {
            return redirect()->route('search', $query);
        }

        $properties = Property::active();

        if (isset($query['keyword'])) {
            $properties = $properties->where('title', 'like', '%' . $query['keyword'] . '%');
        }

        if (isset($query['sale_type'])) {
            $properties = $properties->where('sale_type', $query['sale_type']);
        }

        if (isset($query['max_price'])) {
            $properties = $properties->whereBetween('price', [$query['min_price'] ?? 0, $query['max_price']]);
        }

        $properties = $properties->get();
        return view('sales', compact('properties'));
    }
}
