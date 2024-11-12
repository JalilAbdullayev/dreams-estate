@use(App\Models\Contact)
@props(['contact' => Contact::first()])
<div class="info">
    <h3>
        Contact Details
    </h3>
    <div class="contact mt-3">
        <div class="icon flex justify-center items-center">
            <i class="fa-solid fa-phone"></i>
        </div>
        <div>
            <h4>
                Call Us At
            </h4>
            <div class="text-[#8A909A]">
                <a href="tel:{{ preg_replace('/[\s\(\)\-]+/', '', $contact->phone) }}">
                    {{ $contact->phone }}
                </a>
            </div>
        </div>
    </div>
    <div class="contact mt-8">
        <div class="icon flex justify-center items-center">
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div>
            <h4>
                Email Us
            </h4>
            <div class="text-[#8A909A]">
                <a href="mailto:{{ $contact->email }}">
                    {{ $contact->email }}
                </a>
            </div>
        </div>
    </div>
    <div class="contact mt-8">
        <div class="icon flex justify-center items-center">
            <i class="fa-solid fa-location-crosshairs"></i>
        </div>
        <div>
            <h4>
                Location
            </h4>
            <div class="text-[#8A909A]">
                <span>
                    {{ $contact->location }}
                </span>
            </div>
        </div>
    </div>
    <h3 class="mt-8">
        Find Us On
    </h3>
    <div class="block relative w-full pb-[56.25%]">
        {!! $contact->map !!}
    </div>
</div>
