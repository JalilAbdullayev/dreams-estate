@extends('layouts.layout')
@section('title', 'Property')
@section('content')
    <x-layout.breadcrumb title="Property"/>
    <x-property.header/>
    <hr class="max-w-screen-xl mx-auto">
    <section class="buy-detailview bg-[#f7f6ff] py-20">
        <div class="max-w-screen-xl mx-auto">
            <div class="details flex justify-between">
                <div class="rental-card w-7/12">
                    <x-property.carousel/>
                    <x-property.details/>
                </div>
                <x-property.sidebar/>
            </div>
        </div>
    </section>
@endsection
