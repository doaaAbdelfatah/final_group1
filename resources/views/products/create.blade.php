@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Add New Product</h3>
                <form method="POST" action="/product" enctype="multipart/form-data">
                    @csrf                    
                    <div class="form-group mt-4">
                      <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old("name")}}" placeholder="Product Name">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('name')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-4">
                      <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="{{old("price")}}" placeholder="Product Price">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('price')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-4">
                      <label for="">Quantity</label>
                    <input type="number" name="qty" class="form-control" value="{{old("qty")}}" placeholder="Product Quantity">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('qty')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">                            
                            @foreach (\App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                     
                      </div>
                      <div class="form-group mt-4">
                        <label for="">Brand</label>
                        <select name="brand_id" class="form-control">
                            <option></option>
                            @foreach (\App\Models\Brand::all() as $b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                     
                      </div>

                      <div class="form-group mt-4">
                        <label for="">Product Images</label>
                      <input type="file" multiple name="imgs[]" class="form-control">
                      
                            @error('imgs')
                                <small  class="text-danger">{{$message}}</small>
                            @enderror
                      </div>
  
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection