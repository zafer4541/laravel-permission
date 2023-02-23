@extends('Layouts.master')
@section('page-title', 'Edit User')
@section('content')
    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="roleName" class="form-label">User Name</label>
            <input type="textbox" name="name" class="form-control" id="roleName" value="{{$user->name}}" placeholder="Role Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="textbox" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success float-right">Update</button>
    </form>
@endsection
