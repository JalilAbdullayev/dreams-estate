@extends('admin.layouts.master')
@section('title', __('Messages'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <x-admin.layout.breadcrumb/>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
                <tr>
                    <th>
                        @lang('Name')
                    </th>
                    <th>
                        @lang('Subject')
                    </th>
                    <th>
                        @lang('Actions')
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr id="{{ $message->id }}">
                        <td>
                            {{ $message->name }}
                        </td>
                        <td>
                            {{ $message->subject }}
                        </td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}"
                                class="btn btn-outline-warning">
                                <i class="ti-eye"></i>
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
        deletePrompt('{{ route('admin.messages.delete', ':id') }}')
    </script>
@endpush
