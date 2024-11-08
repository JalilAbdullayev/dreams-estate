<section class="sales py-12 bg-[#f7f6ff]">
    <div class="max-w-screen-xl mx-auto">
        <div data-aos-duration="1300" data-aos="fade-down" class="start flex flex-col justify-center items-center">
            <h2 class="mt-12">Featured Properties for Rent</h2>
            <div class="flex mt-3">
                <div class="w-4 h-1.5 mr-2 bg-[#fd3358] rounded-[30px]"></div>
                <div class="w-12 h-1.5 bg-[#fd3358] rounded-[30px]"></div>
            </div>
            <p class="mt-3">Hand-Picked selection of quality places</p>
            <div class="slideButton flex justify-end m-7">
                <button class="prev mr-7" data-carousel-prev>
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="next" id="slider-button-right" data-carousel-next>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div data-aos-duration="1300" data-aos="fade-up" class="slide-container swiper">
            <div class="slide-contentTwo">
                <div class="card-wrapper swiper-wrapper housesOfRent">
                    <div class="swiper-slide">
                        <div class="card w-[416px] bg-white border shadow rounded-[10px]">
                            <a href="rent-detail.html">
                                <div class="card-img pt-5 bg-no-repeat h-72"
                                     style="background-image: url({{ asset('front/img/property-img-1.jpg')}});">
                                    <div class="flex justify-between">
                                        <div
                                            class="w-[76px] ml-9 h-[31px] flex justify-center items-center bg-[#6C60FE] rounded-lg">
                                            <span>Featured</span>
                                        </div>
                                        <div
                                            class="like size-9 me-4 flex justify-center items-center rounded-full cursor-pointer border-2 border-white">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="price grid grid-cols-3 gap-1 place-items-end h-56">
                                        <span class="self-end">$${house.price}</span>
                                    </div>
                                </div>
                            </a>
                            <div class=" max-w-screen-xl mx-auto p-5">
                                <a href="rent-detail.html">
                                    <h3 class="">
                                        ${house.title}
                                    </h3>
                                </a>
                                <p class="">
                                    <i class="fa-solid fa-location-dot"></i>
                                    ${house.loc}
                                </p>
                                <div class="item w-[368px] h-[61px] mt-5 flex items-center justify-around"
                                     style="background-color: #F7F6FF;">
                                    <div>
                                                <span><i class="fa-solid fa-bed me-1"></i>
                                                    2 Beds
                                                </span>
                                    </div>
                                    <div>
                                                <span><i class="fa-solid fa-bath me-1"></i>
                                                    1 Bath
                                                </span>
                                    </div>
                                    <div>
                                                <span><i class="fa-solid fa-building me-1"></i>
                                                    5000 Sqft
                                                </span>
                                    </div>
                                </div>
                                <hr class="mt-4">
                                <div class="time flex justify-between mt-5">
                                    <div>
                                        <p>Listed on: <span>13 Jan 2023</span></p>
                                    </div>
                                    <div>
                                        <p>Listed on: <span>13 Jan 2023</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all flex justify-center mt-10">
                <a href="">
                    <button>View All Properties</button>
                </a>
            </div>
        </div>
    </div>
</section>
