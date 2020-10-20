@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Add New Supplier</h3>
                <form method="POST" action="/supplier">
                    @csrf                    
                    <div class="form-group mt-4">
                      <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old("name")}}" placeholder="Name">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('name')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>                  
  
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection