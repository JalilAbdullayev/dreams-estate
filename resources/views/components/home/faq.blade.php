<section class="fag pt-20 pb-12 bg-[#f7f6ff]">
    <div class="max-w-screen-xl mx-auto">
        <div class="fag-content flex justify-between">
            <div data-aos-duration="1300" data-aos="fade-right">
                <img src="front/img/faq-img.jpg" alt=""/>
            </div>
            <div class="ml-8">
                <div>
                    <div data-aos-duration="1300" data-aos="fade-left">
                        <h1>Frequently Asked Questions</h1>
                        <div class="flex mt-4">
                            <div class="w-4 h-1.5 mr-2 rounded-[30px] bg-[#fd3358]"></div>
                            <div class="w-12 h-1.5 rounded-[30px] bg-[#fd3358]"></div>
                        </div>
                        <p class="mt-4">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                            odit aut fugit, sed quia consequuntur magni dolores eos qui
                            ratione voluptatem sequi nesciunt
                        </p>
                    </div>
                    <div data-aos-duration="1300" data-aos="fade-up" class="accordion">
                        <div id="accordion-collapse" class="mt-10" data-accordion="collapse">
                            @foreach($faqs as $index => $faq)
                                <h2 id="accordion-collapse-heading-{{ $index }}">
                                    <button type="button" aria-controls="accordion-collapse-body-{{ $index }}"
                                            aria-expanded="true"
                                            data-accordion-target="#accordion-collapse-body-{{ $index }}"
                                            class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
                                <span>
                                    {{ $index + 1 }}. {{ $faq->title }}
                                </span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-{{ $index }}" class="hidden"
                                     aria-labelledby="accordion-collapse-heading-1">
                                    <div @class(["p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900 rounded-b-xl", 'border-b-0' => !$loop->last])>
                                        <div class="mb-2 text-gray-500 dark:text-gray-400">
                                            {!! $faq->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
