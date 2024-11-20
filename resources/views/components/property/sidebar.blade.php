@props(['user'])
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
    <form action="" method="POST">
        @csrf
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
            <textarea name="text" placeholder="Your message" required></textarea>
        </div>
        <button type="submit">
            Send Email
        </button>
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
                    <a href="whatsapp://send?phone={{ preg_replace('/[\s\(\)\-]+/', '', $contact->whatsapp) }}">
                        <button class="wp">
                            <i class="fa-brands fa-whatsapp me-2"></i> Whatsapp
                        </button>
                    </a>
                @endif
            </div>
        @endif
    </form>
</div>
