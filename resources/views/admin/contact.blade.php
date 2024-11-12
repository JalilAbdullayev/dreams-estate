@extends('admin.layouts.master')
@section('title', __('Contact'))
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
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="@lang('Phone')"
                       maxlength="255" value="{{ $contact->phone }}"/>
                <label for="phone" class="form-label text-white-50">
                    @lang('Phone')
                </label>
            </div>
            @error('phone')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="@lang('Email')"
                       maxlength="255" value="{{ $contact->email }}"/>
                <label for="email" class="form-label text-white-50">
                    @lang('Email')
                </label>
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="location" class="form-label text-white-50">
                    @lang('Location')
                </label>
                <textarea type="text" class="form-control" name="location" id="location" rows="5"
                          placeholder="@lang('Location')" maxlength="255">{{ $contact->location }}</textarea>
            </div>
            @error('location')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="map" class="form-label text-white-50">
                    @lang('Map')
                </label>
                <textarea class="form-control" name="map" id="map" rows="5"
                          placeholder="@lang('Map')">{{ $contact->map }}</textarea>
            </div>
            @error('map')
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
@push('js')
    <script>
        $('form').submit(function(event) {
            event.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function() {
                    successAlert('@lang('Contact information updated.')');
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    if(errors) {
                        $.each(errors, function(key, value) {
                            errorAlert(value[0]);
                        });
                    } else {
                        errorAlert('@lang('Error while updating contact information.')');
                    }
                }
            });
        });
    </script>
@endpush
