@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            Products List
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('products.create')}}" class="btn btn-info">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Deposite</th>
                                <th>Price</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Added By</th>
                                <th></th>
                            </tr>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->deposite}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->user->name}}</td>
                                        <td>
                                            <a href="{{route("products.edit",$product->id)}}" class="btn btn-primary">Edit</a>
                                            <button class="btn btn-danger b-delete-button" data-action="{{route("products.destroy",$product->id)}}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                            
                        </thead>
                    </table>

                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection