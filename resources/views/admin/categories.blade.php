@extends('admin.layouts.master')
@section('title', 'Kateqoriyalar')
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
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ad"
                                   maxlength="255" required/>
                            <label for="name" class="form-label text-white-50">
                                Ad
                            </label>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100">
                            Yarat
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>
                            Ad
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Əməliyyatlar
                        </th>
                    </tr>
                    </thead>
                    <tbody id="sortable-tbody" data-route="{{ route('admin.categories.sort') }}">
                    @foreach($categories as $category)
                        <tr id="{{ $category->id }}" data-id="{{ $category->id }}" data-order="{{ $category->order }}">
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" @checked($category->status) class="form-check-input"/>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal"
                                        id="{{ $category->id }}">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                                <button class="btn btn-outline-danger">
                                    <i class="ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('modal')
    <div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Edit Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ad" required
                                   maxlength="255"/>
                            <label for="name" class="form-label text-white-50">
                                Ad
                            </label>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light text-white">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('js')
    <script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.categories.destroy', ':id') }}');
        statusAlert('{{ route('admin.categories.status') }}');
        $('button[data-bs-toggle="modal"]').click(function() {
            let id = $(this).attr('id');
            let url = '{{ route("admin.categories.update", ":id") }}'.replace(':id', id);
            url = url.replace(':id', id);
            $('#modal form').attr('action', url);
            $('#modal form').attr('id', id);
            $('#modal form input[name="name"]').val($(this).closest('tr').find('td').eq(0).text().trim());
        });
        $('#modal form').submit(function(event) {
            event.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                success: function() {
                    $('#modal').modal('hide');
                    $(`tr#${id} td`).eq(0).text($(`#modal form input[name="name"]`).val());
                    successAlert('Category updated.');
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    if(errors) {
                        $.each(errors, function(key, value) {
                            errorAlert(value[0]);
                        });
                    } else {
                        errorAlert('@lang('Error while updating category.')');
                    }
                }
            });
        });
    </script>
@endpush
