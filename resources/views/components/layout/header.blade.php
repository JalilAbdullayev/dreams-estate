<header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a data-aos-duration="1300" data-aos="fade-right" href="{{ route('home') }}"
                class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset("storage/settings/$settings->logo") }}" alt="{{ $settings->title }}" />
            </a>
            <button data-aos-duration="1300" data-aos="fade-left" data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center justify-center p-2 text-sm text-gray-500 rounded-lg size-10 md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="size-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div data-aos-duration="1300" data-aos="fade-left" class="hidden w-full md:block md:w-auto"
                id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ route($link['url']) }}" @class([
                                'block py-2 px-3 text-gray-900 bg-blue-700 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500',
                                'md:text-blue-700' => Route::is($link['url']),
                            ])>
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
