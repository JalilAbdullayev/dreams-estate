@extends('layouts.layout')
@section('title', $property->title)
@section('description', $property->description)
@section('image', asset("storage/properties/$property->image"))
@section('author', $property->user->name)
@section('content')
    <x-layout.breadcrumb :title="$property->title"/>
    <x-property.header :property="$property"/>
    <hr class="max-w-screen-xl mx-auto">
    <section class="buy-detailview bg-[#f7f6ff] py-20">
        <div class="max-w-screen-xl mx-auto">
            <div class="details flex justify-between">
                <div class="rental-card w-7/12">
                    <x-property.carousel :images="$property->images"/>
                    <x-property.details :property="$property"/>
                </div>
                <x-property.sidebar :user="$property->user"/>
            </div>
        </div>
    </section>
@endsection
