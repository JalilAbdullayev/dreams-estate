<section class="home-banner pt-[75px]">
    <div class="w-full bg-center bg-no-repeat bg-cover"
        style="background-image: url({{ asset('front/img/banner.jpg') }});">
        <div data-aos-duration="1300" data-aos="fade-right" class="title">
            <h1>
                Find Your Best Dream House for
                <br />
                <span>
                    Rental, Buy & Sell...
                </span>
            </h1>
            <h4>
                Properties for buy / rent in in your location. We have more than 3000+ listings for you to choose
            </h4>
        </div>
        <div class="max-w-screen-xl mx-auto mt-10">
            <div class="flex flex-col items-center justify-center w3-container">
                <div data-aos-duration="1300" data-aos="fade-up" id="Buy" class="city">
                    <form action="{{ route('search') }}" class="flex justify-center max-w-screen-xl pb-10 mx-auto">
                        <div class="mt-8 me-4">
                            <input class="placeholder-gray-900 keyword" placeholder="Enter Keyword" type="text"
                                name="keyword" />
                        </div>
                        <div class="mt-8 me-3">
                            <select id="countries" class="block p-2.5" name="sale_type">
                                <option value="" selected>
                                    To make a choice
                                </option>
                                <option value="0">
                                    Rent Property
                                </option>
                                <option value="1">
                                    Buy Property
                                </option>
                            </select>
                        </div>
                        <div class="mt-8 me-3">
                            <input class="placeholder-gray-900 price" type="number" placeholder="Min Price"
                                id="minPrice" name="min_price" />
                        </div>
                        <div class="mt-8 me-3">
                            <input class="placeholder-gray-900 price" type="number" placeholder="Max Price"
                                id="maxPrice" name="max_price" />
                        </div>
                        <div class="flex items-center justify-center mt-8 search me-3">
                            <button type="submit" class="size-16">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
