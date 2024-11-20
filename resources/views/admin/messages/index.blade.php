@extends('admin.layouts.master')
@section('title', __('Messages'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
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
                @if(auth()->user()->isAdmin())
                    <th>
                        Receiver
                    </th>
                @endif
                <th>
                    @lang('Name')
                </th>
                <th>
                    @if(Route::is('admin.messages.index'))
                        @lang('Subject')
                    @else
                        Property
                    @endif
                </th>
                <th>
                    @lang('Actions')
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($messages as $message)
                <tr id="{{ $message->id }}">
                    @if(auth()->user()->isAdmin())
                        <td>
                            {{ $message->receiver->name }}
                        </td>
                    @endif
                    <td>
                        {{ $message->name }}
                    </td>
                    <td>
                        @if(Route::is('admin.messages.index'))
                            {{ $message->subject }}
                        @else
                            <a href="{{ route('property', $message->property->slug) }}" target="_blank">
                                {{ $message->property->title }}
                            </a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ Route::is('admin.messages.index') ? route('admin.messages.show', $message->id) : route('admin.customer_messages.show', $message->id) }}"
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
