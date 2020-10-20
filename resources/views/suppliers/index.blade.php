@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>All Suppliers</h3>
                @if (session()->has("error"))
                    <small class="text-danger">
                        {{session()->get("error")}}
                    </small>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>                           
                            <th>Contacts</th>                           
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $sub)
                        <tr>
                            <td><a href="/supplier/{{$sub->id}}" class="btn-link"> {{$sub->name}}</a></td>                            
                            <td>
                                <ul>
                                @forelse ($sub->contacts as $contact)
                                    <li>{{$contact->contact_type->type}} : {{$contact->contact}}</li>    
                                @empty
                                    <li>No Contacts</li>    
                                @endforelse
                                </ul>
                                
                            </td>
                            <td style="width: 120px">
                                <a class="btn btn-primary btn-sm" href=" /contact/create/{{$sub->id}}/supplier" >Add Contact</a>
                            </td>
                            <td style="width: 50px">
                                <a class="btn btn-success btn-sm" href=" /supplier/{{$sub->id}}/edit" >edit</a>
                            </td>
                            <td style="width: 50px">
                                <form action="/supplier/{{$sub->id}}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <input type="submit" class="btn btn-sm btn-danger" value="delete">
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Categories</td>
                        </tr>
                        @endforelse
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    
@endsection