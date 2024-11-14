@use(Carbon\Carbon)
@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
    <x-layout.breadcrumb title="Blog"/>
    <section class="latest-blog pt-12 pb-12 bg-[#f7f6ff]">
        <div class="max-w-screen-xl mx-auto">
            <div class="slide-container swiper mt-10">
                <div class="slide-contentTwo">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach($blogs as $blog)
                            <div class="swiper-slide">
                                <div
                                    class="card bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ asset("storage/blog/$blog->image") }}"
                                             alt="{{ $blog->slug }}"/>
                                    </a>
                                    <div class="p-5">
                                        <div class="mb-3 advantages">
                                            <span>
                                                {{ $blog->category->name }}
                                            </span>
                                        </div>
                                        <a href="#">
                                            <h5 class="mb-2">
                                                {{ $blog->title }}
                                            </h5>
                                        </a>
                                        <p class="mb-3">
                                            {{ $blog->description }}
                                        </p>
                                        <hr/>
                                        <div class="time mt-5 flex justify-between items-center">
                                            <div>
                                                <a href="">
                                                    <div class="flex items-center">
                                                        <div class="profile ml-3">
                                                            <a href="">
                                                                {{ $blog->user->name }}
                                                            </a>
                                                            <p>
                                                                {{ Carbon::parse($blog->updated_at)->format('d F, Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="book">
                                                <a href="">
                                                    <button>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
