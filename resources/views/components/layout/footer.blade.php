<footer class="w-full bg-[#0D1329]">
    <div>
        <img src="{{ asset('front/img/line-bg.png') }}" alt="" />
    </div>
    <div class="w-full max-w-screen-xl px-4 py-6 mx-auto lg:py-8">
        <div class="md:flex md:justify-between">
            <div data-aos-duration="1300" data-aos="fade-right" class="mb-6 footer-content-heading md:mb-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="self-center whitespace-nowrap">
                        <img src="{{ asset("storage/settings/$settings->logo") }}" alt="{{ $settings->title }}" />
                    </span>
                </a>
                <div class="mt-12 social-links">
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
            <div data-aos-duration="1300" data-aos="fade-left" class="grid footer-widget-list sm:grid-cols-3 gap-4">
                <div class="me-12">
                    <ul class="[&>li]:mb-2">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ route($link['url']) }}" @class(['text-[#FCAF3D]' => Route::is($link['url'])])>
                                    <span>></span> {{ $link['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <ul class="[&>li]:mb-2">
                        <li>
                            <a href="{{ route('sales') }}">
                                <span>
                                    >
                                </span> Satış
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sales') }}?sale_type=0">
                                <span>
                                    >
                                </span> Kirayə Evlər
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sales') }}?sale_type=1">
                                <span>
                                    >
                                </span> Ev Al
                            </a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('login') }}">
                                    <span>
                                        >
                                    </span> Daxil ol
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    <span>
                                        >
                                    </span> Qeydiyyat
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
                @auth
                    <div>
                        <ul class="[&>li]:mb-2">
                            <li>
                                <a href="{{ route('admin.profile.index') }}">
                                    <span>
                                        >
                                    </span> Profilim
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.properties.index') }}">
                                    <span>
                                        >
                                    </span> Ev Sat
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.customer_messages.index') }}">
                                    <span>
                                        >
                                    </span> Mesajlar
                                </a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-white sm:text-center">
                © 2024 @if (date('Y') > 2024)
                    - {{ date('Y') }}
                @endif <a href="{{ route('home') }}" class="hover:underline">
                    {{ $settings->title }}
                </a>. Bütün hüquqları qorunur.
            </span>
            <div class="flex items-center mt-4 company-logo sm:justify-center sm:mt-0">
                <p>
                    a product of
                </p>
                <a href="https://proton.az" target="_blank">
                    <img src="front/img/company-logo.png" alt="Proton.Az" />
                </a>
            </div>
        </div>
    </div>
</footer>
