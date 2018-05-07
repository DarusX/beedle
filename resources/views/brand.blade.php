@extends('layouts.app') @section('content')
<div class="col-sm-12">
    <h1>{{$brand->brand}}</h1>
</div>
@foreach($brand->products as $product)
<div class="col-sm-3">
    <h3>{{$product->product}}</h3>
    <a href="{{route('producto', $product->id)}}">
        <img src="{{asset($product->photos->first()->photo)}}" alt="" class="img-responsive thumbnail">
        <div class="row">
            <div class="col-sm-6">
                <h4><strong>$ {{number_format($product->price, 2)}}</strong></h4>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-default btn-block">
                    <i class="fas fa-plus"></i> Más</button>
            </div>
        </div>
    </a>
</div>
@endforeach @endsection