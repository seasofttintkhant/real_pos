@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            User Edit Form
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form col-md-8 m-auto bg-light p-3 rounded" action="{{route("users.update",$user->id)}}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" value="{{old("name",$user->name)}}" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" value="{{old("email",$user->email)}}" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c_password" class="col-md-2 col-form-label">Confirm Password</label>
                            <div class="col-md-10">
                                <input type="password" name="c_password" class="form-control" id="c_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-10">
                                <select class="form-control" name="role">
                                    <option value="staff" {{old("role",$user->role) == "staff" ? "selected" : ""}}>Staff</option>
                                    <option value="admin" {{old("role",$user->role) == "admin" ? "selected" : ""}}>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-form-label">
                                <input type="submit" value="Update" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection