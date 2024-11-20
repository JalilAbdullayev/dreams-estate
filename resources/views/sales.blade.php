@use(Carbon\Carbon)
@extends('layouts.layout')
@section('title', 'Sales')
@section('content')
    <x-layout.breadcrumb title="Sales"/>
    <section class="sales bg-[#f7f6ff] py-16">
        <div class="max-w-screen-xl mx-auto flex justify-center items-center flex-wrap gap-4">
            @foreach($properties as $property)
                <div class="card w-[416px] bg-white border shadow rounded-[10px]">
                    <a href="{{ route('property', $property->slug) }}">
                        <div class="card-img bg-center bg-[length:100%] pt-5 bg-no-repeat h-72"
                             style="background-image: url({{ asset("storage/properties/$property->image")}});">
                            <div class="flex justify-between">
                                <div
                                    class="w-[76px] ml-9 h-[31px] flex justify-center items-center bg-[#6C60FE] rounded-lg">
                                    <span>
                                        {{ $property->category->name }}
                                    </span>
                                </div>
                                <div
                                    class="like size-9 me-4 flex justify-center items-center rounded-full cursor-pointer border-2 border-white">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                            </div>
                            <div class="mr-5 grid grid-cols-3 gap-1 place-items-end h-56">
                                <span class="self-end">
                                    {{ $property->price }}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="max-w-screen-xl mx-auto p-5">
                        <a href="{{ route('property', $property->slug) }}">
                            <h3>
                                {{ $property->title }}
                            </h3>
                        </a>
                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $property->city }} @if($property->region)
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
                        <hr class="mt-4"/>
                        <div class="time flex justify-between mt-5">
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
