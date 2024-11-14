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
            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-floating my-3">
                    <input class="form-control" name="title" id="title" placeholder="@lang('Title')" type="text"
                           required value="{{ $blog->title }}"/>
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
                              name="keywords">{{ $blog->keywords }}</textarea>
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
                              name="description">{{ $blog->description }}</textarea>
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
                              name="text">{!! $blog->text !!}</textarea>
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
                            <option value="{{ $category->id }}" @selected($blog->category_id === $category->id)>
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
                           accept="image/*" data-default-file="{{ asset("storage/blog/$blog->image") }}"/>
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
                <div class="row justify-content-center align-items-end">
                    @if($blog->images)
                        @foreach(json_decode($blog->images, false, 512, JSON_THROW_ON_ERROR) as $image)
                            <div class="col-lg-3 col-md-2 text-center" id="{{ $image->id }}">
                                <img src="{{ asset("storage/blog/$image->image") }}" alt="about"
                                     class="img-fluid mb-3"/>
                                <button class="btn btn-danger" id="{{ $image->id }}">
                                    Delete Image
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
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
                    @lang('Update')
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

        $('.btn-danger').click(function() {
            let id = $(this).attr('id');
            $.ajax({
                url: "{{ route('admin.blog.delete-image', ['id' => ':id', 'blog' => $blog->id]) }}".replace(':id', id),
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

        const createCKEditor = id => CKEDITOR.replace(id, {
            extraAllowedContent: 'div',
            height: 150,
        });

        createCKEditor('ckeditor');
    </script>
@endpush
