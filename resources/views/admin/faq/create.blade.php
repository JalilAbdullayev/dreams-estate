@extends('admin.layouts.master')
@section('title', __('New FAQ'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"/>
    <style>
        textarea {
            display: block;
            height: 5rem;
        }
    </style>
@endpush
@section('content')
    <!-- Bread crumb -->
    <x-admin.layout.breadcrumb parent="true" parent_route="admin.faq.index" parent_title="FAQ"/>
    <!-- End Bread crumb -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf
                <div class="form-floating my-3">
                    <input class="form-control" name="title" id="title" placeholder="@lang('Title')" type="text"
                           required/>
                    <label class="form-label text-white-50" for="title">
                        @lang('Title')
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50" for="description">
                        @lang('Description')
                    </label>
                    <textarea class="form-control ckeditor" placeholder="@lang('Description')" id="description"
                              required name="description"></textarea>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1"/>
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
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
    <script>
        function createCKEditor(id) {
            CKEDITOR.replace(id, {
                extraAllowedContent: 'div',
                height: 150,
            });
        }

        const ckeditor1 = createCKEditor('ckeditor');
    </script>
@endpush
