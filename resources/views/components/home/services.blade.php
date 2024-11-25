<section class="mt-12 select">
    <div class="flex justify-center max-w-screen-xl gap-4 mx-auto">
        <div class="main-property-sec">
            <a href="{{ route('admin.properties.index') }}">
                <div data-aos-duration="1300" data-aos="fade-right"
                    class="img-card w-[416px] h-[555px] rounded-2xl bg-no-repeat"
                    style="background-image: url(front/img/property-img-2.jpg)">
                    <div class="buy-property w-[376px] h-[98px]">
                        <a href="{{ route('admin.properties.index') }}"> Sell a Property </a>
                        <a href="{{ route('admin.properties.index') }}">
                            <div class="buy-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="main-property-sec">
            <a href="{{ route('search') }}?sale_type=0">
                <div data-aos-duration="1300" data-aos="fade-right"
                    class="img-card w-[416px] h-[555px] rounded-2xl bg-no-repeat"
                    style="background-image: url(front/img/property-img-3.jpg)">
                    <div class="buy-property w-[376px] h-[98px]">
                        <a href="{{ route('search') }}?sale_type=0"> Rent a Property </a>
                        <a href="{{ route('search') }}?sale_type=0">
                            <div class="buy-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="main-property-sec">
            <a href="{{ route('search') }}?sale_type=1">
                <div data-aos-duration="1300" data-aos="fade-right"
                    class="img-card w-[416px] h-[555px] rounded-2xl bg-no-repeat"
                    style="background-image: url(front/img/property-img-1.jpg)">
                    <div class="buy-property w-[376px] h-[98px]">
                        <a href="{{ route('search') }}?sale_type=1"> Buy a Property </a>
                        <a href="{{ route('search') }}?sale_type=1">
                            <div class="buy-arrow">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
