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
                <li class="breadcrumb-item active">
                    @yield('title')
                </li>
            </ol>
        </div>
    </div>
</div>
