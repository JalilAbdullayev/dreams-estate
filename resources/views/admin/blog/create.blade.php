@extends('admin.layouts.master')
@section('title', __('New Blog'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"/>
    <link href="{{ asset('back/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset("back/node_modules/dropify/dist/css/dropify.min.css") }}"/>
    <style>
        textarea {
            display: block;
            height: 5rem;
        }
    </style>
@endpush
@section('content')
    <!-- Bread crumb -->
    <x-admin.layout.breadcrumb parent_route="admin.blog.index" parent_title="Blog"/>
    <!-- End Bread crumb -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-3">
                    <input class="form-control" name="title" id="title" placeholder="@lang('Title')" type="text"
                           required value="{{ old('title') }}"/>
                    <label class="form-label text-white-50" for="title">
                        @lang('Title')
                    </label>
                </div>
                @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label text-white-50" for="keywords">
                        @lang('Keywords')
                    </label>
                    <textarea class="form-control" placeholder="@lang('Keywords')" id="keywords"
                              name="keywords">{{ old('keywords') }}</textarea>
                </div>
                @error('keywords')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label text-white-50" for="description">
                        @lang('Description')
                    </label>
                    <textarea class="form-control" placeholder="@lang('Description')" id="description"
                              name="description">{{ old('description') }}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label text-white-50" for="text">
                        @lang('Text')
                    </label>
                    <textarea class="form-control ckeditor" placeholder="@lang('Text')" id="text"
                              name="text">{{ old('text') }}</textarea>
                </div>
                @error('text')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label text-white-50" for="category_id">
                        @lang('Category')
                    </label>
                    <select class="select2 form-control form-select w-100" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') === $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        @lang('Image')
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                           accept="image/*"/>
                </div>
                @error('image')
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
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1"/>
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                @error('status')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Create')
                </button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script src="{{ asset('back/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset("back/node_modules/dropify/dist/js/dropify.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $(".select2").select2();
        });

        const createCKEditor = id => CKEDITOR.replace(id, {
            extraAllowedContent: 'div',
            height: 150,
        });

        createCKEditor('ckeditor');
    </script>
@endpush
