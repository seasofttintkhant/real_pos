@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            Category Create Form
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form col-md-8 m-auto bg-light p-3 rounded" action="{{route("categories.store")}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" value="{{old("name")}}" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-form-label">
                                <input type="submit" value="Save" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection