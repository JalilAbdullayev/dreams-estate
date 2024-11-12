<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="@yield('author', $settings->author)"/>
    <meta property="og:title" content="@yield('title', $settings->title)"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="@yield('image', asset("storage/$settings->logo"))"/>
    <meta property="og:site_name" content="{{ $settings->title }}"/>
    <meta name="twitter:title" content="@yield('title', $settings->title)"/>
    <meta name="twitter:description" content="@yield('description', $settings->description)"/>
    <meta name="twitter:image" content="@yield('image', asset("storage/$settings->logo"))"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:alt" content="{{ $settings->title }}"/>
    <title>
        @yield('title', 'Dreams Estate')
    </title>
    <link rel="icon" href="{{ asset("storage/$settings->favicon") }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('front/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{ asset('front/slick/slick.css')}}"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<x-layout.header/>
<main>
    @yield('content')
</main>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
        <path stroke-width="50" stroke="black"
              d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
    </svg>
</div>
<x-layout.footer/>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('front/slick/slick.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>
