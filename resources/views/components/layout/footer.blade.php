<footer class="w-full bg-[#0D1329]">
    <div>
        <img src="{{ asset('front/img/line-bg.png') }}" alt=""/>
    </div>
    <div class="mx-auto w-full max-w-screen-xl px-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div data-aos-duration="1300" data-aos="fade-right" class="footer-content-heading mb-6 md:mb-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="self-center whitespace-nowrap">
                        <img src="{{ asset("storage/$settings->logo") }}" alt="{{ $settings->title }}"/>
                    </span>
                </a>
                <div class="social-links mt-12">
                    <h4>
                        Connect with us
                    </h4>
                    <ul class="flex justify-between">
                        <li class="me-2">
                            <a href="">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-aos-duration="1300" data-aos="fade-left" class="footer-widget-list flex sm:grid-cols-3">
                <div class="me-12">
                    <h2 class="mb-6 text-white uppercase">Quick Links</h2>
                    <ul>
                        @foreach($links as $link)
                            <li class="mb-4">
                                <a href="{{ route($link['url']) }}" @class(['text-[#FCAF3D]' => Route::is($link['url'])])>
                                    <span>></span> {{ $link['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-white uppercase">Explore</h2>
                    <ul class="">
                        <li class="mb-4">
                            <a href="rent-property.html" class="">
                                <span>
                                    >
                                </span> Rent Property
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="buy-property.html" class="">
                                <span>
                                    >
                                </span> Buy Property
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('login') }}" class="">
                                <span>
                                    >
                                </span> Sign In
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('register') }}" class="">
                                <span>
                                    >
                                </span> Sign Up
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"/>
        <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-white sm:text-center">
            © 2024 @if(date('Y') > 2024)
                - {{ date('Y') }}
            @endif <a href="{{ route('home') }}" class="hover:underline">
                {{ $settings->title }}
            </a>. All Rights Reserved.
        </span>
            <div class="company-logo flex mt-4 items-center sm:justify-center sm:mt-0">
                <p>
                    a product of
                </p>
                <a href="https://proton.az" target="_blank">
                    <img src="front/img/company-logo.png" alt="Proton.Az"/>
                </a>
            </div>
        </div>
    </div>
</footer>
