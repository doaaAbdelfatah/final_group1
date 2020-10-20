@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Add New Contact</h3>
            <form method="POST" action="/contact/{{$id}}/{{$type}}">
                    @csrf                    
                    <div class="form-group mt-4">
                      <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control" value="{{old("contact")}}" placeholder="contact value">
                    {{-- <small id="name_msg" class="text-danger"></small>  --}}
                    @error('contact')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Contact Type</label>
                        <select name="contact_type_id" class="form-control">
                            <option></option>
                            @foreach (\App\Models\ContactType::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->type}}</option>
                            @endforeach
                        </select>
                        @error('contact_type_id')
                        <small  class="text-danger">{{$message}}</small>
                    @enderror
                      </div>
  
                    <input class="btn btn-primary" type="submit" value="Save">
                </form>
            </div>
        </div>
    
    </div>
    
@endsection