@use(Carbon\Carbon)
<section class="sales py-12 bg-[#f7f6ff]">
    <div class="max-w-screen-xl mx-auto">
        <div data-aos-duration="1300" data-aos="fade-down" class="flex flex-col items-center justify-center start mb-7">
            <h2 class="mt-12">Featured Properties for Rent</h2>
            <div class="flex mt-3">
                <div class="w-4 h-1.5 mr-2 bg-[#fd3358] rounded-[30px]"></div>
                <div class="w-12 h-1.5 bg-[#fd3358] rounded-[30px]"></div>
            </div>
            <p class="mt-3">Hand-Picked selection of quality places</p>
            {{-- <div class="flex justify-end slideButton m-7">
                <button class="prev mr-7" data-carousel-prev>
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="next" id="slider-button-right" data-carousel-next>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div> --}}
        </div>
        <div data-aos-duration="1300" data-aos="fade-up" class="slide-container swiper">
            <div class="slide-contentTwo">
                <div class="card-wrapper swiper-wrapper">
                    @foreach ($properties as $property)
                        <div class="swiper-slide">
                            <div class="card w-[416px] bg-white border shadow rounded-[10px]">
                                <a href="{{ route('property', $property->slug) }}">
                                    <div class="pt-5 bg-no-repeat card-img h-72"
                                        style="background-image: url({{ asset("storage/properties/$property->image") }});">
                                        <div class="flex justify-between">
                                            <div
                                                class="w-[76px] ml-9 h-[31px] flex justify-center items-center bg-[#6C60FE] rounded-lg">
                                                <span>
                                                    {{ $property->category->name }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-center border-2 border-white rounded-full cursor-pointer like size-9 me-4">
                                                <i class="fa-regular fa-heart"></i>
                                            </div>
                                        </div>
                                        <div class="grid h-56 grid-cols-3 gap-1 price place-items-end">
                                            <span class="self-end">
                                                {{ $property->price }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="max-w-screen-xl p-5 mx-auto ">
                                    <a href="{{ route('property', $property->slug) }}">
                                        <h3>
                                            {{ $property->title }}
                                        </h3>
                                    </a>
                                    <p>
                                        <i class="fa-solid fa-location-dot"></i>
                                        {{ $property->city }} @if ($property->region)
                                            {{ ", $property->region" }}
                                        @endif
                                    </p>
                                    <div
                                        class="item w-[368px] h-[61px] mt-5 flex items-center justify-around bg-[#F7F6FF]">
                                        @if ($property->bedroom)
                                            <div>
                                                <span>
                                                    <i class="fa-solid fa-bed me-1"></i>
                                                    {{ $property->bedroom }} Beds
                                                </span>
                                            </div>
                                        @endif
                                        @if ($property->bathroom)
                                            <div>
                                                <span>
                                                    <i class="fa-solid fa-bath me-1"></i>
                                                    {{ $property->bathroom }} Bath
                                                </span>
                                            </div>
                                        @endif
                                        @if ($property->area)
                                            <div>
                                                <span>
                                                    <i class="fa-solid fa-building me-1"></i>
                                                    {{ $property->area }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <hr class="mt-4">
                                    <div class="flex justify-between mt-5 time">
                                        <div>
                                            <p>
                                                Listed on: <span>
                                                    {{ Carbon::parse($property->verified_at)->format('j M Y') }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center mt-10 all">
                <a href="{{ route('sales') }}">
                    <button>
                        Hamısına Bax
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
