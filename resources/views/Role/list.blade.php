@extends('Layouts.master')
@section('page-title', 'Role List')
@section('css')
    <link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-12 d-flex align-items-center justify-content-between flex-wrap">
            <span class="m-0 font-weight-bold text-primary">Roles DataTable</span>
            <a href="{{route('role.create')}}" class="btn btn-primary">Create Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="roleTable">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Create Date</th>
                            <th>Updated Date</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Role Name</th>
                            <th>Create Date</th>
                            <th>Updated Date</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <!-- Page level plugins -->
    <script src="{{ asset('template') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template') }}/js/demo/datatables-demo.js"></script>

    <script>
        $('#roleTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('role.fetch') !!}',
            columns: [
                {data: 'name'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action',orderable: false,searchable: false}
            ]
        });
    </script>
@endsection
