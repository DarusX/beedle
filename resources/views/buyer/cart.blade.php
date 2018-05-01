@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <h1><strong>Carrito</strong></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total:</strong></td>
                <td>{{number_format(Auth::user()->carts->sum('total'), 2)}}</td>
            </tr>
        </tfoot>
        <tbody>
            @foreach(Auth::user()->carts as $cart)
            <tr>
                <td class="text-center"><a href="{{route('buyer.remove_from_cart', $cart->id)}}" class="destroy"><i class="fas fa-trash"></i></a></td>
                <td>{{$cart->product->product}} - {{$cart->color->color}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{number_format($cart->product->price, 2)}}</td>
                <td>{{number_format($cart->total, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection