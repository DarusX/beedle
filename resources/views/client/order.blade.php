@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1>Orden #{{$order->id}}</h1>
</div>
<div class="col-sm-8">
    <h2>Productos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
            <tr>
                <td>{{$product->quantity}}</td>
                <td>{{$product->product->product}} - {{$product->color->color}}</td>
                <td>{{$product->price}}</td>
                <td>{{number_format($product->total,2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-sm-4">
    <h2>Envío</h2>
    <p>{{$order->address}}</p>
</div>
<div class="col-sm-12"></div>
<div class="col-sm-4">
    <h2>Pago</h2>
    <p><strong>Estatus: </strong>Pendiente</p>
</div>
@endsection