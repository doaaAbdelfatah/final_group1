@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>All Products</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quentity</th>
                            <th>Category</th>
                            <th>Brand</th>                            
                            <th></th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td><a href="/product/{{$product->id}}" class="btn-link"> {{$product->name}}</a></td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{($product->brand)? $product->brand->name :""}}</td>
                            <td style="width: 140px">
                                <a class="btn btn-info btn-sm" href=" /product/image/{{$product->id}}/create" >Manage Image</a>
                            </td>
                            <td style="width: 50px">
                                <a class="btn btn-success btn-sm" href=" /product/{{$product->id}}/edit" >edit</a>
                            </td>
                            <td style="width: 50px">
                                <form action="/product/{{$product->id}}" method="POST">
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