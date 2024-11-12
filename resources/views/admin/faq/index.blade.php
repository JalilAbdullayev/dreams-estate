@extends('admin.layouts.master')
@section('title', __('FAQ'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <x-admin.layout.breadcrumb create="true" route="admin.faq.create"/>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
                <tr>
                    <th>
                        @lang('Title')
                    </th>
                    <th>
                        @lang('Status')
                    </th>
                    <th>
                        @lang('Actions')
                    </th>
                </tr>
            </thead>
            <tbody id="sortable-tbody" data-route="{{ route('admin.faq.sort') }}">
                @foreach ($faqs as $faq)
                    <tr id="{{ $faq->id }}" data-id="{{ $faq->id }}" data-order="{{ $faq->order }}">
                        <td>
                            {{ $faq->title }}
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" @checked($faq->status) class="form-check-input" />
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.faq.edit', $faq->id) }}"
                                class="btn btn-outline-warning">
                                <i class="ti-pencil-alt"></i>
                            </a>
                            <button class="btn btn-outline-danger">
                                <i class="ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script src="{{ asset('back/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.faq.destroy', ':id') }}')
        statusAlert('{{ route('admin.faq.status') }}')
    </script>
@endpush
