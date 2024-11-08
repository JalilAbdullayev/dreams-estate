@extends('layouts.layout')
@section('title', 'Contact')
@section('content')
    <x-layout.breadcrumb title="Contact"/>
    <section class="contact-section bg-[#f7f6ff] pt-20 pb-14">
        <div class="contact-content max-w-screen-xl mx-auto flex justify-between">
            <div>
                <div class="card">
                    <h3>Talk to Member of Sales Team</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus
                        vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
                    <a href="">
                        <button>Contact Sales</button>
                    </a>
                </div>
                <div class="card mt-4">
                    <h3>Product & Account Support</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus
                        vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
                    <a href="">
                        <button>Go to FAQ</button>
                    </a>
                </div>
            </div>
            <div>
                <img src="front/img/contact.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="contact-info-sec pt-20 pb-14">
        <div class="detail max-w-screen-xl mx-auto flex justify-between">
            <x-contact.form/>
            <x-contact.details/>
        </div>
    </section>
@endsection
