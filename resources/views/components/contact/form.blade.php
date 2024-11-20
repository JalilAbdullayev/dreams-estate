<div class="info-form">
    <h3>
        Get In Touch
    </h3>
    <hr/>
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
    <form action="{{ route('send') }}" method="POST">
        @csrf
        <div class="form-group-name mt-3">
            <label for="name">
                Your Name
            </label>
            <input type="text" class="form-control mt-3" placeholder="Your Name" name="name" required maxlength="255"
                   id="name"/>
        </div>
        <div class="text flex justify-between mt-5">
            <div class="form-group flex flex-col">
                <label for="phone">
                    Phone Number
                </label>
                <input type="tel" class="form-control mt-3" placeholder="Enter Number" name="phone" maxlength="255"
                       id="phone" required/>
            </div>
            <div class="form-group flex flex-col">
                <label for="email">
                    Email Address
                </label>
                <input type="email" class="form-control mt-3" placeholder="Enter Email" name="email" maxlength="255"
                       id="email"/>
            </div>
        </div>
        <div class="text">
            <div class="form-group flex flex-col mt-5">
                <label for="subject">
                    Subject
                </label>
                <input type="text" class="form-control mt-3 !w-full" placeholder="Enter Subject" name="subject"
                       id="subject" maxlength="255"/>
            </div>
        </div>
        <div class="form-group-area flex flex-col mt-5">
            <label for="message">
                Message
            </label>
            <textarea class="mt-3" name="message" rows="14" placeholder="Message" required id="message"></textarea>
        </div>
        <button type="submit">
            Send
        </button>
    </form>
</div>
