@extends('layouts.app') @section('content') @include('administrator.menu')
<div class="col-sm-12">
    <h1>
        <strong>Órdenes</strong>
    </h1>
</div>
<div class="col-sm-12">
    <div class="panel-group" id="accordion" aria-multiselectable="true">
        @foreach($orders as $order)
        <div class="panel panel-{{$order->status == 1 ? 'success' : 'danger'}}">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$order->id}}">
                        <strong>#{{str_pad($order->id, 10, '0', STR_PAD_LEFT)}}</strong> - {{$order->user->fullName}} - <strong>${{number_format($order->products->sum('price'),2)}}</strong> <span class="pull-right"><i class="fas fa-caret-down"></i></span>
                    </a>
                </h4>
            </div>
            <div id="collapse{{$order->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                   <div class="row">
                       <div class="col-sm-12">
                           <legend>Productos</legend>
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>Cantidad</th>
                                       <th>Producto</th>
                                       <th>Color</th>
                                       <th>Precio</th>
                                       <th>Total</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($order->products as $product)
                                   <tr>
                                       <td>{{$product->quantity}}</td>
                                       <td>{{$product->product->product}}</td>
                                       <td>{{$product->color->color}}</td>
                                       <td>${{number_format($product->price,2)}}</td>
                                       <td>${{number_format($product->total,2)}}</td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                           <legend>Pago</legend>
                           <p><strong>Status:</strong> {{$order->estado}}</p>
                           @if($order->status == 1)
                           @if($order->conekta_id != null)
                           <p><strong>OXXO Pay:</strong> {{$order->conekta_id}}</p>
                           @endif
                           @if($order->paypal_id != null)
                           <p><strong>PayPal:</strong> {{$order->paypal_id}}</p>
                           @endif
                           @endif
                           <legend>Envío</legend>
                           <p>{{$order->address}}</p>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection