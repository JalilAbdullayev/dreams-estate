@extends('layouts.layout')
@section('title', 'About')
@section('content')
    <x-layout.breadcrumb title="About"/>
    <section class="aboutus-section mt-12">
        <div class="max-w-screen-xl mx-auto">
            <div class="about-content">
                <h6>
                    {{ $about->title }}
                </h6>
                <h1 class="pt-2">
                    {{ $about->subtitle }}
                </h1>
                {!! $about->text !!}
            </div>
        </div>
    </section>
    <section class="about-counter-sec mt-12">
        <div class="max-w-screen-xl mx-auto">
            <div class="about-listing-img flex justify-between">
                @if($about->images)
                    @foreach(json_decode($about->images, false, 512, JSON_THROW_ON_ERROR) as $image)
                        <div class="about-listing">
                            <img src="{{ asset("storage/about/$image->image") }}" alt="{{ $image->image }}"/>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @if($about->section_status)
        <section class="book-section mt-12 bg-[#1e1d85] py-16">
            <div class="book mx-auto max-w-screen-xl flex justify-between">
                <div class="book-listing w-1/2">
                    <h1>
                        {{ $about->section_title }}
                    </h1>
                    <div class="p-3 bg-white w-full mt-10">
                        <img src="{{ asset("storage/about/$about->section_image") }}" alt=""/>
                    </div>
                </div>
                <div class="book-content text-white w-1/2">
                    {!! $about->section_text !!}
                </div>
            </div>
        </section>
    @endif
@endsection
