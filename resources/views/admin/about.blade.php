@extends('admin.layouts.master')
@section('title', __('About'))
@push('css')
    <link rel="stylesheet" href="{{ asset("back/node_modules/dropify/dist/css/dropify.min.css") }}"/>
@endpush
@section('content')
    <!-- Bread crumb -->
    <x-admin.layout.breadcrumb/>
    <!-- End Bread crumb -->
    <form class="card" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="@lang('Title')" required
                       maxlength="255" value="{{ $about->title }}"/>
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
                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="@lang('Subtitle')"
                       required maxlength="255" value="{{ $about->subtitle }}"/>
                <label for="subtitle" class="form-label text-white-50">
                    @lang('Subtitle')
                </label>
            </div>
            @error('subtitle')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="text" class="form-label text-white-50">
                    @lang('Text')
                </label>
                <textarea type="text" class="form-control" name="text" id="text" rows="5"
                          placeholder="@lang('Text')" required maxlength="255">{{ $about->text }}</textarea>
            </div>
            @error('text')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="section_title" id="section_title" required
                       placeholder="@lang('Section title')" maxlength="255" value="{{ $about->section_title }}"/>
                <label for="section_title" class="form-label text-white-50">
                    @lang('Section title')
                </label>
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="section_text" class="form-label text-white-50">
                    @lang('Section text')
                </label>
                <textarea class="form-control" name="section_text" id="section_text" required rows="5"
                          placeholder="@lang('Section text')">{{ $about->section_text }}</textarea>
            </div>
            @error('section_text')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="images" class="form-label text-white-50">
                    Images
                </label>
                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*"/>
            </div>
            @error('images')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="row justify-content-center align-items-end">
                @foreach(json_decode($about->images, false, 512, JSON_THROW_ON_ERROR) as $image)
                    <div class="col-lg-3 col-md-2 text-center" id="{{ $image->id }}">
                        <img src="{{ asset("storage/about/$image->image") }}" alt="about" class="img-fluid mb-3"/>
                        <button class="btn btn-danger" id="{{ $image->id }}">
                            Delete Image
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input" name="section_status" id="section_status" value="1"
                    @checked($about->section_status)/>
                <label class="form-check-label text-white-50" for="section_status">
                    @lang('Section status')
                </label>
            </div>
            @error('section_status')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="section_image" class="form-label text-white-50">
                    @lang('Section image')
                </label>
                <input type="file" name="section_image" id="section_image" class="dropify" data-show-remove="false"
                       accept="image/*" data-default-file="{{ asset(Storage::url("about/$about->section_image")) }}"/>
            </div>
            @error('section_image')
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
    <script src="{{ asset("back/node_modules/dropify/dist/js/dropify.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
        $('.btn-danger').click(function() {
            let id = $(this).attr('id');
            $.ajax({
                url: "{{ route('admin.about.delete-image', ':id') }}".replace(':id', id),
                type: 'POST',
                async: false,
                data: {
                    _method: "DELETE"
                },
                success: function() {
                    successAlert("Image deleted successfully.");
                    $(`div#${id}`).remove();
                },
                error: function() {
                    errorAlert('@lang('Error while deleting.')')
                }
            })
        });
    </script>
@endpush