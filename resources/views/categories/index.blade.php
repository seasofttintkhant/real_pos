@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            Category List
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('categories.create')}}" class="btn btn-info">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Added By</th>
                                    <th></th>
                                </tr>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->quantity}}</td>
                                            <td>{{$category->user->name}}</td>
                                            <td>
                                                <a href="{{route("categories.edit",$category->id)}}" class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger b-delete-button" data-action="{{route("categories.destroy",$category->id)}}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>                            
                            </thead>
                        </table>
                    </div>
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection