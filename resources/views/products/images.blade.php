@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
            <h3>Product {{$product->name}}</h3>
            <h4>Price : {{$product->price}}</h4>
            <h4>Quantity : {{$product->qty}}</h4>
            <hr>
            <div class="row">
            @foreach ($product->images as $image)
            <div class="col">
                <img  src="{{asset('storage/'.$image->img)}}" class="img img-fluid" />
            <form action="/product/image/{{$image->id}}" method="POST">
                @csrf
                @method("delete")
                <input class="btn btn-danger btn-block" type="submit" value="delete">
            </form>
            </div>
            @endforeach
        </div>
            <form method="POST" action="/product/image/{{$product->id}}" enctype="multipart/form-data">
                    @csrf                    
                    <div class="form-group mt-4">
                        <label for="">Add Images</label>
                      <input type="file" name="img" class="form-control" value="{{old("img")}}">                   
                      @error('img')
                          <small  class="text-danger">{{$message}}</small>
                      @enderror
                      </div>
                      <div class="form-group mt-4">
                        <label for="">Comments</label>
                      <input type="text" name="comments" class="form-control" value="{{old("comments")}}" placeholder="Product Price">
                      {{-- <small id="name_msg" class="text-danger"></small>  --}}
                      @error('comments')
                          <small  class="text-danger">{{$message}}</small>
                      @enderror
                      </div>  
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection