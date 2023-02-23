@extends('Layouts.master')
@section('page-title', 'Edit Role')
@section('content')
    <form action="{{ route('role.update',$role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="roleName" class="form-label">Role Name</label>
            <input type="textbox" name="name" class="form-control" id="roleName" placeholder="Role Name" value="{{$role->name}}">
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 col-12 d-flex align-items-center justify-content-between flex-wrap">
                <span class="m-0 font-weight-bold text-primary">Permission DataTable</span> <a class="btn btn-primary" onclick="allPermission()">Select all permission</a>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="roleTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Read</th>
                                <th>Create</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Read</th>
                                <th>Create</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($permissions as $key => $value)
                                <tr>
                                    <td>{{ $value }}</td>
                                    <td><input type="checkbox" {{$role->hasPermissionTo('read '. $key ) ? 'checked':''}} name="permissions[]" value="read {{ $key }}"></td>
                                    <td><input type="checkbox" {{$role->hasPermissionTo('create '. $key ) ? 'checked':''}} name="permissions[]" value="create {{ $key }}"></td>
                                    <td><input type="checkbox" {{$role->hasPermissionTo('update '. $key ) ? 'checked':''}} name="permissions[]" value="update {{ $key }}"></td>
                                    <td><input type="checkbox" {{$role->hasPermissionTo('delete '. $key ) ? 'checked':''}} name="permissions[]" value="delete {{ $key }}"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success float-right">Update</button>
            </div>
        </div>
    </form>
@endsection
@section('js')
<script>
function allPermission(){
    var allCheckbox = document.querySelectorAll("input[type='checkbox']");
    for(var i = 0; i < allCheckbox.length; i++) {
        if(allCheckbox[i].checked != true){
             allCheckbox[i].checked = true;   
        }
       
    }
}
</script>
@endsection