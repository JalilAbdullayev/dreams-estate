@props(['route' => null, 'parent_route' => null, 'parent_title' => null])
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-white-50">
            @yield('title')
        </h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                @unless(Route::is('admin.index'))
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">
                            @lang('Home')
                        </a>
                    </li>
                @endunless
                @isset($parent_title)
                    <li class="breadcrumb-item">
                        <a href="{{ route($parent_route) }}">
                            @lang($parent_title)
                        </a>
                    </li>
                @endisset
                <li class="breadcrumb-item active">
                    @yield('title')
                </li>
            </ol>
            @isset($route)
                <a href="{{ route($route) }}"
                   class="btn btn-success d-none d-lg-block m-l-15 text-white">
                    <i class="ti-plus"></i> {{ __('Create new') }}
                </a>
            @endisset
            @if(Route::is('admin.properties.images.index'))
                <button type="button" class="btn btn-primary m-l-15" data-bs-toggle="modal"
                        data-bs-target="#newImageModal">
                    <i class="fas fa-plus"></i> Upload Image(s)
                </button>
            @endif
        </div>
    </div>
</div>
