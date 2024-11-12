@props(['create' => false, 'route' => '', 'parent' => false, 'parent_route' => '', 'parent_title' => ''])
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
                @if($parent)
                    <li class="breadcrumb-item">
                        <a href="{{ route($parent_route) }}">
                            @lang($parent_title)
                        </a>
                    </li>
                @endif
                <li class="breadcrumb-item active">
                    @yield('title')
                </li>
            </ol>
            @if($create)
                <a href="{{ route($route) }}"
                   class="btn btn-success d-none d-lg-block m-l-15 text-white">
                    <i class="ti-plus"></i> {{ __('Create new') }}
                </a>
            @endif
        </div>
    </div>
</div>
