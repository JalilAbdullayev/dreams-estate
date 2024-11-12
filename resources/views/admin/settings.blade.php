@extends('admin.layouts.master')
@section('title', __('Settings'))
@section('css')
    <link rel="stylesheet" href="{{ asset("back/node_modules/dropify/dist/css/dropify.min.css") }}"/>
@endsection
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                @yield('title')
            </h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">
                            @lang('Home')
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->
    <form class="card" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="@lang('Title')" required
                       maxlength="255" value="{{ $settings->title }}"/>
                <label for="title" class="form-label text-white-50">
                    @lang('Title')
                </label>
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="author" id="author" placeholder="@lang('Author')"
                       required maxlength="255" value="{{ $settings->author }}"/>
                <label for="author" class="form-label text-white-50">
                    @lang('Author')
                </label>
            </div>
            @error('author')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="keywords" class="form-label text-white-50">
                    @lang('Keywords')
                </label>
                <textarea type="text" class="form-control" name="keywords" id="keywords" rows="5"
                          placeholder="@lang('Keywords')" required maxlength="255">{{ $settings->keywords }}</textarea>
            </div>
            @error('keywords')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label text-white-50">
                    @lang('Description')
                </label>
                <textarea class="form-control" name="description" id="description" required rows="5"
                          placeholder="@lang('Description')">{{ $settings->description }}</textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="favicon" class="form-label text-white-50">
                    Favicon
                </label>
                <input type="file" name="favicon" id="favicon" class="dropify" data-show-remove="false"
                       accept="image/*" data-default-file="{{ asset(Storage::url($settings->favicon)) }}"/>
            </div>
            @error('favicon')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="logo" class="form-label text-white-50">
                    @lang('Logo')
                </label>
                <input type="file" name="logo" id="logo" class="dropify" data-show-remove="false"
                       accept="image/*" data-default-file="{{ asset(Storage::url($settings->logo)) }}"/>
            </div>
            @error('logo')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn w-100 btn-primary text-white">
                @lang('Save')
            </button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{ asset("back/node_modules/dropify/dist/js/dropify.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
