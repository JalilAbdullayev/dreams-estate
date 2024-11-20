@extends('admin.layouts.master')
@section('title', __('Properties'))
@push('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <x-admin.layout.breadcrumb route="admin.properties.create"/>
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
                    @lang('Price')
                </th>
                <th>
                    @lang('Type')
                </th>
                <th>
                    @lang('Sale type')
                </th>
                <th>
                    @lang('Image')
                </th>
                <th>
                    @lang('Verified')
                </th>
                <th>
                    @lang('Status')
                </th>
                <th>
                    @lang('Actions')
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($properties as $property)
                <tr id="{{ $property->id }}">
                    @if(auth()->user()->isAdmin())
                        <td>
                            {{ $property->user->name }}
                        </td>
                    @endif
                    <td>
                        {{ $property->title }}
                    </td>
                    <td>
                        {{ $property->price }}
                    </td>
                    <td>
                        {{ $property->type ? 'Yard' : 'Apartment' }}
                    </td>
                    <td>
                        {{ $property->sale_type ? 'Sale' : 'Rent' }}
                    </td>
                    <td>
                        <img src="{{ asset("storage/properties/$property->image") }}" alt="" class="w-25"/>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" @checked($property->verified) class="form-check-input" id="verify"
                                @disabled(!auth()->user()->isAdmin())/>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" @checked($property->status) class="form-check-input" id="status"/>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('admin.properties.edit', $property->id) }}"
                               class="btn btn-outline-warning">
                                <i class="ti-pencil-alt"></i>
                            </a>
                            <a href="{{ route('admin.properties.images.index', $property->id) }}"
                               class="btn btn-outline-purple">
                                <i class="ti-gallery"></i>
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
        deletePrompt('{{ route('admin.properties.destroy', ':id') }}')
        statusAlert('{{ route('admin.properties.status') }}');
        @if(auth()->user()->isAdmin())
        $('.form-check-input#verify').change(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '{{ route("admin.properties.verify") }}',
                type: "POST",
                async: false,
                data: {
                    id: id
                },
                success: function() {
                    successAlert('@lang('Property verify status changed').');
                },
                error: function() {
                    errorAlert('@lang('Error while updating verify status.')');
                }
            });
        });
        @endif
    </script>
@endpush
