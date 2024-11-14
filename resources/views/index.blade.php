@use(App\Models\Blog)
@use(App\Models\FAQ)
@extends('layouts.layout')
@section('content')
    <x-home.banner/>
    <x-home.sales/>
    <x-home.services/>
    <x-home.testimonials/>
    @if(FAQ::count() > 0)
        <x-home.faq/>
    @endif
    <div class="w-full h-12 bg-[#1e1d85]"></div>
    @if(Blog::count() > 0)
        <x-home.blog/>
    @endif
    <x-home.newsletter/>
@endsection
