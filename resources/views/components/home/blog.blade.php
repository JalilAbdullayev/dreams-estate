<section class="latest-blog py-12 bg-[#f7f6ff]">
    <div class="max-w-screen-xl mx-auto">
        <div data-aos-duration="1300" data-aos="fade-down" class="start flex flex-col items-center">
            <h1>Latest Blog</h1>
            <div class="flex mt-4">
                <div class="w-4 h-1.5 mr-2 rounded-[30px] bg-[#fd3358]"></div>
                <div class="w-12 h-1.5 rounded-[30px] bg-[#fd3358]"></div>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do
                eiusmodtempor incididunt
            </p>
        </div>
        <div class="slide-container swiper mt-10">
            <div class="slide-contentTwo">
                <div class="card-wrapper swiper-wrapper">
                    @foreach($blogs as $blog)
                        <div data-aos-duration="1300"
                             data-aos="@if($loop->first) fade-right @elseif($loop->last) fade-left @else fade-up @endif"
                             class="swiper-slide">
                            <div
                                class="card bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="{{ asset("storage/blog/$blog->image") }}" alt=""/>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
