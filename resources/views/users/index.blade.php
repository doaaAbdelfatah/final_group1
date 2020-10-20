@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>All Users</h3>
                @if (session()->has("error"))
                    <small class="text-danger">
                        {{session()->get("error")}}
                    </small>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>                           
                            <th>Email</th>                           
                            <th>Role</th>                           
                            <th>Contacts</th>                           
                            <th>&nbsp;</th>                           
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\User::all() as $u)
                        <tr>
                            <td>{{$u->name}}</td>                            
                            <td>{{$u->email}}</td>                            
                            <td>{{$u->role}}</td> 
                            <td>
                                <ul>
                                @forelse ($u->contacts as $contact)
                                    <li>{{$contact->contact_type->type}} : {{$contact->contact}}</li>    
                                @empty
                                    <li>No Contacts</li>    
                                @endforelse
                                </ul>
                                
                            </td>
                            </td>
                            <td style="width: 120px">
                                <a class="btn btn-primary btn-sm" href=" /contact/create/{{$u->id}}/user" >Add Contact</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Users</td>
                        </tr>
                        @endforelse
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    
@endsection