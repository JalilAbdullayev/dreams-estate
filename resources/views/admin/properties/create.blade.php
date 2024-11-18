@extends('admin.layouts.master')
@section('title', __('New Property'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"/>
    <link href="{{ asset('back/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset("back/node_modules/dropify/dist/css/dropify.min.css") }}"/>
    <link href="{{ asset('back/css/pages/form-icheck.css')}}" rel="stylesheet"/>
    <link href="{{ asset('back/node_modules/icheck/skins/all.css')}}" rel="stylesheet"/>
    <style>
        textarea {
            display: block;
            height: 5rem;
        }
    </style>
@endpush
@section('content')
    <!-- Bread crumb -->
    <x-admin.layout.breadcrumb parent_route="admin.properties.index" parent_title="Properties"/>
    <!-- End Bread crumb -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="bedroom" id="bedroom" placeholder="@lang('Bedroom')"
                                   type="number" value="{{ old('bedroom') }}" max="255"/>
                            <label class="form-label text-white-50" for="bedroom">
                                @lang('Bedroom')
                            </label>
                        </div>
                        @error('bedroom')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="bathroom" id="bathroom" placeholder="@lang('Bathroom')"
                                   type="number" value="{{ old('bathroom') }}" max="255"/>
                            <label class="form-label text-white-50" for="bathroom">
                                @lang('Bathroom')
                            </label>
                        </div>
                        @error('bathroom')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="garage" id="garage" placeholder="@lang('Garage')"
                                   type="number" value="{{ old('garage') }}" max="255"/>
                            <label class="form-label text-white-50" for="garage">
                                @lang('Garage')
                            </label>
                        </div>
                        @error('garage')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="garage_size" id="garage_size" type="text"
                                   placeholder="@lang('Garage size')" value="{{ old('garage_size') }}" maxlength="255"/>
                            <label class="form-label text-white-50" for="garage_size">
                                @lang('Garage size')
                            </label>
                        </div>
                        @error('garage_size')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="city" id="city" placeholder="@lang('City')"
                                   type="text" value="{{ old('city') }}" maxlength="255"/>
                            <label class="form-label text-white-50" for="city">
                                @lang('City')
                            </label>
                        </div>
                        @error('city')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="region" id="region" placeholder="@lang('Region')"
                                   type="text" value="{{ old('region') }}" maxlength="255"/>
                            <label class="form-label text-white-50" for="region">
                                @lang('Region')
                            </label>
                        </div>
                        @error('region')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="address">
                                @lang('Address')
                            </label>
                            <textarea class="form-control" name="address" id="address" placeholder="@lang('Address')"
                                      maxlength="255">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="price">
                                @lang('Price')
                            </label>
                            <input class="form-control" name="price" id="price" placeholder="@lang('Price')"
                                   type="number" value="{{ old('price') }}"/>
                        </div>
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="year" id="year" placeholder="@lang('Year')" type="number"
                                   value="{{ old('year') }}" min="1800" max="{{ (int)date('Y') + 10 }}"/>
                            <label class="form-label text-white-50" for="year">
                                @lang('Year')
                            </label>
                        </div>
                        @error('year')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="area" id="area" placeholder="@lang('Area')" type="text"
                                   value="{{ old('area') }}" maxlength="255"/>
                            <label class="form-label text-white-50" for="area">
                                @lang('Area')
                            </label>
                        </div>
                        @error('area')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="floor" id="floor" placeholder="@lang('Floor')"
                                   type="number" value="{{ old('floor') }}" max="255" required/>
                            <label class="form-label text-white-50" for="floor">
                                @lang('Floor')
                            </label>
                        </div>
                        @error('floor')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
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
                <section class="d-flex">
                    <div>
                        <h5 class="text-white-50">
                            Property type
                        </h5>
                        <ul class="icheck-list d-flex gap-4 text-white-50">
                            <li>
                                <input type="radio" class="check" id="yard" name="type"
                                       data-radio="iradio_square-orange"
                                       value="1" checked/>
                                <label class="form-label" for="yard">
                                    Yard
                                </label>
                            </li>
                            <li>
                                <input type="radio" class="check" id="apartment" name="type"
                                       data-radio="iradio_square-orange"
                                       value="0"/>
                                <label class="form-label" for="apartment">
                                    Apartment
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-white-50">
                            Sale type
                        </h5>
                        <ul class="icheck-list d-flex gap-4 text-white-50">
                            <li>
                                <input type="radio" class="check" id="sale" name="sale_type"
                                       data-radio="iradio_square-orange"
                                       value="1" checked/>
                                <label class="form-label" for="sale">
                                    Sale
                                </label>
                            </li>
                            <li>
                                <input type="radio" class="check" id="rent" name="sale_type"
                                       data-radio="iradio_square-orange"
                                       value="0"/>
                                <label class="form-label" for="rent">
                                    Rent
                                </label>
                            </li>
                        </ul>
                    </div>
                </section>
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
    <script src="{{ asset('back/node_modules/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset('back/node_modules/icheck/icheck.init.js')}}"></script>
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
