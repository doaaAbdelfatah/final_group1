@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>All Categories</h3>
                @if (session()->has("error"))
                    <small class="text-danger">
                        {{session()->get("error")}}
                    </small>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brands</th>
                            <th>Count Products</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td><a href="/category/{{$category->id}}" class="btn-link"> {{$category->name}}</a></td>
                            <td>
                                {{-- @php
                                    $c =\App\Models\Category::find($category->category_id);
                                    if($c){
                                        echo $c->name;
                                    }
                                @endphp --}}
                                    {{-- {{var_dump($category->sub_categories)}} --}}
                                    {{($category->main_category )?$category->main_category->name :""}}
                            </td>
                            <td>
                                <ul>
                                    @forelse ($category->brands->unique() as $b)
                                        <li>{{$b->name}}</li>
                                    @empty
                                        <li>No Brnads</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td>{{$category->products->count()}}</td>
                            <td style="width: 50px">
                                <a class="btn btn-success btn-sm" href=" /category/{{$category->id}}/edit" >edit</a>
                            </td>
                            <td style="width: 50px">
                                <form action="/category/{{$category->id}}" method="POST">
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