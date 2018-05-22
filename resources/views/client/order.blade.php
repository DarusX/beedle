@extends('layouts.app') @section('content')
<div class="col-sm-12">
    <h1><strong>Orden #{{$order->id}}</strong></h1>
</div>
<div class="col-sm-8">
    <legend>Productos</legend>
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
                <td>$ {{number_format($product->price, 2)}}</td>
                <td>$ {{number_format($product->total,2)}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Total: </strong></td>
                <td>$ {{number_format($order->products->sum('total'), 2)}}</td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="col-sm-4">
    <legend>Envío</legend>
    <p>{{$order->address}}</p>
</div>
<div class="col-sm-12"></div>
<div class="col-sm-4">
    <legend>Pago</legend>
    <p><strong>Estatus: </strong>{{$order->estado}}</p>
    <div class="col-sm-12">
        @if($order->status==0)
        <div class="row">
            <div class="col-sm-6">
                <div id="paypal-button" class="pull-right"></div>
            </div>
            <div class="col-sm-6">
                <a href="{{route('client.generate.payment', $order->id)}}" target="_blank" class="pull-right">
                    <img src="{{asset('img/oxxopay_brand.png')}}" alt="" width="150px">
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'production',
        client: {
            production: "Aeay4agvqT6LUwvxMn2uPkQ_MEooq-44ZDEcnYQv5CmM8Kv8393h9EoQoJi_zmeb0G8hL7J4jt2AExvP",
            sandbox: ""
        },
        commit: true,
        style: {
            color: 'blue',
            size: 'small'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: "{{number_format($order->products->sum('total'), 2)}}", currency: 'MXN' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function (payment) {
                paid();
            });
        },

        onCancel: function (data, actions) {
            /* 
             * Buyer cancelled the payment 
             */
        },

        onError: function (err) {
        }
    }, '#paypal-button');
    function paid() {
        $.ajax({
            url: "",
            method: "POST",
            data: {
                _method: "PUT",
                _token: "{{csrf_token()}}",
                status_id: 2
            },
            success: function (data) {
                location.reload;
            }
        });
    }
</script>
@endsection