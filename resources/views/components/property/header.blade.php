@props(['property'])
@use(Carbon\Carbon)
<section class="buy-detailview bg-[#f7f6ff] py-20">
    <div class="flex justify-between max-w-screen-xl mx-auto page-head">
        <div class="buy-btn">
            <div class="flex">
                <div class="buy">
                    <span>
                        {{ $property->category->name }}
                    </span>
                </div>
            </div>
            <div class="flex">
                <h1>
                    {{ $property->title }}
                </h1>
            </div>
            <div>
                <p>
                    <i class="me-2 fa-solid fa-location-dot"></i> {{ $property->city }} @if($property->region)
                        ,
                    @endif {{ $property->region }} @if($property->address)
                        ,
                    @endif {{ $property->address }}
                </p>
            </div>
        </div>
        <div class="latest-update">
            <div class="flex flex-col items-end justify-end">
                <h5>
                    Last Updated on: {{ Carbon::parse($property->updated_at)->format('j M Y') }}
                </h5>
                <p>
                    {{ $property->price }}
                </p>
            </div>
            <ul class="flex other-pages ">
                <li class="me-3">
                    <a href="javascript:void(0);">
                        <i class="fa-solid fa-share"></i> Share
                    </a>
                </li>
                <li class="me-3">
                    <a href="compare.html">
                        <i class="fa-solid fa-code-pull-request me-2"></i>Add to Compare
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa-regular fa-heart me-1"></i>Wishlist
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
