@extends('layouts.app') @section('content')
<div class="col-sm-12">
    <h1><strong>{{$category->category}}</strong></h1>
</div>
@foreach($category->products as $product)
<div class="col-sm-3">
    <h3 class="product-title">{{$product->product}}</h3>
    <a href="{{route('producto', $product->id)}}">
        <img src="{{asset($product->photos->first()->photo)}}" alt="" class="img-responsive thumbnail">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <h3><strong>$ {{number_format($product->price, 2)}}</strong></h3>
            </div>
        </div>
    </a>
</div>
@endforeach @endsection