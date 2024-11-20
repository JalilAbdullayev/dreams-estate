@props(['property'])
<div id="accordion-collapse" class="accordion mt-12" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-1">
        <button type="button" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                aria-controls="accordion-collapse-body-1">
            <span class="text-[#0E0E46] bg-[#F7F6FF]">
                Overview
            </span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" fill="none"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden"
         aria-labelledby="accordion-collapse-heading-1">
        <div
            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <ul class="property-overview flex justify-between items-center">
                <li class="flex flex-col justify-center items-center">
                    <i class="fa-solid fa-bed"></i>
                    <p>
                        {{ $property->bedroom }} Beds
                    </p>
                </li>
                <li class="flex flex-col justify-center items-center">
                    <i class="fa-solid fa-bath"></i>
                    <p>
                        {{ $property->bathroom }} Baths
                    </p>
                </li>
                <li class="flex flex-col justify-center items-center">
                    <i class="fa-brands fa-accusoft"></i>
                    <p>
                        {{ $property->area }}
                    </p>
                </li>
                <li class="flex flex-col justify-center items-center">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>
                        {{ $property->garage }} Garages
                    </p>
                </li>
                <li class="flex flex-col justify-center items-center">
                    <i class="fa-regular fa-calendar-days"></i>
                    <p>
                        Year Built: {{ $property->year }}
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <h2 id="accordion-collapse-heading-2">
        <button type="button" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                aria-controls="accordion-collapse-body-2">
            <span class="text-[#0E0E46] bg-[#F7F6FF]">
                Description
            </span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
            {!! $property->text !!}
        </div>
    </div>
    <h2 id="accordion-collapse-heading-3">
        <button type="button" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                aria-controls="accordion-collapse-body-2">
            <span class="text-[#0E0E46] bg-[#F7F6FF]">
                Property Address
            </span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-3" class="hidden"
         aria-labelledby="accordion-collapse-heading-3">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
            <ul class="property-address ">
                <li>
                    Address: <span>
                        {{ $property->address }}
                    </span>
                </li>
                <li>
                    City: <span>
                        {{ $property->city }}
                    </span>
                </li>
                <li>
                    Region: <span>
                        {{ $property->region }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <h2 id="accordion-collapse-heading-4">
        <button type="button" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                aria-controls="accordion-collapse-body-2">
            <span class="text-[#0E0E46] bg-[#F7F6FF]">
                Property Details
            </span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" fill="none"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-4" class="hidden"
         aria-labelledby="accordion-collapse-heading-4">
        <div class="flex justify-between p-5 border border-b-0 border-gray-200 dark:border-gray-700">
            <div>
                <ul class="property-details">
                    <li>
                        Price: <span>
                            {{ $property->price }}
                        </span>
                    </li>
                    <li>
                        Property Size : <span>
                            {{ $property->area }}
                        </span>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="property-details">
                    <li>
                        Rooms: <span>
                            10
                        </span>
                    </li>
                    <li>
                        Bedrooms: <span>
                            {{ $property->bedroom }}
                        </span>
                    </li>
                    <li>Bathrooms : <span> 6</span></li>
                    <li>
                        Garages: <span>
                            {{ $property->garage }}
                        </span>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="property-details">
                    <li>Year Built : <span> 2005</span></li>
                    <li>Garage Size: <span>
                            {{  $property->garage_size }}
                        </span>
                    </li>
                    <li>Structure Type: <span>
                            {{ $property->type ? 'Yard' : 'Apartment' }}
                        </span></li>
                    <li>
                        Floor: <span>
                            {{ $property->floor }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{--<h2 id="accordion-collapse-heading-5">
        <button type="button" aria-controls="accordion-collapse-body-5" aria-expanded="false"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-collapse-body-5">
            <span class="text-[#0E0E46] bg-[#F7F6FF]">Amenities</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-5" class="hidden"
         aria-labelledby="accordion-collapse-heading-5">
        <div
            class="flex justify-between p-5 border border-t-0 border-gray-200 dark:border-gray-700">
            <div>
                <ul class="amenities-list">
                    <li><i class="fa-solid fa-fan"></i> Air Conditioning</li>
                    <li><i class="fa-solid fa-person-swimming"></i> Swimming Pools</li>
                    <li><i class="fa-solid fa-house-medical"></i> Sporting Facilities</li>
                    <li><i class="fa-solid fa-dumbbell"></i> Gym</li>
                    <li><i class="fa-solid fa-cubes-stacked"></i> Clubhouse</li>
                </ul>
            </div>
            <div>
                <ul class="amenities-list">
                    <li><i class="fa-solid fa-worm"></i> Landscaped Gardens</li>
                    <li><i class="fa-solid fa-tree"></i> Wide-Open Spaces</li>
                    <li><i class="fa-solid fa-tree"></i> Parks</li>
                    <li><i class="fa-brands fa-usps"></i> Package Lockers</li>
                    <li><i class="fa-solid fa-spa"></i> Spa</li>
                </ul>
            </div>
            <div>
                <ul class="amenities-list">
                    <li><i class="fa-solid fa-camera"></i> Surveillance Cameras</li>
                    <li><i class="fa-solid fa-table-list"></i> Billiards Table</li>
                </ul>
            </div>
        </div>
    </div>--}}
</div>
