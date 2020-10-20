@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-5">
            <h3>Add New User</h3>
            <form method="POST" action="/users">
                @csrf                    
                <div class="form-group mt-4">
                  <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{old("name")}}" placeholder="Name">
                {{-- <small id="name_msg" class="text-danger"></small>  --}}
                @error('name')
                    <small  class="text-danger">{{$message}}</small>
                @enderror
                </div>
                <div class="form-group mt-4">
                  <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{old("email")}}" placeholder="Email">
                {{-- <small id="name_msg" class="text-danger"></small>  --}}
                @error('email')
                    <small  class="text-danger">{{$message}}</small>
                @enderror
                </div>
                <div class="form-group mt-4">
                  <label for="">Password</label>
                <input type="password" name="password" class="form-control"  placeholder="Password">
                {{-- <small id="name_msg" class="text-danger"></small>  --}}
                @error('password')
                    <small  class="text-danger">{{$message}}</small>
                @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="seller">Seller</option>
                       
                    </select>
                 
                  </div>

                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection