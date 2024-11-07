<section class="home-banner pt-[75px]">
    <div class="w-full bg-center bg-no-repeat bg-cover" style="
            background-image: url({{ asset('front/img/banner.jpg')}});">
        <div data-aos-duration="1300" data-aos="fade-right" class="title">
            <h1>
                Find Your Best Dream House for
                <br/>
                <span>Rental, Buy & Sell...</span>
            </h1>
            <h4>
                Properties for buy / rent in in your location. We have more than
                3000+ listings for you to choose
            </h4>
        </div>
        <div class="max-w-screen-xl mx-auto mt-10">
            <div class="w3-container flex justify-center flex-col items-center">
                <div data-aos-duration="1300" data-aos="fade-up" id="Buy" class="city">
                    <form action="" class="max-w-screen-xl mx-auto flex justify-center pb-10">
                        <div class="me-4 mt-8">
                            <input class="keyword placeholder-gray-900" placeholder="Enter Keyword" type="text"/>
                        </div>
                        <div class="me-3 mt-8">
                            <select id="countries" class="block p-2.5">
                                <option value="all" selected>To make a choice</option>
                                <option value="rent">Rent Property</option>
                                <option value="sale">Buy Property</option>
                            </select>
                        </div>
                        <div class="me-3 mt-8">
                            <input class="email placeholder-gray-900" type="email" placeholder="Email Address"/>
                        </div>
                        <div class="me-3 mt-8">
                            <input class="price placeholder-gray-900" type="text" placeholder="Min Price"
                                   id="minPrice"/>
                        </div>
                        <div class="me-3 mt-8">
                            <input class="price placeholder-gray-900" type="text" placeholder="Max Price"
                                   id="maxPrice"/>
                        </div>
                        <div class="search flex justify-center items-center me-3 mt-8">
                            <button type="submit" class="cursor-pointer size-16">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
