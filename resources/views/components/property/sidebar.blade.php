@props(['user', 'property'])
<div class="theiaStickySidebar">
    <div class="contact-btn">
        <a href="">
            <button>
                <i class="fa-solid fa-info"></i>
                Request Info
            </button>
            <button>
                <i class="fa-solid fa-video"></i>
                Schedule a Visit
            </button>
        </a>
    </div>
    <div class="user-active flex">
        <div class="user-name ml-2">
            <h4>
                <a href="javascript:void(0);">
                    {{ $user->name }}
                </a>
            </h4>
            <a href="mailto:{{ $user->email }}">
                {{ $user->email }}
            </a>
        </div>
    </div>
    @session('success')
    <div class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
        <i class="fa-solid fa-circle-check"></i>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" data-dismiss-target="#alert-border-3" aria-label="Close"
                class="ms-auto my-2 !bg-green-50 !text-green-500 rounded-lg focus:ring-2 focus:!ring-green-400 p-1.5 hover:!bg-green-200 inline-flex items-center justify-center size-8">
                <span class="sr-only">
                    Dismiss
                </span>
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>
    @endsession
    <form action="{{ route('send_message') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}"/>
        <input type="hidden" name="property_id" value="{{ $property->id }}"/>
        <div>
            <input type="text" placeholder="Your Name" name="name" required maxlength="255"/>
        </div>
        <div>
            <input type="email" placeholder="Your Email" name="email" maxlength="255"/>
        </div>
        <div>
            <input type="tel" placeholder="Your Phone Number" name="phone" required maxlength="255"/>
        </div>
        <div>
            <textarea name="message" placeholder="Your message" required></textarea>
        </div>
        <button type="submit">
            Send Email
        </button>
    </form>
    @if($user->phone || $user->whatsapp)
        <div class="flex justify-center gap-4">
            @if($user->phone)
                <a href="tel:{{ preg_replace('/[\s\(\)\-]+/', '', $contact->phone) }}">
                    <button class="wp">
                        <i class="fa-solid fa-phone me-2"></i> Call Us
                    </button>
                </a>
            @endif
            @if($user->whatsapp)
                <a href="https://wa.me/{{ preg_replace('/[\s\(\)\-]+/', '', $contact->whatsapp) }}">
                    <button class="wp">
                        <i class="fa-brands fa-whatsapp me-2"></i> Whatsapp
                    </button>
                </a>
            @endif
        </div>
    @endif
</div>
