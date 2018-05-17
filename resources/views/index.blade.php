@extends('layouts.app')
@section('content')
<div class="col-sm-12">
        @include('layouts.carousel')
    </div>
    <div class="col-sm-4">
        <div class="col-xs-4 col-xs-offset-4">
            <img src="{{asset('webby/buy.png')}}" alt="" class="img-responsive">
        </div>
        <div class="col-xs-10 col-xs-offset-1 text-center">
            <h4><strong>Tu pedido de 3 a 5 días</strong></h4>
            <p>Recibe tus productos en un tiempo no mayor a 5 días ¡Garantizado!</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="col-xs-4 col-xs-offset-4">
            <img src="{{asset('webby/money.png')}}" alt="" class="img-responsive">
        </div>
        <div class="col-xs-10 col-xs-offset-1 text-center">
            <h4><strong>Pagos Seguros</strong></h4>
            <p>Realiza tu compra de forma segura con nuestras distintas formas de pago</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="col-xs-4 col-xs-offset-4">
            <img src="{{asset('webby/transport.png')}}" alt="" class="img-responsive">
        </div>
        <div class="col-xs-10 col-xs-offset-1 text-center">
            <h4><strong>Envío gratis por Fedex</strong></h4>
            <p>Una vez completada tu compra, tu pedido se envía por paquetería 100% segura</p>
        </div>
    </div>
    <div class="col-sm-12">
        <h1><strong>Productos</strong></h1>
    </div>
    @foreach($products->chunk(4) as $chunk)
    @foreach($chunk as $product)
    <div class="col-sm-3">

        <h3>{{$product->product}}</h3>
        <a href="{{route('producto', $product->id)}}">
            <img src="{{asset($product->photos->first()->photo)}}" alt="" class="img-responsive thumbnail">
            <div class="row">
                <div class="col-xs-6">
                    <h4><strong>$ {{number_format($product->price, 2)}}</strong></h4>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-default btn-block"><i class="fas fa-plus"></i> Más</button>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="col-sm-12">
    </div>
    @endforeach
@endsection