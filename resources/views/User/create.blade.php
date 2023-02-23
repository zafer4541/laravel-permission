@extends('Layouts.master')
@section('page-title', 'Create User')
@section('content')
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="roleName" class="form-label">User Name</label>
            <input type="textbox" name="name" class="form-control" id="roleName" placeholder="Role Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="textbox" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success float-right">Create</button>
    </form>
@endsection
