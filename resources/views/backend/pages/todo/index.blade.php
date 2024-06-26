@extends('backend.layouts.app')
@section('title', 'Project')
@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/datatables.net/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables.net-responsive/css/responsive.bootstrap5.min.css') }}">
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Dashboard</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Todo List</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light "
                                data-bs-toggle="modal" data-bs-target=".modal-create">Add Task</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="container-fluid">

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name Project</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($todo as $item)
                                            <tr>
                                                <td>{{ $item->project->name }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->status == 'New')
                                                        <button
                                                            class="btn btn-sm btn-edit-status btn-info waves-effect waves-light"
                                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                            data-bs-target=".modal-status">{{ $item->status }}</button>
                                                    @elseif ($item->status == 'Progress')
                                                        <button
                                                            class="btn btn-sm btn-edit-status btn-warning waves-effect waves-light"
                                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                            data-bs-target=".modal-status">{{ $item->status }}</button>
                                                    @else
                                                        <button
                                                            class="btn btn-sm btn-edit-status btn-success waves-effect waves-light"
                                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                            data-bs-target=".modal-status">{{ $item->status }}</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="modal fade modal-status" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="edit-form" action="
                {{ route('todo.status', [$item->id]) }}" method="post">

                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="project-id" class="form-label">ID Project</label>
                                <input class="form-control" readonly type="text" id="project-id">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="project-name" class="form-label">Name Task</label>
                                <input class="form-control" readonly type="text" id="project-name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="project-status" class="form-label">Name Project</label>
                                <select class="form-control select2" name="status" id="project-status">
                                    <option>== Pilih Status == </option>
                                    <option {{ $item->status == 'New' ? 'selected' : '' }} value="New">New</option>
                                    <option {{ $item->status == 'Progress' ? 'selected' : '' }} value="Progress">
                                        Progress
                                    </option>
                                    <option {{ $item->status == 'Done' ? 'selected' : '' }} value="Done">Done
                                    </option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade modal-create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('todo.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="project-name" class="form-label">Name Project</label>
                                <select class="form-control select2" name="project_id" id="project-name">
                                    <option>== Pilih Project == </option>
                                    @foreach ($projects as $item)
                                        <option {{ old('project_id') == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="project-name" class="form-label">Name Task</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="CRUD">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection

@push('scripts')
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs/datatables.net-responsive/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('js/pages/form-advanced.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script>
        $('.btn-edit-status').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/todo/' + id + '/data',
                type: 'GET',
                success: function(data) {
                    $('#project-id').val(data.todos.project_id);
                    $('#project-name').val(data.todos.name);
                    // Set form input fields based on data
                    // ...
                    $('.modal-status').modal('show');
                }
            });
        });
        $('#project-status').change(function() {
            $('#edit-form').submit();
        });
    </script>
@endpush
