@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @php
              $qty = 1;
              $itemCount =0;
              $totalPrice =0;
          @endphp
          @if (session()->has("bag"))
              @foreach (session()->get("bag") as $product)
              @php
                  $itemCount+= $qty;
                  $totalPrice+= $product->price;
              @endphp
                <tr>           
                  <td><img style="width:100px" src="{{asset('storage/'.$product->images->first()->img)}}"></td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$qty}}</td>
                  <td>{{$product->price * $qty}}</td>
                  <td>
                    <a class="btn btn-sm btn-secondary" href="/bag/remove/{{$product->id}}" role="button">Remove From Bag</a>             

                  </td>
                </tr>
              @endforeach
          @else
            <tr><td>Empty Bag</td></tr>
          @endif
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">&nbsp;</th>
          <th>{{ $itemCount}}</th>
          <th>{{$totalPrice}}</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    <a class="btn btn-lg btn-danger" href="/order/create" role="button">Order Now</a>
    </div>
  </div>
</div>
@endsection