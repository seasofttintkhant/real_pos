@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            Product Edit Form
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form col-md-8 m-auto bg-light p-3 rounded" action="{{route("products.update",$product->id)}}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" value="{{old("name",$product->name)}}" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deposite" class="col-md-2 col-form-label">Deposite</label>
                            <div class="col-md-10">
                                <input type="number" name="deposite" value="{{old("deposite",$product->deposite)}}" class="form-control" id="deposite">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input type="number" name="price" value="{{old("price",$product->price)}}" class="form-control" id="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-2 col-form-label">Quantity</label>
                            <div class="col-md-10">
                                <input type="number" name="quantity" value="{{old("quantity",$product->quantity)}}" class="form-control" id="quantity">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-2 col-form-label">Code</label>
                            <div class="col-md-10">
                                <input type="text" name="code" value="{{old("code",$product->code)}}" class="form-control" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <input type="text" name="description" value="{{old("description",$product->description)}}" class="form-control" id="description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-md-2 col-form-label">Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old("category_id",$product->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                    @endforeach
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