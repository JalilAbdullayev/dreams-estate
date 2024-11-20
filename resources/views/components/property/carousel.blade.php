@props(['images'])
<div id="default-carousel" class="relative " data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        @foreach($images as $image)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset("storage/$image->image") }}"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                     alt="..."/>
            </div>
        @endforeach
    </div>
    <button type="button" data-carousel-prev
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-800 rtl:rotate-180" fill="none"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">
                        Previous
                    </span>
                </span>
    </button>
    <button type="button" data-carousel-next
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">
                        Next
                    </span>
                </span>
    </button>
</div>
