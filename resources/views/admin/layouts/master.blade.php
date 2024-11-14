<!DOCTYPE html>
<html lang="{{ Str::replace('_', '-', App::getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset("storage/$settings->favicon") }}"/>
    <title>
        @yield('title', 'Admin Panel') - {{ $settings->title }}
    </title>
    <link rel="stylesheet" href="{{ asset('back/node_modules/morrisjs/morris.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/node_modules/toast-master/css/jquery.toast.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/css/style.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/css/pages/dashboard1.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"/>
    @stack('css')
    @vite([])
</head>
<body class="skin-default-dark fixed-layout">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">
            {{ $settings->title }}
        </p>
    </div>
</div>
<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper">
    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- Logo -->
            <div class="navbar-header d-flex justify-content-center align-items-center">
                <a class="navbar-brand d-inline-block" href="{{ route('admin.index') }}" style="width: 30%">
                    <!-- Light Logo text -->
                    <img src="{{ asset("storage/$settings->logo") }}" class="light-logo w-100" alt=""/>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav me-auto">
                    <!-- This is  -->
                    <li class="nav-item">
                        <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                           href="javascript:void(0)">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                           href="javascript:void(0)">
                            <i class="icon-menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <x-admin.layout.sidebar/>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Container fluid  -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
    <!-- footer -->
    <footer class="footer">
        © 2024 {{ date('Y') > 2024 ? ' - ' . date('Y') : '' }}
        <a target="_blank" href="{{ route('home') }}">
            {{ $settings->title }}
        </a>
    </footer>
    <!-- End footer -->
</div>
<!-- End Wrapper -->
@stack('modal')
<!-- All Jquery -->
<script src="{{ asset("back/node_modules/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset("back/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset("back/js/perfect-scrollbar.jquery.min.js") }}"></script>
<!--Wave Effects -->
<script src="{{ asset("back/js/waves.js") }}"></script>
<!--Menu sidebar -->
<script src="{{ asset("back/js/sidebarmenu.js") }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset("back/js/custom.min.js") }}"></script>
<!-- This page plugins -->
<!--morris JavaScript -->
<script src="{{ asset("back/node_modules/raphael/raphael-min.js") }}"></script>
<script src="{{ asset("back/node_modules/morrisjs/morris.min.js") }}"></script>
<script src="{{ asset("back/node_modules/jquery-sparkline/jquery.sparkline.min.js") }}"></script>
<!-- Chart JS -->
<script src="{{ asset("back/js/dashboard1.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })

    function successAlert(message) {
        Swal.fire({
            icon: 'success',
            timer: 1500,
            background: '#303641',
            timerProgressBar: true,
            title: message,
        })
    }

    function errorAlert(message) {
        Swal.fire({
            icon: 'error',
            background: '#303641',
            timerProgressBar: true,
            title: message,
        })
    }

    function deletePrompt(route) {
        $('.btn-outline-danger').click(function() {
            let id = $(this).closest('tr').attr('id');
            Swal.fire({
                title: '@lang('Are you sure')?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6F42C1',
                cancelButtonColor: '#F62D51',
                confirmButtonText: "@lang('Yes, delete')",
                cancelButtonText: "@lang('No, cancel')",
            }).then(result => {
                if(result.isConfirmed) {
                    $.ajax({
                        url: route.replace(':id', id),
                        type: 'POST',
                        data: {
                            _method: 'DELETE'
                        },
                        async: false,
                        success: function() {
                            successAlert(`@lang('Operation successful').`)
                            $('tr#' + id + '').remove();
                        },
                        error: function() {
                            errorAlert(`@lang('Error while deleting').`)
                        }
                    });
                }
            })
        });
    }

    function statusAlert(route) {
        $('.form-check-input').change(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: route,
                type: "POST",
                async: false,
                data: {
                    id: id
                },
                success: function() {
                    successAlert('@lang('Status updated').')
                },
                error: function() {
                    errorAlert('@lang('Error while updating status.')')
                }
            })
        })
    }

    function deleteImage(route) {
        deletePrompt('şəkli', route, 'Şəkil')
    }

    @session('success')
    successAlert('{{ session('success') }}');
    @endsession
    @session('error')
    errorAlert('{{ session('error') }}')
    @endsession

    $(document).ready(function() {
        $('#sortable-tbody').sortable({
            group: {
                pull: true,
                put: true
            },
            animation: 200,
            ghostClass: 'ghost',
            items: '#sortable-tbody tr',
            handle: '#sortable-tbody tr',
            multiDrag: true,
            avoidImplicitDeselect: true,
            onEnd: function() {
                let allRows = $('#sortable-tbody tr');
                let orderData = [];
                let dataIndexArray = [];

                $(allRows).each(function(index, element) {
                    dataIndexArray.push($(element).data('order'));
                });
                dataIndexArray = dataIndexArray.sort((a, b) => a - b);
                allRows.each(function(index, element) {
                    let newIndex = dataIndexArray[index];
                    $(element).attr('data-order', newIndex);
                });
                $(allRows).each(function(index, element) {
                    let id = $(element).data('id');
                    let order = dataIndexArray[index];
                    let obj = {
                        id: id,
                        order: order,
                    }
                    orderData.push(obj);
                });
                saveOrderFunction($('#sortable-tbody').data('route'), orderData)
            },
        });

        function saveOrderFunction(route, orderData) {
            $.ajax({
                url: route,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    data: orderData
                }),
                success: function() {
                    successAlert('@lang('Order updated').')
                },
                error: function() {
                    errorAlert('@lang('Error while updating order').')
                }
            });
        }
    })
</script>
@stack('js')
</body>
</html>
