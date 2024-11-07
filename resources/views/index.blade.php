@extends('layouts.layout')
@section('content')
    <x-home.banner/>
    <x-home.sales/>
    <x-home.services/>
    <x-home.faq/>
    <div class="w-full h-12 bg-[#1e1d85]"></div>
    <x-home.blog/>
    <div>
        <img src="front/img/line-bg.png" alt=""/>
    </div>
    <x-home.newsletter/>
    <div>
        <img src="front/img/line-bg.png" alt=""/>
    </div>
@endsection
