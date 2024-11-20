@extends('admin.layouts.master')
@section('title', __('Blog'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <x-admin.layout.breadcrumb route="admin.blog.create"/>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
            <tr>
                @if(auth()->user()->isAdmin())
                    <th>
                        @lang('User')
                    </th>
                @endif
                <th>
                    @lang('Title')
                </th>
                <th>
                    @lang('Image')
                </th>
                <th>
                    @lang('Status')
                </th>
                <th>
                    @lang('Actions')
                </th>
            </tr>
            </thead>
            <tbody id="sortable-tbody" data-route="{{ route('admin.blog.sort') }}">
            @foreach ($blogs as $blog)
                <tr id="{{ $blog->id }}" data-id="{{ $blog->id }}" data-order="{{ $blog->order }}">
                    @if(auth()->user()->isAdmin())
                        <td>
                            {{ $blog->user->name }}
                        </td>
                    @endif
                    <td>
                        {{ $blog->title }}
                    </td>
                    <td>
                        <img src="{{ asset("storage/blog/$blog->image") }}" alt="{{ $blog->title }}" class="w-25"/>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" @checked($blog->status) class="form-check-input" id="status"/>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                               class="btn btn-outline-warning">
                                <i class="ti-pencil-alt"></i>
                            </a>
                            <button class="btn btn-outline-danger">
                                <i class="ti-trash"></i>
                            </button>
                        </div>
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
        deletePrompt('{{ route('admin.blog.destroy', ':id') }}')
        statusAlert('{{ route('admin.blog.status') }}')
    </script>
@endpush
