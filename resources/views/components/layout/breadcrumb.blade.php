@props(['title'])
<section class="contact-banner pt-12 bg-[#0E0E46] opacity-80">
    <div class="flex flex-col justify-center items-center py-24">
        <h1>
            {{ $title }}
        </h1>
        <ul class="flex">
            <li class="me-1">
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <span class="me-1">
                     /
                </span>
            <li>
                {{ $title }}
            </li>
        </ul>
    </div>
    <div>
        <img src="front/img/line-bg.png" alt="">
    </div>
</section>
