@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
    @foreach (App\Models\Product::all() as $product)
  
    <div class="col-md-4">
      <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($product->images as $image)
          <div class="carousel-item  
          @if ($loop->first)
            active
          @endif ">
            <img src="{{asset('storage/'.$image->img)}}" class="d-block w-100" alt="{{$product->name}}">
          </div>         
          @endforeach
          <div class="carousel-caption d-none d-md-block">
            @if (session()->has("bag")  )
              @isset(session()->get("bag")[$product->id])
                <a class="btn btn-sm btn-secondary" href="/bag/remove/{{$product->id}}" role="button">Remove From Bag</a>             
              @endisset
              @empty(session()->get("bag")[$product->id])
              <a class="btn btn-sm btn-danger" href="/bag/add/{{$product->id}}" role="button">Add To Bag</a>            

              @endisset
            @else 
            <a class="btn btn-sm btn-danger" href="/bag/add/{{$product->id}}" role="button">Add To Bag</a>
            @endif
          </div>
  
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  
    </div>
  
    @endforeach
  </div>
</div>
@endsection