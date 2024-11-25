@use(Carbon\Carbon)
@extends('layouts.layout')
@section('title', 'Sales')
@section('content')
    <x-layout.breadcrumb title="Sales" />
    <section class="sales bg-[#f7f6ff] py-16">
        <div class="flex flex-wrap max-w-screen-xl gap-4 mx-auto">
            @foreach ($properties as $property)
                <div class="card w-[416px] bg-white border shadow rounded-[10px]">
                    <a href="{{ route('property', $property->slug) }}">
                        <div class="card-img bg-center bg-[length:100%] pt-5 bg-no-repeat h-72"
                            style="background-image: url({{ asset("storage/properties/$property->image") }});">
                            <div class="flex justify-between">
                                <div class="w-[76px] ml-9 h-[31px] flex justify-center items-center bg-[#6C60FE] rounded-lg">
                                    <span>
                                        {{ $property->category->name }}
                                    </span>
                                </div>
                                <div
                                    class="flex items-center justify-center border-2 border-white rounded-full cursor-pointer like size-9 me-4">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                            </div>
                            <div class="grid h-56 grid-cols-3 gap-1 mr-5 place-items-end">
                                <span class="self-end">
                                    {{ $property->price }}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="max-w-screen-xl p-5 mx-auto">
                        <a href="{{ route('property', $property->slug) }}">
                            <h3>
                                {{ $property->title }}
                            </h3>
                        </a>
                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $property->city }} @if ($property->region)
                                {{ ", $property->region" }}
                            @endif
                        </p>
                        <div class="item w-[368px] h-[61px] mt-5 flex items-center justify-around bg-[#F7F6FF]">
                            <div>
                                <span><i class="fa-solid fa-bed me-1"></i>
                                    {{ $property->bedroom }} Beds
                                </span>
                            </div>
                            <div>
                                <span><i class="fa-solid fa-bath me-1"></i>
                                    {{ $property->bathroom }} Bath
                                </span>
                            </div>
                            <div>
                                <span><i class="fa-solid fa-building me-1"></i>
                                    {{ $property->area }}
                                </span>
                            </div>
                        </div>
                        <hr class="mt-4" />
                        <div class="flex justify-between mt-5 time">
                            <div>
                                <p>
                                    Listed on: <span>
                                        {{ Carbon::parse($property->verified_at)->format('j M Y') }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
