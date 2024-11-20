@extends('admin.layouts.master')
@section('title', __('Message'))
@push('css')
    <style>
        textarea {
            display: block;
            height: 5rem;
        }
    </style>
@endpush
@section('content')
    <!-- Bread crumb -->
    <x-admin.layout.breadcrumb parent_route="admin.messages.index" parent_title="Messages"/>
    <!-- End Bread crumb -->
    <div class="card">
        <div class="card-body">
            <div class="my-3">
                <label class="form-label text-white-50" for="name">
                    @lang('Name')
                </label>
                <input class="form-control" id="name" placeholder="@lang('Title')" type="text" disabled
                       value="{{ $message->name }}"/>
            </div>
            <div class="my-3">
                <label class="form-label text-white-50" for="phone">
                    @lang('Phone number')
                </label>
                <input class="form-control" id="phone" placeholder="@lang('Phone number')" type="tel" disabled
                       value="{{ $message->phone }}"/>
            </div>
            <div class="my-3">
                <label class="form-label text-white-50" for="email">
                    @lang('Email')
                </label>
                <input class="form-control" id="email" placeholder="@lang('Email')" type="email" disabled
                       value="{{ $message->email }}"/>
            </div>
            <div class="my-3">
                <label class="form-label text-white-50" for="subject">
                    @lang('Subject')
                </label>
                <input class="form-control" id="subject" placeholder="@lang('Subject')" type="text" disabled
                       value="{{ $message->subject }}"/>
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50" for="description">
                    @lang('Message')
                </label>
                <textarea class="form-control ckeditor" placeholder="@lang('Message')" id="message"
                          disabled>{{ $message->message }}</textarea>
            </div>
            <a href="mailto:{{ $message->email }}" class="btn btn-warning float-end">
                @lang('Answer')
            </a>
            <a href="tel:{{ preg_replace('/[\s\(\)\-]+/', '', $message->phone) }}" class="btn btn-warning">
                @lang('Call')
            </a>
        </div>
    </div>
@endsection
