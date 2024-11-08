@extends('layouts.layout')
@section('title', 'Blog')
@section('content')
    <x-layout.breadcrumb title="Blog"/>
    <section class="latest-blog pt-12 pb-12 bg-[#f7f6ff]">
        <div class="max-w-screen-xl mx-auto">
            <div class="slide-container swiper mt-10">
                <div class="slide-contentTwo">
                    <div class="card-wrapper swiper-wrapper">
                        <div class="swiper-slide">
                            <div
                                class="card bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="front/img/blog-2.jpg" alt=""/>
                                </a>
                                <div class="p-5">
                                    <div class="mb-3 advantages">
                                        <span>Advantages</span>
                                    </div>
                                    <a href="#">
                                        <h5 class="mb-2">
                                            How to achieve financial independence
                                        </h5>
                                    </a>
                                    <p class="mb-3">
                                        There are many variations of passages of lorem ipsum
                                        available.
                                    </p>
                                    <hr/>
                                    <div class="time mt-5 flex justify-between items-center">
                                        <div>
                                            <a href="">
                                                <div class="flex items-center">
                                                    <div>
                                                        <img class="size-16 rounded-full" src="front/img/avatar-03.jpg"
                                                             alt=""/>
                                                    </div>
                                                    <div class="profile ml-3">
                                                        <a href="">Rafael</a>
                                                        <p>Posted on : 12 May 2023</p>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
