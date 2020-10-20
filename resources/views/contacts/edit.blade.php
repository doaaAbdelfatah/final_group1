@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Edit {{$category->name}} Category</h3>
                <form method="POST" action="/category/{{$category->id}}">
                    @csrf        
                    @method("put")            
                    <div class="form-group mt-4">
                      <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Category Name">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('name')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option></option>
                            @foreach (\App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}" 
                                @if ($category->category_id ==$cat->id )
                                    selected
                                @endif    
                                >{{$cat->name}}</option>
                            @endforeach
                        </select>
                     
                      </div>
  
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection