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
    <x-admin.layout.breadcrumb/>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
            <tr>
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
            <tbody id="sortable-tbody" data-route="{{ route('admin.properties.images.sort') }}">
            @foreach ($images as $image)
                <tr id="{{ $image->id }}" data-id="{{ $image->id }}" data-order="{{ $image->order }}">
                    <td>
                        <img src="{{ asset("storage/$image->image") }}" alt="" class="w-25"/>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" @checked($image->status) class="form-check-input" id="status"/>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger">
                            <i class="ti-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="newImageModal" tabindex="-1" aria-labelledby="newImageModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newImageModal">
                        Upload New Image
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="newImageForm" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="images[]" id="images" multiple class="form-control"
                                       accept="image/jpeg, image/png, image/jpg, image/gif" required/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="saveImage" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('back/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.properties.images.delete', ':id') }}')
        statusAlert('{{ route('admin.properties.images.status') }}');

        $('#saveImage').click(function() {
            $('#newImageForm').submit();
        });
    </script>
@endpush
