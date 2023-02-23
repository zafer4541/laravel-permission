@extends('Layouts.master')
@section('page-title', 'User List')
@section('css')
    <link href="{{ asset('template') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-12 d-flex align-items-center justify-content-between flex-wrap">
            <span class="m-0 font-weight-bold text-primary">Users DataTable</span>
            <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="userTable">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
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
        let userDataTable = $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('user.fetch') !!}',
            columns: [{
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })

        function remove(id) {
            Swal.fire({
                icon:'warning',
                title: 'Are you sure you want to delete the user?',
                showDenyButton: true,
                confirmButtonColor:'#e74a3b',
                confirmButtonText: 'Delete',
                denyButtonText: `Cancel`,
                denyButtonColor:'#1cc88a',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{!! route('user.delete') !!}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id
                        },
                        success: function(data, textStatus, jqXHR) {
                            userDataTable.ajax.reload();
                            Swal.fire(
                                {
                                    title:'Deleted!',
                                    text:'',
                                    icon:'success',
                                    timer: 1600,
                                    showConfirmButton:false
                                })
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                        }
                    })
                   
                }
            })
        };
    </script>
@endsection
