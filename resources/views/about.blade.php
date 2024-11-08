@extends('layouts.layout')
@section('title', 'About')
@section('content')
    <x-layout.breadcrumb title="About"/>
    <section class="aboutus-section mt-12">
        <div class="max-w-screen-xl mx-auto">
            <div class="about-content">
                <h6>About DreamsEstate</h6>
                <h1 class="pt-2">We connect building with people</h1>
                <p class="pt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu
                    lectus vulputate
                    porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
                <p class="pt-7">
                    congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum
                    tortor eget
                    condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula.
                    Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>
    </section>
    <section class="about-counter-sec mt-12">
        <div class="max-w-screen-xl mx-auto ">
            <div class="about-listing-img flex justify-between">
                <div class="about-listing">
                    <img src="front/img/about-us-01.jpg" alt=""/>
                </div>
                <div class="about-listing">
                    <img src="front/img/about-us-02.jpg" alt=""/>
                </div>
                <div class="about-listing">
                    <img src="front/img/about-us-03.jpg" alt=""/>
                </div>
            </div>
        </div>
    </section>
    <section class="book-section mt-12 bg-[#1e1d85] py-16">
        <div class="book mx-auto max-w-screen-xl flex justify-between">
            <div class="book-listing">
                <h1>
                    Ready to Book a Place?
                </h1>
                <div class="p-3 bg-white w-[100%] mt-10">
                    <img src="front/img/about-us-04.jpg" alt=""/>
                </div>
            </div>
            <div class="book-content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate
                    porttitor sed feugiat nunc. <span>
                        Mauris ac consectetur ante,
                    </span>
                </p>
                <p>
                    congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor eget
                    condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula.
                    Vivamus semper at orci at placerat. Placeat Lorem ipsum dolor sit amet. congue, sed luctus lectus
                    congue. Integer convallis condimentum sem. Duis elementum tortor eget condimentum tempor. Praesent
                    sollicitudin lectus ut pharetra pulvinar. Done congue, sed luctus lectus congue. Integer convallis
                    condimentum sem. Duis elementum tortor eget condimentum tempor. Praesent sollicitudin lectus ut
                    pharetra pulvinar. Done Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula
                    eu lectus vulputate porttitor sed feugiat nunc.
                    <span>
                        Mauris ac consectetur ante,
                    </span>
                </p>
                <p class="mb-0">
                    congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor eget
                    condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula.
                    Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>
    </section>
@endsection
