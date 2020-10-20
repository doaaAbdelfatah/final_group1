@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Edit Brand {{$brand->name}}</h3>
                <form method="POST" action="/brand/edit/{{$brand->id}}">
                    @csrf                    
                    <div class="form-group mt-4">
                      <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$brand->name}}" placeholder="Brand Name">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('name')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-1">
                      <label for="">Comments</label>
                     <textarea class="form-control" name="comments">{{$brand->comments}}</textarea>
                      @error('comments')
                      <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
        
    </div>
    
@endsection