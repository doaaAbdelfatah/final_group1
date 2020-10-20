@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Category {{$category->name}}</h3>
                <h5 class="mb-4"> {{($category->main_category )?$category->main_category->name :""}}</h5>
                <form action="/category/{{$category->id}}" method="POST">
                    @csrf
                    @method("delete")
                    <a class="btn btn-success btn-sm" href=" /category/{{$category->id}}/edit" >edit</a>
                    <input type="submit" class="btn btn-sm btn-danger" value="delete">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection