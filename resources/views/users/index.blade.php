@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            User List
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('users.create')}}" class="btn btn-info">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a href="{{route("users.edit",$user->id)}}" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger b-delete-button" data-action="{{route("users.destroy",$user->id)}}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                            
                        </thead>
                    </table>

                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection