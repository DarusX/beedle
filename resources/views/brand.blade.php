@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1>{{$brand->brand}}</h1>
</div>
@foreach($brand->products as $product)
<div class="col-sm-3">
    <h3>{{$product->product}}</h3>
    <img src="{{asset($product->photos->first()->photo)}}" alt="" class="img-responsive thumbnail">
</div>
@endforeach
@endsection